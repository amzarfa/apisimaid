<?php

namespace App\Http\Controllers\Ren;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ren\Pkau;
use Illuminate\Support\Facades\DB;

class PkauController extends Controller
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
    public function selectPkau()
    {
        $querySelect = array(
            'id_pkau as idPkau',
            'id_jakwas as idJakwas',
            'kode_sub_unit_audit as kodeSubUnitAudit',
            'nama_sub_unit_audit as namaSubUnitAudit',
            'kode_unit_audit as kodeUnitAudit',
            'nama_unit_audit as namaUnitAudit',
            'kode_lingkup_audit as kodeLingkupAudit',
            'nama_lingkup_audit as namaLingkupAudit',
            'kode_area_pengawasan as kodeAreaPengawasan',
            'nama_area_pengawasan as namaAreaPengawasan',
            'kode_jenis_pengawasan as kodeJenisPengawasan',
            'nama_jenis_pengawasan as namaJenisPengawasan',
            'kode_tingkat_resiko as kodeTingkatResiko',
            'nama_tingkat_resiko as namaTingkatResiko',
            'kode_bidang_obrik as kodeBidangObrik',
            'nama_bidang_obrik as namaBidangObrik',

            'nama_pkau as namaPkau',
            'deskripsi_pkau as deskripsiPkau',
            'tahun_pkau as tahunPkau',
            'rmp',
            'rpl',
            'jumlah_hp_wpj as jumlahHariPengawasanWpj',
            'jumlah_hp_spv as jumlahHariPengawasanSpv',
            'jumlah_hp_kt as jumlahHariPengawasanKt',
            'jumlah_hp_at as jumlahHariPengawasanAt',
            'jumlah_hari_pengawasan as jumlahHariPengawasan',
            'anggaran_biaya as anggaranBiaya',
            'jumlah_lhp_terbit as jumlahLhpTerbit',
            'kebutuhan_sarpras as  kebutuhanSarpras',
            'keterangan',

            'created_at as createdAt',
            'updated_at as updatedAt',
            'created_by as createdBy',
            'updated_by as updatedBy',
        );
        return $querySelect;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user();
        $data = Pkau::where('is_del', '=', 0)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->select($this->selectPkau())
            ->orderBy('id_pkau', 'Desc')
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
        $namaSubUnitAudit = Helper::getNamaSubUnitAudit($request->kodeSubUnitAudit);
        $namaUnitAudit = Helper::getNamaUnitAudit($request->kodeUnitAudit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);

        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menambah Data Pkau');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new Pkau();
            $storeData->id_jakwas = $request->idJakwas;
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->nama_sub_unit_audit = $namaSubUnitAudit;
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->nama_unit_audit = $namaUnitAudit;
            $storeData->kode_lingkup_audit = $request->kodeLingkupAudit;
            $storeData->nama_lingkup_audit = $namaLingkupAudit;
            $storeData->kode_area_pengawasan = $request->kodeAreaPengawasan;
            $storeData->nama_area_pengawasan = $namaAreaPengawasan;
            $storeData->kode_jenis_pengawasan = $request->kodeJenisPengawasan;
            $storeData->nama_jenis_pengawasan = $namaJenisPengawasan;
            $storeData->kode_tingkat_resiko = $request->kodeTingkatResiko;
            $storeData->nama_tingkat_resiko = $namaTingkatResiko;
            $storeData->kode_bidang_obrik = $request->kodeBidangObrik;
            $storeData->nama_bidang_obrik = $namaBidangObrik;
            $storeData->nama_pkau = $request->namaPkau;
            $storeData->deskripsi_pkau = $request->deskripsiPkau;
            $storeData->tahun_pkau = $request->tahunPkau;
            $storeData->rmp = $request->rmp;
            $storeData->rpl = $request->rpl;
            $storeData->jumlah_hp_wpj = $request->jumlahHariPengawasanWpj;
            $storeData->jumlah_hp_spv = $request->jumlahHariPengawasanSpv;
            $storeData->jumlah_hp_kt = $request->jumlahHariPengawasanKt;
            $storeData->jumlah_hp_at = $request->jumlahHariPengawasanAt;
            $storeData->jumlah_hari_pengawasan = $request->jumlahHariPengawasan;
            $storeData->anggaran_biaya = $request->anggaranBiaya;
            $storeData->jumlah_lhp_terbit = $request->jumlahLhpTerbit;
            $storeData->kebutuhan_sarpras = $request->kebutuhanSarpras;
            $storeData->keterangan = $request->keterangan;

            // Audit Trails
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->id;
            $page = 'Tambah Data Pkau';
            $activity = $auth->name . ' menambah Data Pkau. Id Pkau : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Data Pkau. Id Pkau : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pkau::select($this->selectPkau())
            ->where('id_pkau', '=', $id)->first();
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
        $namaSubUnitAudit = Helper::getNamaSubUnitAudit($request->kodeSubUnitAudit);
        $namaUnitAudit = Helper::getNamaUnitAudit($request->kodeUnitAudit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);

        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengubah Data Pkau');
            return response()->json($response, 403);
        } else {
            $data = Pkau::where('id_pkau', '=', $id)
                ->update([
                    'id_jakwas' => $request->idJakwas,
                    'kode_sub_unit_audit' => $request->kodeSubUnitAudit,
                    'nama_sub_unit_audit' => $namaSubUnitAudit,
                    'kode_unit_audit' => $request->kodeUnitAudit,
                    'nama_unit_audit' => $namaUnitAudit,
                    'kode_lingkup_audit' => $request->kodeLingkupAudit,
                    'nama_lingkup_audit' => $namaLingkupAudit,
                    'kode_area_pengawasan' => $request->kodeAreaPengawasan,
                    'nama_area_pengawasan' => $namaAreaPengawasan,
                    'kode_jenis_pengawasan' => $request->kodeJenisPengawasan,
                    'nama_jenis_pengawasan' => $namaJenisPengawasan,
                    'kode_tingkat_resiko' => $request->kodeTingkatResiko,
                    'nama_tingkat_resiko' => $namaTingkatResiko,
                    'kode_bidang_obrik' => $request->kodeBidangObrik,
                    'nama_bidang_obrik' => $namaBidangObrik,
                    'nama_pkau' => $request->namaPkau,
                    'deskripsi_pkau' => $request->deskripsiPkau,
                    'tahun_pkau' => $request->tahunPkau,
                    'rmp' => $request->rmp,
                    'rpl' => $request->rpl,
                    'jumlah_hp_wpj' => $request->jumlahHariPengawasanWpj,
                    'jumlah_hp_spv' => $request->jumlahHariPengawasanSpv,
                    'jumlah_hp_kt' => $request->jumlahHariPengawasanKt,
                    'jumlah_hp_at' => $request->jumlahHariPengawasanAt,
                    'jumlah_hari_pengawasan' => $request->jumlahHariPengawasan,
                    'anggaran_biaya' => $request->anggaranBiaya,
                    'jumlah_lhp_terbit' => $request->jumlahLhpTerbit,
                    'kebutuhan_sarpras' => $request->kebutuhanSarpras,
                    'keterangan' => $request->keterangan,

                    // Audit Trails
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Data Pkau';
            $activity = $auth->name . ' mengubah Data Pkau. Data Pkau : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Data Pkau: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Data Pkau');
            return response()->json($response, 403);
        } else {
            // $data = Pkau::where('id_pkau', '=', $id)->delete();
            $data = Pkau::where('id_pkau', '=', $id)->update([
                'is_del' => '1',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Hapus Data Pkau';
            $activity = $auth->name . ' menghapus Data Pkau. Id Pkau : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Data Pkau. Id Pkau : ' . $key);
            return response()->json($response, 200);
        }
    }

    // List Pkau Inactive
    public function pkauInactive()
    {
        $auth = Auth::user();
        $data = Pkau::where('is_del', '=', 1)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->select($this->selectPkau())
            ->orderBy('id_pkau', 'Desc')
            ->get();
        $response = Helper::labelMessageSuccessWithCountData($data);
        return response()->json($response, 200);
    }

    // Activate Pkau
    public function activatePkau(string $id)
    {
        $auth = Auth::user();
        // return response()->json($auth, 200);
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengaktivasi Data Pkau');
            return response()->json($response, 403);
        } else {
            $data = Pkau::where('id_pkau', '=', $id)->update([
                'is_del' => '0',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Aktifkan kembali Data Pkau';
            $activity = $auth->name . ' mengaktivasi Data Pkau. Id Pkau : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengaktivasi Data Pkau. Id Pkau : ' . $key);
            return response()->json($response, 200);
        }
    }
}
