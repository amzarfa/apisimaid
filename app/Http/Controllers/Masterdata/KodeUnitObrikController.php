<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeUnitObrik;

class KodeUnitObrikController extends Controller
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
        $data = KodeUnitObrik::select(
            'tr_kode_unit_obrik.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_unit_obrik.kode_unit_obrik as kodeUnitObrik',
            'tr_kode_unit_obrik.nama_unit_obrik as namaUnitObrik',
        )
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_unit_obrik.kode_unit_audit')
            ->where('tr_kode_unit_obrik.is_del', '=', 0)
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
            $response = Helper::labelMessageForbidden('menambah Unit Obrik');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeUnitObrik();
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->kode_unit_obrik = $request->kodeUnitObrik;
            $storeData->nama_unit_obrik = $request->namaUnitObrik;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_unit_obrik;
            $page = 'Tambah Unit Obrik';
            $activity = $auth->name . ' menambah Unit Obrik. Kode Unit Obrik : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Unit Obrik. Kode Unit Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeUnitObrik::select(
            'tr_kode_unit_obrik.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_unit_obrik.kode_unit_obrik as kodeUnitObrik',
            'tr_kode_unit_obrik.nama_unit_obrik as namaUnitObrik',
        )
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_unit_obrik.kode_unit_audit')
            ->where('tr_kode_unit_obrik.is_del', '=', 0)
            ->where('tr_kode_unit_obrik.kode_unit_obrik', '=', $id)
            ->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Unit Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeUnitObrik::where('kode_unit_obrik', '=', $id)
                ->update([
                    'nama_unit_obrik' => $request->namaUnitObrik,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Unit Obrik';
            $activity = $auth->name . ' mengubah Unit Obrik. Kode Unit Obrik : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Unit Obrik: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Unit Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeUnitObrik::where('kode_unit_obrik', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Unit Obrik';
            $activity = $auth->name . ' menghapus Unit Obrik. Kode Unit Obrik : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Unit Obrik. Kode Unit Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }
}
