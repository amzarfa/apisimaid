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
use App\Exports\Ren\PkptExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Dompdf\Dompdf;

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
            'nama_pkpt as namaPkpt',
            'deskripsi_pkpt as deskripsiPkpt',
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
            'kebutuhan_sarpras as kebutuhanSarpras',
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

        // All where ada di sini
        $whereData = array();
        $whereData[] = array('tahun_pkpt', '=', $request->tahun ? $request->tahun : date('Y'));
        $whereData[] = array('nama_sub_unit_audit', 'LIKE', '%' . $request->namaSubUnitAudit . '%' ? '%' . $request->namaSubUnitAudit . '%' : '');
        $whereData[] = array('nama_lingkup_audit', 'LIKE', '%' . $request->namaLingkupAudit . '%' ? '%' . $request->namaLingkupAudit . '%' : '');
        $whereData[] = array('nama_area_pengawasan', 'LIKE', '%' . $request->namaAreaPengawasan . '%' ? '%' . $request->namaAreaPengawasan . '%' : '');
        $whereData[] = array('nama_jenis_pengawasan', 'LIKE', '%' . $request->namaJenisPengawasan . '%' ? '%' . $request->namaJenisPengawasan . '%' : '');
        $whereData[] = array('nama_tingkat_resiko', 'LIKE', '%' . $request->namaTingkatResiko . '%' ? '%' . $request->namaTingkatResiko . '%' : '');
        $whereData[] = array('nama_bidang_obrik', 'LIKE', '%' . $request->namaBidangObrik . '%' ? '%' . $request->namaBidangObrik . '%' : '');
        $whereData[] = array('nama_pkpt', 'LIKE', '%' . $request->namaPkpt . '%' ? '%' . $request->namaPkpt . '%' : '');
        $whereData[] = array('rmp', 'LIKE', '%' . $request->rmp . '%' ? '%' . $request->rmp . '%' : '');
        $whereData[] = array('rpl', 'LIKE', '%' . $request->rpl . '%' ? '%' . $request->rpl . '%' : '');
        $whereData[] = array('created_by', 'LIKE', '%' . $request->createdBy . '%' ? '%' . $request->createdBy . '%' : '');

        $query = Pkpt::where('is_del', '=', 0)
            ->select($this->selectPkpt())
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->when($request->idPkpt, function ($q) use ($request) {
                $q->where('id_pkpt', '=', Hashids::decode($request->idPkpt));
            })
            ->where($whereData);

        // Tangani sort by dari frontend
        if ($request->has('sort')) {
            $sorts = explode(',', $request->sort);
            foreach ($sorts as $sort) {
                $sortDetail = explode(':', $sort);
                $sortColumn = $sortDetail[0];
                $sortDirection = $sortDetail[1] ?? 'asc'; // Default ke ascend jika tidak ada arah yang diberikan
                $sortableColumns = [
                    'namaSubUnitAudit', 'namaLingkupAudit', 'namaAreaPengawasan', 'namaJenisPengawasan',
                    'namaTingkatResiko', 'namaBidangObrik', 'namaPkpt', 'rmp', 'rpl', 'createdBy', // camelCase dari frontend
                ];
                if (in_array($sortColumn, $sortableColumns)) {
                    $sortColumn = Str::snake($sortColumn); // Konversi ke snake_case untuk penggunaan dalam orderBy
                    $query->orderBy($sortColumn, $sortDirection);
                }
            }
            // return response()->json("Ada Sort By", 200);
            $query->orderBy('id_pkpt', 'desc');
        } else {
            // return response()->json("Tidak Ada Sort By", 200);
            $query->orderBy('id_pkpt', 'desc');
        }

        $data = $query->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            $data->anggaranBiaya = number_format($data->anggaranBiaya, 2, ',', '.');
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponseRen($response);
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
        $namaUnitAudit = Helper::getNamaUnitAudit($auth->kode_unit_audit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);
        $idJakwas = Hashids::decode($request->idJakwas)[0];
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menambah Data Pkpt');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new Pkpt();
            $storeData->id_jakwas = $idJakwas;
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->nama_sub_unit_audit = $namaSubUnitAudit;
            $storeData->kode_unit_audit = $auth->kode_unit_audit;
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
            $keyname = $request->namaPkpt;
            Helper::createLogActivity($key, $page, $activity, $method, $keyname);

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
        $kodeUnitObrik = substr($data->kodeBidangObrik, 0, 6);
        $data->kodeUnitObrik = $kodeUnitObrik;
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
        $id = Hashids::decode($id)[0];
        $data = Pkpt::select($this->selectPkpt())
            ->where('id_pkpt', '=', $id)->first();
        $kodeUnitObrik = substr($data->kodeBidangObrik, 0, 6);
        $data->kodeUnitObrik = $kodeUnitObrik;
        $data->idPkpt = Hashids::encode($data->idPkpt);
        $data->idJakwas = Hashids::encode($data->idJakwas);
        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auth = Auth::user();
        $id = Hashids::decode($id)[0];
        $namaSubUnitAudit = Helper::getNamaSubUnitAudit($request->kodeSubUnitAudit);
        $namaUnitAudit = Helper::getNamaUnitAudit($auth->kode_unit_audit);
        $namaLingkupAudit = Helper::getNamaLingkupAudit($request->kodeLingkupAudit);
        $namaAreaPengawasan = Helper::getNamaAreaPengawasan($request->kodeAreaPengawasan);
        $namaJenisPengawasan = Helper::getNamaJenisPengawasan($request->kodeJenisPengawasan);
        $namaTingkatResiko = Helper::getNamaTingkatResiko($request->kodeTingkatResiko);
        $namaBidangObrik = Helper::getNamaBidangObrik($request->kodeBidangObrik);
        $idJakwas = Hashids::decode($request->idJakwas)[0];

        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('mengubah Data Pkpt');
            return response()->json($response, 403);
        } else {
            $data = Pkpt::where('id_pkpt', '=', $id)
                ->update([
                    'id_jakwas' => $idJakwas,
                    'kode_sub_unit_audit' => $request->kodeSubUnitAudit,
                    'nama_sub_unit_audit' => $namaSubUnitAudit,
                    'kode_unit_audit' => $auth->kode_unit_audit,
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
            $keyname = $request->namaPkpt;
            Helper::createLogActivity($key, $page, $activity, $method, $keyname);

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
            $keyname = Pkpt::select('nama_pkpt')->where('id_pkpt', '=', $id)->first();
            Helper::createLogActivity($key, $page, $activity, $method, $keyname);

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
            ->where('tahun_pkpt', '=', $request->tahun ? $request->tahun : date('Y'))
            ->select($this->selectPkpt())
            ->orderBy('id_pkpt', 'Desc')
            ->paginate($request->perPage ? $request->perPage : 10);
        $data->getCollection()->transform(function ($data) {
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            return $data;
        });
        $response = $data->toArray();
        $customResponse = Helper::paginateCustomResponseRen($response);
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
            $keyname = Pkpt::select('nama_pkpt')->where('id_pkpt', '=', $id)->first();
            Helper::createLogActivity($key, $page, $activity, $method, $keyname);

            // Response
            $id = Hashids::encode($id);
            $response = Helper::labelMessageSuccess('mengaktivasi Data Pkpt. Id Pkpt : ' . $id);
            return response()->json($response, 200);
        }
    }

    // Search
    public function search(Request $request)
    {
        $auth = Auth::user();
        $data = Pkpt::where('is_del', '=', 0)
            ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('nama_pkpt', 'like', '%' . $request->search . '%')
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
        $customResponse = Helper::paginateCustomResponseRen($response);
        return response()->json($customResponse, 200);
    }

    // Export Excel
    public function downloadPkpt(Request $request)
    {
        // $auth = Auth::user();
        $data = Pkpt::where('is_del', '=', 0)
            // ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->where('tahun_pkpt', '=', $request->tahun ? $request->tahun : date('Y'))
            ->select($this->selectPkpt())
            ->orderBy('id_pkpt', 'Desc')
            ->get();
        $data->transform(function ($data) {
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            $data->anggaranBiaya = number_format($data->anggaranBiaya, 2, ',', '.');
            return $data;
        });
        $response = $data;
        // return Excel::download(new PkptExport($response), 'PKPT Export ' . $auth->nama_unit_audit . '.xlsx');
        return Excel::download(new PkptExport($response), 'PKPT Export.xlsx');
    }

    // Export Pdf
    public function downloadPkptPdf(Request $request)
    {
        // $auth = Auth::user();
        $data = Pkpt::where('is_del', '=', 0)
            // ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
            ->select($this->selectPkpt())
            ->orderBy('namaJenisPengawasan') // Tambahan
            ->orderBy('id_pkpt', 'Desc')
            ->get();

        $groupedData = $data->groupBy('namaJenisPengawasan');
        $totalAnggaranPerNamaJenisPengawasan = [];
        foreach ($groupedData as $namaJenisPengawasan => $group) {
            $totalAnggaranPerNamaJenisPengawasan[$namaJenisPengawasan] = $group->sum('anggaranBiaya');
        }

        $jumlahPkptPerNamaJenisPengawasan = [];
        foreach ($groupedData as $jumlahPkpt => $group) {
            $jumlahPkptPerNamaJenisPengawasan[$jumlahPkpt] = $group->count('idPkpt');
        }

        $totalAnggaran = $data->sum('anggaranBiaya');
        $data->transform(function ($data, $key) {
            $data->no = $key + 1;
            $data->idPkpt = Hashids::encode($data->idPkpt);
            $data->idJakwas = Hashids::encode($data->idJakwas);
            $data->anggaranBiaya = number_format($data->anggaranBiaya, 2, ',', '.');
            return $data;
        });

        // mulai dari sini download pdf
        $response = [
            'totalAnggaran' => number_format($totalAnggaran, 2, ',', '.'),
            'data' => $data,
            'groupedData' => $groupedData,
            'totalAnggaranPerNamaJenisPengawasan' => $totalAnggaranPerNamaJenisPengawasan,
            'jumlahPkptPerNamaJenisPengawasan' => $jumlahPkptPerNamaJenisPengawasan,
        ];
        // dd($response);
        // die();

        $pdf = PDF::loadView('exports.pkptexport', [
            'totalAnggaran' => number_format($totalAnggaran, 2, ',', '.'),
            'data' => $data,
            'groupedData' => $groupedData,
            'totalAnggaranPerNamaJenisPengawasan' => $totalAnggaranPerNamaJenisPengawasan,
            'jumlahPkptPerNamaJenisPengawasan' => $jumlahPkptPerNamaJenisPengawasan,
        ]);

        // return $pdf->download('PKPT Export ' . $auth->nama_unit_audit . '.pdf');
        return $pdf->download('PKPT Export.pdf');
    }

    // Export Pdf
    // public function downloadPkptPdf(Request $request)
    // {
    //     // $auth = Auth::user();
    //     $data = Pkpt::where('is_del', '=', 0)
    //         // ->where('kode_unit_audit', '=', $auth->kode_unit_audit)
    //         ->select($this->selectPkpt())
    //         ->orderBy('namaJenisPengawasan') // Tambahan
    //         ->orderBy('id_pkpt', 'Desc')
    //         ->get();

    //     $groupedData = $data->groupBy('namaJenisPengawasan');
    //     $totalAnggaranPerNamaJenisPengawasan = [];
    //     foreach ($groupedData as $namaJenisPengawasan => $group) {
    //         $totalAnggaranPerNamaJenisPengawasan[$namaJenisPengawasan] = $group->sum('anggaranBiaya');
    //     }

    //     $jumlahPkptPerNamaJenisPengawasan = [];
    //     foreach ($groupedData as $jumlahPkpt => $group) {
    //         $jumlahPkptPerNamaJenisPengawasan[$jumlahPkpt] = $group->count('idPkpt');
    //     }

    //     // dd($jumlahPkptPerNamaJenisPengawasan);
    //     // die();

    //     $totalAnggaran = $data->sum('anggaranBiaya');
    //     $data->transform(function ($data, $key) {
    //         $data->no = $key + 1;
    //         $data->idPkpt = Hashids::encode($data->idPkpt);
    //         $data->idJakwas = Hashids::encode($data->idJakwas);
    //         $data->anggaranBiaya = number_format($data->anggaranBiaya, 2, ',', '.');
    //         return $data;
    //     });

    //     // Setup Dompdf
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $options->set('isPhpEnabled', true);

    //     $dompdf = new Dompdf($options);

    //     $result = [
    //         'totalAnggaran' => number_format($totalAnggaran, 2, ',', '.'),
    //         'data' => $data,
    //         'groupedData' => $groupedData,
    //         'totalAnggaranPerNamaJenisPengawasan' => $totalAnggaranPerNamaJenisPengawasan,
    //         'jumlahPkptPerNamaJenisPengawasan' => $jumlahPkptPerNamaJenisPengawasan,
    //     ];

    //     // Load view content into a variable
    //     $viewContent = view('exports.pkptexport', [
    //         'totalAnggaran' => number_format($totalAnggaran, 2, ',', '.'),
    //         'data' => $data,
    //         'groupedData' => $groupedData,
    //         'totalAnggaranPerNamaJenisPengawasan' => $totalAnggaranPerNamaJenisPengawasan,
    //         'jumlahPkptPerNamaJenisPengawasan' => $jumlahPkptPerNamaJenisPengawasan,
    //     ])->render();

    //     // Load HTML content into Dompdf
    //     $dompdf->loadHtml($viewContent);

    //     // Set paper size
    //     $dompdf->setPaper('A4', 'landscape');

    //     // Render PDF (first pass to get the total pages)
    //     $dompdf->render();

    //     // Output the PDF as a blob
    //     $pdfBlob = $dompdf->output();

    //     // Set response headers
    //     $headers = [
    //         'Content-Type' => 'application/pdf',
    //         // 'Content-Disposition' => 'inline; filename="PKPT Export ' . $auth->nama_unit_audit . '.pdf"',
    //         'Content-Disposition' => 'inline; filename="PKPT Export.pdf"',
    //     ];

    //     // Return the PDF as a blob
    //     // return response($pdfBlob, 200, $headers);
    //     return $pdfBlob->download('PKPT Export.pdf');
    // }

    // Testing
    public function test(Request $request)
    {
        $response = "BERHASIL LIHAT PAGE TEST";
        return response()->json($response, 200);
    }
}
