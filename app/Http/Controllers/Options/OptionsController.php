<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Masterdata\KodeUnitObrik;
use App\Models\Masterdata\KodeBidangObrik;
use App\Models\Masterdata\KodeSubBidangObrik;
use App\Models\Masterdata\KodeSubUnitAudit;
use App\Models\Masterdata\KodeGrupLingkupAudit;
use App\Models\Masterdata\KodeLingkupAudit;
use App\Models\Masterdata\KodeJenisPengawasan;
use App\Models\Masterdata\KodeAreaPengawasan;
use App\Models\Masterdata\KodeTingkatResiko;
use App\Models\Ren\Jakwas;
use App\Models\UsersPeran;
use App\Models\Masterdata\KodePeran;
use App\Models\Masterdata\KodeUnitAudit;
use App\Models\Masterdata\KodeJenisAnggaran;
use App\Models\Masterdata\KodeJenisObrik;
use App\Models\Masterdata\KodeProvinsi;
use App\Models\Masterdata\KodeKabkota;
use App\Models\Masterdata\KodeKecamatan;
use App\Models\Masterdata\KodeKelurahan;
use App\Models\Masterdata\DataPegawai;

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
        $auth = Auth::user();
        $data = KodeUnitObrik::select(
            'kode_unit_obrik as value',
            'nama_unit_obrik as label',
        )
            ->where('is_del', '=', 0)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
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

    // Options Jakwas
    public function optionjakwas(Request $request)
    {
        $auth = Auth::user();
        $data = Jakwas::select(
            'id_jakwas as value',
            'nama_jakwas as label',
        )
            ->where('is_del', '=', 0)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('tahun', $request->tahun ? $request->tahun : date('Y'))
            ->get();
        $data->transform(function ($data) {
            $data->value = Hashids::encode($data->value);
            return $data;
        });
        return response()->json($data, 200);
    }

    // Options Users Peran
    public function optionusersperan(Request $request)
    {
        $auth = Auth::user();
        $data = UsersPeran::select(
            'kode_peran as value',
            'nama_peran as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Peran Tim
    public function optionperantim(Request $request)
    {
        $auth = Auth::user();
        $data = KodePeran::select(
            'kode_peran as value',
            'nama_peran as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Unit Audit
    public function optionunitaudit(Request $request)
    {
        $auth = Auth::user();
        $data = KodeUnitAudit::select(
            'kode_unit_audit as value',
            'nama_unit_audit as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Jenis Anggaran
    public function optionjenisanggaran(Request $request)
    {
        $auth = Auth::user();
        $data = KodeJenisAnggaran::select(
            'kode_jenis_anggaran as value',
            'nama_jenis_anggaran as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Jenis Obrik
    public function optionjenisobrik(Request $request)
    {
        $auth = Auth::user();
        $data = KodeJenisObrik::select(
            'kode_jenis_obrik as value',
            'nama_jenis_obrik as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Provinsi
    public function optionprovinsi(Request $request)
    {
        $auth = Auth::user();
        $data = KodeProvinsi::select(
            'kode_provinsi as value',
            'nama_provinsi as label',
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }

    // Options Kabkota
    public function optionkabkota(Request $request)
    {
        $auth = Auth::user();
        $data = KodeKabkota::select(
            'kode_kabkota as value',
            'nama_kabkota as label',
        )
            ->where('is_del', '=', 0)
            ->where('kode_provinsi', $request->kodeProvinsi)
            ->get();
        return response()->json($data, 200);
    }

    // Options Kecamatan
    public function optionkecamatan(Request $request)
    {
        $auth = Auth::user();
        $data = KodeKecamatan::select(
            'kode_kecamatan as value',
            'nama_kecamatan as label',
        )
            ->where('is_del', '=', 0)
            ->where('kode_kabkota', $request->kodeKabkota)
            ->get();
        return response()->json($data, 200);
    }

    // Options Kelurahan
    public function optionkelurahan(Request $request)
    {
        $auth = Auth::user();
        $data = KodeKelurahan::select(
            'kode_kelurahan as value',
            'nama_kelurahan as label',
        )
            ->where('is_del', '=', 0)
            ->where('kode_kecamatan', $request->kodeKecamatan)
            ->get();
        return response()->json($data, 200);
    }

    // Options Data Pegawai
    public function optiondatapegawai(Request $request)
    {
        $auth = Auth::user();
        $data = DataPegawai::select(
            'id as value',
            DB::raw("CONCAT(nama, ' - ', nip) as label"),
        )
            ->where('is_del', '=', 0)
            ->get();
        return response()->json($data, 200);
    }
}
