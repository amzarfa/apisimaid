<?php

namespace App\Http\Controllers\Ren;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ren\Pkpt;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Resources\PkptResource;

class PkptController extends Controller
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
    public function selectPkpt()
    {
        $querySelect = array(
            'id_pkpt as idPkpt',
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

            'nama_pkpt as namaPkpt',
            'deskripsi_pkpt as deskripsiPkpt',
            'tahun_pkpt as tahunPkpt',
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
    public function index(Request $request)
    {
        $auth = Auth::user();
        $data = Pkpt::where('is_del', '=', 0)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('tahun_pkpt', '=', $request->tahunPkpt ? $request->tahunPkpt : date('Y'))
            ->select($this->selectPkpt())
            ->orderBy('id_pkpt', 'Desc')
            ->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            $data->anggaranBiaya = number_format($data->anggaranBiaya, 2, ',', '.');
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponse($response);
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
        $namaSubUnitAudit = Helper::getNamaSubUnitAudit($request->kodeSubUnitAudit);
        $namaUnitAudit = Helper::getNamaUnitAudit($request->kodeUnitAudit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);

        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menambah Data Pkpt');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new Pkpt();
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
            $storeData->nama_pkpt = $request->namaPkpt;
            $storeData->deskripsi_pkpt = $request->deskripsiPkpt;
            $storeData->tahun_pkpt = $request->tahunPkpt;
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
            $page = 'Tambah Data Pkpt';
            $activity = $auth->name . ' menambah Data Pkpt. Id Pkpt : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($storeData->id);
            $response = Helper::labelMessageSuccess('menambah Data Pkpt. Id Pkpt : ' . $id);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Hashids::decode($id)[0];
        $data = Pkpt::select($this->selectPkpt())
            ->where('id_pkpt', '=', $id)->first();
        $data->idPkpt = Hashids::encode($data->idPkpt);
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
        $namaSubUnitAudit = Helper::getNamaSubUnitAudit($request->kodeSubUnitAudit);
        $namaUnitAudit = Helper::getNamaUnitAudit($request->kodeUnitAudit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);

        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengubah Data Pkpt');
            return response()->json($response, 403);
        } else {
            $data = Pkpt::where('id_pkpt', '=', $id)
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
                    'nama_pkpt' => $request->namaPkpt,
                    'deskripsi_pkpt' => $request->deskripsiPkpt,
                    'tahun_pkpt' => $request->tahunPkpt,
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
            $page = 'Ubah Data Pkpt';
            $activity = $auth->name . ' mengubah Data Pkpt. Id Pkpt : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengubah Data Pkpt. Id Pkpt : ' . $id);
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
            $response = Helper::labelMessageForbidden('menghapus Data Pkpt');
            return response()->json($response, 403);
        } else {
            $data = Pkpt::where('id_pkpt', '=', $id)->update([
                'is_del' => '1',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Hapus Data Pkpt';
            $activity = $auth->name . ' menghapus Data Pkpt. Id Pkpt : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('menghapus Data Pkpt. Id Pkpt : ' . $id);
            return response()->json($response, 200);
        }
    }

    // List Pkpt Inactive
    public function pkptInactive(Request $request)
    {
        $auth = Auth::user();
        $data = Pkpt::where('is_del', '=', 1)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('tahun_pkpt', '=', $request->tahunPkpt ? $request->tahunPkpt : date('Y'))
            ->select($this->selectPkpt())
            ->orderBy('id_pkpt', 'Desc')
            ->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponse($response);
        return response()->json($customResponse, 200);
    }

    // Activate Pkpt
    public function activatePkpt(string $id)
    {
        $auth = Auth::user();
        $id = Hashids::decode($id)[0];
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengaktivasi Data Pkpt');
            return response()->json($response, 403);
        } else {
            $data = Pkpt::where('id_pkpt', '=', $id)->update([
                'is_del' => '0',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Aktivasi Data Pkpt';
            $activity = $auth->name . ' mengaktivasi Data Pkpt. Id Pkpt : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengaktivasi Data Pkpt. Id Pkpt : ' . $id);
            return response()->json($response, 200);
        }
    }
}
