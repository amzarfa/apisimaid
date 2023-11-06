<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UsersPeran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Vinkla\Hashids\Facades\Hashids;

class UserManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    // Select Array
    public function selectUser()
    {
        $querySelect = array(
            'users.id as idUser',
            'users.name',
            'users.nip',
            'users.email',
            'users.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'users.kode_sub_unit_audit as kodeSubUnitAudit',
            'subunitaudit.nama_sub_unit_audit as namaSubUnitAudit',
            'users.kode_bidang_obrik as kodeBidangObrik',
            'bidangobrik.nama_bidang_obrik as namaBidangObrik',
            'users.peran',
            'users.peran_ren as peranRen',
            'users.peran_lak as peranLak',
            'users.peran_por as peranPor',
            'users.peran_simhpnas as peranSimhpnas',
            'users.status',
        );
        return $querySelect;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auth = Auth::user();
        $data = User::where('users.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'users.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as subunitaudit', 'subunitaudit.kode_sub_unit_audit', '=', 'users.kode_sub_unit_audit')
            ->leftjoin('tr_kode_bidang_obrik as bidangobrik', 'bidangobrik.kode_bidang_obrik', '=', 'users.kode_bidang_obrik')
            ->select($this->selectUser())
            ->orderBy('users.id', 'Desc')
            ->paginate($request->perPage ? $request->perPage : 10);

        $data->getCollection()->transform(function ($data) {
            $data->idUser = Hashids::encode($data->idUser);
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponse($response);
        return response()->json($customResponse, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth = Auth::user();
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menambah User');
            return response()->json($response, 403);
        } else {
            if (User::where('email', '=', $request->email)->exists()) {
                $response = Helper::labelMessageFailed('Pengguna sudah ada!');
                return response()->json($response, 206);
            }

            $password = $request->password ? $request->password : 'password';

            // Store
            $storeData = new User();
            $storeData->name = $request->name;
            $storeData->nip = $request->nip;
            $storeData->email = $request->email;
            $storeData->password = bcrypt($password);
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->kode_bidang_obrik = $request->kodeBidangObrik;
            $storeData->peran = $request->peran;
            $storeData->peran_ren = $request->peranRen;
            $storeData->peran_lak = $request->peranLak;
            $storeData->peran_por = $request->peranPor;
            $storeData->peran_simhpnas = $request->peranSimhpnas;

            // Audit Trails
            $storeData->created_at = now();
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->id;
            $page = 'Tambah User Pengguna';
            $activity = $auth->name . ' menambah User Pengguna. Id User : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($storeData->id);
            $response = Helper::labelMessageSuccess('menambah User Pengguna. Id User : ' . $id);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Hashids::decode($id)[0];
        $data = User::select($this->selectUser())
            ->where('users.id', '=', $id)
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'users.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as subunitaudit', 'subunitaudit.kode_sub_unit_audit', '=', 'users.kode_sub_unit_audit')
            ->leftjoin('tr_kode_bidang_obrik as bidangobrik', 'bidangobrik.kode_bidang_obrik', '=', 'users.kode_bidang_obrik')
            ->first();
        $data->idUser = Hashids::encode($data->idUser);
        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auth = Auth::user();
        $id = Hashids::decode($id)[0];
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengubah User Pengguna');
            return response()->json($response, 403);
        } else {
            $data = User::where('id', '=', $id)
                ->update([
                    'name' => $request->name,
                    'nip' => $request->nip,
                    'email' => $request->email,
                    'kode_unit_audit' => $request->kodeUnitAudit,
                    'kode_sub_unit_audit' => $request->kodeSubUnitAudit,
                    'kode_bidang_obrik' => $request->kodeBidangObrik,
                    'peran' => $request->peran,
                    'peran_ren' => $request->peranRen,
                    'peran_lak' => $request->peranLak,
                    'peran_por' => $request->peranPor,
                    'peran_simhpnas' => $request->peranSimhpnas,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah User Pengguna';
            $activity = $auth->name . ' mengubah User Pengguna. Id User : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengubah User Pengguna. Id User : ' . $id);
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = Auth::user();
        $id = Hashids::decode($id)[0];
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menghapus Data Pkpt');
            return response()->json($response, 403);
        } else {
            $data = User::where('id', '=', $id)->first();
            $delete = $data->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus User Pengguna';
            $activity = $auth->name . ' menghapus User Pengguna. Id User : ' . $key . '. Nama User : ' . $data->name;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('menghapus User Pengguna. Id User : ' . $id . '. Nama User : ' . $data->name);
            return response()->json($response, 200);
        }
    }
}
