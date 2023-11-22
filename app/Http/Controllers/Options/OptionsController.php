<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Masterdata\KodeUnitObrik;
use App\Models\Masterdata\KodeBidangObrik;
use App\Models\Masterdata\KodeSubBidangObrik;
use App\Models\Masterdata\KodeSubUnitAudit;
use App\Models\Masterdata\KodeGrupLingkupAudit;
use App\Models\Masterdata\KodeLingkupAudit;
use App\Models\Masterdata\KodeJenisPengawasan;
use App\Models\Masterdata\KodeAreaPengawasan;
use App\Models\Masterdata\KodeTingkatResiko;

class OptionsController extends Controller
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

    // Options untuk Kode Unit Obrik
    public function kodeunitobrik(Request $request)
    {
        $data = KodeUnitObrik::select(
            'tr_kode_unit_obrik.kode_unit_obrik as value',
            'tr_kode_unit_obrik.nama_unit_obrik as label',
        )
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_unit_obrik.kode_unit_audit')
            ->where('tr_kode_unit_obrik.is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Bidang Audit
    public function bidangobrik(Request $request)
    {
        $data = KodeBidangObrik::select(
            'tr_kode_bidang_obrik.kode_bidang_obrik as value',
            'tr_kode_bidang_obrik.nama_bidang_obrik as label',
        )
            ->leftjoin('tr_kode_unit_obrik as unitobrik', 'unitobrik.kode_unit_obrik', '=', 'tr_kode_bidang_obrik.kode_unit_obrik')
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_bidang_obrik.kode_unit_audit')
            ->where('tr_kode_bidang_obrik.is_del', '=', 0)
            ->where('tr_kode_bidang_obrik.kode_unit_obrik', '=', $request->kodeUnitObrik)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Sub Bidang Audit
    public function subbidangobrik(Request $request)
    {
        $data = KodeSubBidangObrik::select(
            'kode_sub_bidang_obrik as value',
            'nama_sub_bidang_obrik as label',
        )
            ->where('is_del', '=', 0)
            ->where('kode_bidang_obrik', '=', $request->kodeBidangObrik)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Grup Unit Audit
    public function subunitaudit(Request $request)
    {
        $auth = Auth::user();
        $data = KodeSubUnitAudit::select(
            'tr_kode_sub_unit_audit.kode_sub_unit_audit as value',
            'tr_kode_sub_unit_audit.nama_sub_unit_audit as label',
        )
            ->where('tr_kode_sub_unit_audit.is_del', '=', 0)
            ->where('tr_kode_sub_unit_audit.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Grup Lingkup Audit
    public function gruplingkupaudit(Request $request)
    {
        $data = KodeGrupLingkupAudit::select(
            'kode_grup_lingkup_audit as value',
            'nama_grup_lingkup_audit as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Kode Lingkup Audit
    public function kodelingkupaudit(Request $request)
    {
        $data = KodeLingkupAudit::select(
            'tr_kode_lingkup_audit.kode_lingkup_audit as value',
            'tr_kode_lingkup_audit.nama_lingkup_audit as label',
        )
            ->where('tr_kode_lingkup_audit.is_del', '=', 0)
            ->where('tr_kode_lingkup_audit.kode_grup_lingkup_audit', '=', $request->kodeGrupLingkupAudit)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Kode Jenis Pengawasan
    public function jenispengawasan(Request $request)
    {
        $data = KodeJenisPengawasan::select(
            'kode_jenis_pengawasan as value',
            'nama_jenis_pengawasan as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Kode Area Pengawasan
    public function areapengawasan(Request $request)
    {
        $data = KodeAreaPengawasan::select(
            'kode_area_pengawasan as value',
            'nama_area_pengawasan as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options untuk Tingkat Resiko
    public function tingkatresiko(Request $request)
    {
        $data = KodeTingkatResiko::select(
            'kode_tingkat_resiko as value',
            'nama_tingkat_resiko as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }
}
