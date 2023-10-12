<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeGrupLingkupAudit;

class KodeGrupLingkupAuditController extends Controller
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
        $data = KodeGrupLingkupAudit::select(
            'kode_grup_lingkup_audit as kodeGrupLingkupAudit',
            'nama_grup_lingkup_audit as namaGrupLingkupAudit',
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
            $response = Helper::labelMessageForbidden('menambah Kode Grup Lingkup Audit');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeGrupLingkupAudit();
            $storeData->kode_grup_lingkup_audit = $request->kodeGrupLingkupAudit;
            $storeData->nama_grup_lingkup_audit = $request->namaGrupLingkupAudit;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_grup_lingkup_audit;
            $page = 'Tambah Kode Grup Lingkup Audit';
            $activity = $auth->name . ' menambah Kode Grup Lingkup Audit. Id Kode Grup Lingkup Audit : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Grup Lingkup Audit. Id Kode Grup Lingkup Audit : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeGrupLingkupAudit::select(
            'kode_grup_lingkup_audit as kodeGrupLingkupAudit',
            'nama_grup_lingkup_audit as namaGrupLingkupAudit',
        )->where('kode_grup_lingkup_audit', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Grup Lingkup Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeGrupLingkupAudit::where('kode_grup_lingkup_audit', '=', $id)
                ->update([
                    'kode_grup_lingkup_audit' => $request->kodeGrupLingkupAudit,
                    'nama_grup_lingkup_audit' => $request->namaGrupLingkupAudit,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Grup Lingkup Audit';
            $activity = $auth->name . ' mengubah Kode Grup Lingkup Audit. Kode Kode Grup Lingkup Audit : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Grup Lingkup Audit: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Grup Lingkup Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeGrupLingkupAudit::where('kode_grup_lingkup_audit', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Grup Lingkup Audit';
            $activity = $auth->name . ' menghapus Kode Grup Lingkup Audit. Kode Kode Grup Lingkup Audit : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Grup Lingkup Audit. Kode Kode Grup Lingkup Audit : ' . $key);
            return response()->json($response, 200);
        }
    }
}
