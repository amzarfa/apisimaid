<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeUnitAudit;
use App\Models\Masterdata\KodeSubUnitAudit;
use Illuminate\Support\Facades\DB;

class KodeSubUnitAuditController extends Controller
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
        $data = KodeSubUnitAudit::select(
            'tr_kode_sub_unit_audit.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_sub_unit_audit.kode_sub_unit_audit as kodeSubUnitAudit',
            'tr_kode_sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
        )
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_sub_unit_audit.kode_unit_audit')
            ->where('tr_kode_sub_unit_audit.is_del', '=', 0)->get();
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
            $response = Helper::labelMessageForbidden('menambah Sub Unit Audit');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeSubUnitAudit();
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->nama_sub_unit_audit = $request->namaSubUnitAudit;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_sub_unit_audit;
            $page = 'Tambah Sub Unit Audit';
            $activity = $auth->name . ' menambah Sub Unit Audit. Id Sub Unit Audit : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Sub Unit Audit. Id Sub Unit Audit : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeSubUnitAudit::select(
            'kode_sub_unit_audit as kodeSubUnitAudit',
            'kode_unit_audit as kodeUnitAudit',
            'nama_sub_unit_audit as namaSubUnitAudit',
        )->where('kode_unit_audit', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Sub Unit Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeSubUnitAudit::where('kode_sub_unit_audit', '=', $id)
                ->update([
                    'kode_sub_unit_audit' => $request->kodeSubUnitAudit,
                    'nama_sub_unit_audit' => $request->namaSubUnitAudit,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Sub Unit Audit';
            $activity = $auth->name . ' mengubah Sub Unit Audit. Kode Sub Unit Audit : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Sub Unit Audit: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Sub Unit Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeSubUnitAudit::where('kode_sub_unit_audit', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Sub Unit Audit';
            $activity = $auth->name . ' menghapus Sub Unit Audit. Kode Sub Unit Audit : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Sub Unit Audit. Kode Sub Unit Audit : ' . $key);
            return response()->json($response, 200);
        }
    }
}
