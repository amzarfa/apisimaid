<?php

namespace App\Http\Controllers\Ren;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ren\Jakwas;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Str;

class JakwasController extends Controller
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
    public function selectJakwas()
    {
        $querySelect = array(
            'ren_jakwas.id_jakwas as idJakwas',
            'ren_jakwas.kode_sub_unit_audit as kodeSubUnitAudit',
            'sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
            'ren_jakwas.kode_unit_audit as kodeUnitAudit',
            'unit_audit.nama_unit_audit as namaUnitAudit',
            'tahun',
            'nama_jakwas as namaJakwas',
            'deskripsi',
            'ren_jakwas.created_by',
        );
        return $querySelect;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $auth = Auth::user();

        $query = Jakwas::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'ren_jakwas.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'ren_jakwas.kode_sub_unit_audit')
            ->select($this->selectJakwas())
            ->where('ren_jakwas.is_del', '=', 0)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->when($request->idJakwas, function ($q) use ($request) {
                $q->where('id_jakwas', '=', Hashids::decode($request->idJakwas));
            })
            ->when($request->tahun, function ($q) use ($request) {
                $q->where('tahun', '=', $request->tahun);
            })
            ->when($request->namaJakwas, function ($q) use ($request) {
                $q->where('nama_jakwas', 'LIKE', '%' . $request->namaJakwas . '%');
            })
            ->when($request->deskripsi, function ($q) use ($request) {
                $q->where('deskripsi', 'LIKE', '%' . $request->deskripsi . '%');
            })
            ->when($request->namaSubUnitAudit, function ($q) use ($request) {
                $q->where('nama_sub_unit_audit', 'LIKE', '%' . $request->namaSubUnitAudit . '%');
            })
            ->when($request->createdBy, function ($q) use ($request) {
                $q->where('ren_jakwas.created_by', 'LIKE', '%' . $request->createdBy . '%');
            });

        // Tangani sort by dari frontend
        if ($request->has('sort')) {
            $sorts = explode(',', $request->sort);
            foreach ($sorts as $sort) {
                $sortDetail = explode(':', $sort);
                $sortColumn = $sortDetail[0];
                $sortDirection = $sortDetail[1] ?? 'asc'; // Default ke ascend jika tidak ada arah yang diberikan
                $sortableColumns = [
                    'idJakwas', 'namaSubUnitAudit', 'namaUnitAudit', 'tahun',
                    'namaJakwas', 'deskripsi', 'createdBy', // camelCase dari frontend
                ];
                if (in_array($sortColumn, $sortableColumns)) {
                    $sortColumn = Str::snake($sortColumn); // Konversi ke snake_case untuk penggunaan dalam orderBy
                    $query->orderBy($sortColumn, $sortDirection);
                }
            }
        } else {
            $query->orderBy('id_jakwas', 'desc');
        }

        $data = $query->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idJakwas = Hashids::encode($data->idJakwas);
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponseRen($response);
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
            $response = Helper::labelMessageForbidden('menambah Data Jakwas');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new Jakwas();
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->tahun = $request->tahun;

            $storeData->nama_jakwas = $request->namaJakwas;
            $storeData->deskripsi = $request->deskripsi;

            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->id;
            $page = 'Tambah Data Jakwas';
            $activity = $auth->name . ' menambah Data Jakwas. Id Data Jakwas : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($storeData->id);
            $response = Helper::labelMessageSuccess('menambah Data Jakwas. Id Data Jakwas : ' . $id);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Hashids::decode($id)[0];
        $data = Jakwas::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'ren_jakwas.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'ren_jakwas.kode_sub_unit_audit')
            ->select(
                'ren_jakwas.id_jakwas as idJakwas',
                'ren_jakwas.kode_sub_unit_audit as kodeSubUnitAudit',
                'sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
                'ren_jakwas.kode_unit_audit as kodeUnitAudit',
                'unit_audit.nama_unit_audit as namaUnitAudit',
                'tahun',
                'nama_jakwas as namaJakwas',
                'deskripsi',
            )
            ->where('ren_jakwas.id_jakwas', '=', $id)
            ->first();
        $data->idJakwas = Hashids::encode($data->idJakwas);
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
        // return response()->json($id, 200);
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengubah Data Jakwas');
            return response()->json($response, 403);
        } else {
            $data = Jakwas::where('id_jakwas', '=', $id)
                ->update([
                    'tahun' => $request->tahun,
                    'nama_jakwas' => $request->namaJakwas,
                    'deskripsi' => $request->deskripsi,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Data Jakwas';
            $activity = $auth->name . ' mengubah Data Jakwas. Data Jakwas : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengubah Data Jakwas: ' . $id);
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
            $response = Helper::labelMessageForbidden('menghapus Data Jakwas');
            return response()->json($response, 403);
        } else {
            // $data = Jakwas::where('id_jakwas', '=', $id)->delete();
            $data = Jakwas::where('id_jakwas', '=', $id)->update([
                'is_del' => '1',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Hapus Data Jakwas';
            $activity = $auth->name . ' menghapus Data Jakwas. Kode Jakwas : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('menghapus Data Jakwas. Kode Jakwas : ' . $id);
            return response()->json($response, 200);
        }
    }

    // List Jakwas Inactive
    public function jakwasInactive(Request $request)
    {
        $auth = Auth::user();
        $data = Jakwas::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'ren_jakwas.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'ren_jakwas.kode_sub_unit_audit')
            ->where('ren_jakwas.is_del', '=', 1)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('ren_jakwas.tahun', '=', $request->tahun ? $request->tahun : date('Y'))
            ->select($this->selectJakwas())
            ->orderBy('ren_jakwas.id_jakwas', 'Desc')
            ->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idJakwas = Hashids::encode($data->idJakwas);
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponseRen($response);
        return response()->json($customResponse, 200);
    }

    // Activate Jakwas
    public function activateJakwas(string $id)
    {
        $auth = Auth::user();
        $id = Hashids::decode($id)[0];
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengaktivasi Data Jakwas');
            return response()->json($response, 403);
        } else {
            $data = Jakwas::where('id_jakwas', '=', $id)->update([
                'is_del' => '0',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Aktifkan kembali Data Jakwas';
            $activity = $auth->name . ' mengaktivasi Data Jakwas. Data Jakwas : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengaktivasi Data Jakwas. Data Jakwas : ' . $id);
            return response()->json($response, 200);
        }
    }
}
