<?php

namespace App\Http\Controllers\Ren;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ren\Jakwas;
use Illuminate\Support\Facades\DB;

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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
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
            ->where('ren_jakwas.is_del', '=', 0)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->orderBy('ren_jakwas.id_jakwas', 'Desc')
            ->get();
        $response = Helper::labelMessageSuccessWithCountData($data);
        return response()->json($response, 200);
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
            $response = Helper::labelMessageSuccess('menambah Data Jakwas. Id Data Jakwas : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
            ->where('ren_jakwas.id_jakwas', '=', $id)->first();
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
            $response = Helper::labelMessageSuccess('mengubah Data Jakwas: ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = Auth::user();
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
            $response = Helper::labelMessageSuccess('menghapus Data Jakwas. Kode Jakwas : ' . $key);
            return response()->json($response, 200);
        }
    }

    // List Jakwas Inactive
    public function jakwasInactive()
    {
        $auth = Auth::user();
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
            ->where('ren_jakwas.is_del', '=', 1)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->orderBy('ren_jakwas.id_jakwas', 'Desc')
            ->get();
        $response = Helper::labelMessageSuccessWithCountData($data);
        return response()->json($response, 200);
    }

    // Activate Jakwas
    public function activateJakwas(string $id)
    {
        $auth = Auth::user();
        // return response()->json($auth, 200);
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
            $response = Helper::labelMessageSuccess('mengaktivasi Data Jakwas. Data Jakwas : ' . $key);
            return response()->json($response, 200);
        }
    }
}
