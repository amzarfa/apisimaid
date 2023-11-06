<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeUnitAudit;

class KodeUnitAuditController extends Controller
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
        $data = KodeUnitAudit::select(
            'kode_unit_audit as kodeUnitAudit',
            'nama_unit_audit as namaUnitAudit',
            'jenis',
            'jenis_unit_audit as jenisUnitAudit',
            'logo',
            'alamat',
            'phone',
        )->where('is_del', '=', 0)->get();
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
            $response = Helper::labelMessageForbidden('menambah Unit Audit');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeUnitAudit();
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->nama_unit_audit = $request->namaUnitAudit;
            $storeData->jenis = $request->jenis;
            $storeData->jenis_unit_audit = $request->jenisUnitAudit;
            $storeData->logo = $request->logo;
            $storeData->alamat = $request->alamat;
            $storeData->phone = $request->phone;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_unit_audit;
            $page = 'Tambah Unit Audit';
            $activity = $auth->name . ' menambah Unit Audit. Id Unit Audit : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Unit Audit. Id Unit Audit : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeUnitAudit::select(
            'kode_unit_audit as kodeUnitAudit',
            'nama_unit_audit as namaUnitAudit',
            'jenis',
            'jenis_unit_audit as jenisUnitAudit',
            'logo',
            'alamat',
            'phone',
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
            $response = Helper::labelMessageForbidden('mengubah Kode Unit Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeUnitAudit::where('kode_unit_audit', '=', $id)
                ->update([
                    // 'kode_unit_audit' => $request->kodeUnitAudit,
                    'nama_unit_audit' => $request->namaUnitAudit,
                    'jenis' => $request->jenis,
                    'jenis_unit_audit' => $request->jenisUnitAudit,
                    'logo' => $request->logo,
                    'alamat' => $request->alamat,
                    'phone' => $request->phone,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Unit Audit';
            $activity = $auth->name . ' mengubah Unit Audit. Kode Unit Audit : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Unit Audit. Kode Unit Audit : ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Unit Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeUnitAudit::where('kode_unit_audit', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Unit Audit';
            $activity = $auth->name . ' menghapus Unit Audit. Kode Unit Audit : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Unit Audit. Kode Unit Audit : ' . $key);
            return response()->json($response, 200);
        }
    }

    // Upload Logo Unit Audit
    public function uploadLogo(Request $request)
    {
        $dataUpload = $request->file('fileLogo');
        $kodeUnitAudit = $request->kodeUnitAudit;
        $response = Helper::uploadLogoUnitAudit($dataUpload, $kodeUnitAudit);
        if ($response != 'true') {
            return response()->json($response, 206);
        }
        return response()->json($response, 200);
    }
}
