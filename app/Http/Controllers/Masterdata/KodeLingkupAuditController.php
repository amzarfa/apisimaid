<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeGrupLingkupAudit;
use App\Models\Masterdata\KodeLingkupAudit;
use Illuminate\Support\Facades\DB;

class KodeLingkupAuditController extends Controller
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
    public function index(Request $request)
    {
        $data = KodeLingkupAudit::select(
            'tr_kode_lingkup_audit.kode_grup_lingkup_audit as kodeGrupLingkupAudit',
            'grup.nama_grup_lingkup_audit as namaGrupLingkupAudit',
            'tr_kode_lingkup_audit.kode_lingkup_audit as kodeLingkupAudit',
            'tr_kode_lingkup_audit.nama_lingkup_audit as namaLingkupAudit',
        )
            ->leftjoin('tr_kode_grup_lingkup_audit as grup', 'grup.kode_grup_lingkup_audit', '=', 'tr_kode_lingkup_audit.kode_grup_lingkup_audit')
            ->where('tr_kode_lingkup_audit.is_del', '=', 0)
            ->where('tr_kode_lingkup_audit.kode_grup_lingkup_audit', '=', $request->kodeGrupLingkupAudit)
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
            $response = Helper::labelMessageForbidden('menambah Kode Lingkup Audit');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeLingkupAudit();
            $storeData->kode_grup_lingkup_audit = $request->kodeGrupLingkupAudit;
            $storeData->kode_lingkup_audit = $request->kodeLingkupAudit;
            $storeData->nama_lingkup_audit = $request->namaLingkupAudit;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_lingkup_audit;
            $page = 'Tambah Kode Lingkup Audit';
            $activity = $auth->name . ' menambah Kode Lingkup Audit. Id Kode Lingkup Audit : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Lingkup Audit. Id Kode Lingkup Audit : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeLingkupAudit::select(
            'kode_grup_lingkup_audit as kodeGrupLingkupAudit',
            'kode_lingkup_audit as kodeLingkupAudit',
            'nama_lingkup_audit as namaLingkupAudit',
        )->where('kode_lingkup_audit', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Lingkup Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeLingkupAudit::where('kode_lingkup_audit', '=', $id)
                ->update([
                    'kode_lingkup_audit' => $request->kodeLingkupAudit,
                    'nama_lingkup_audit' => $request->namaLingkupAudit,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Lingkup Audit';
            $activity = $auth->name . ' mengubah Kode Lingkup Audit. Kode Kode Lingkup Audit : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Lingkup Audit: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Lingkup Audit');
            return response()->json($response, 403);
        } else {
            $data = KodeLingkupAudit::where('kode_lingkup_audit', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Lingkup Audit';
            $activity = $auth->name . ' menghapus Kode Lingkup Audit. Kode Kode Lingkup Audit : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Lingkup Audit. Kode Kode Lingkup Audit : ' . $key);
            return response()->json($response, 200);
        }
    }
}
