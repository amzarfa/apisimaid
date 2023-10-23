<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\DataPegawai;
use Illuminate\Support\Facades\DB;

class DataPegawaiController extends Controller
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
        $auth = Auth::user();
        $data = DataPegawai::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'tr_data_pegawai.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'tr_data_pegawai.kode_sub_unit_audit')
            ->select(
                'tr_data_pegawai.id',
                'tr_data_pegawai.kode_sub_unit_audit as kodeSubUnitAudit',
                'sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
                'tr_data_pegawai.kode_unit_audit as kodeUnitAudit',
                'unit_audit.nama_unit_audit as namaUnitAudit',
                'nip',
                'nip_lama as nipLama',
                'nama',
                'nama_dan_gelar as namaDanGelar',
                'email',
                'tempat_lahir as tempatLahir',
                'tgl_lahir as tanggalLahir',
                'jenis_kelamin as jenisKelamin',
                'golongan_ruang as golonganRuang',
                'nama_pangkat as namaPangkat',
                'jabatan',
                'status',
            )
            ->where('tr_data_pegawai.is_del', '=', 0)
            ->where('tr_data_pegawai.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->orderBy('tr_data_pegawai.id', 'Desc')
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
            $response = Helper::labelMessageForbidden('menambah Data Pegawai');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new DataPegawai();
            $storeData->kode_sub_unit_audit = $request->kodeSubUnitAudit;
            $storeData->kode_unit_audit = $request->kodeUnitAudit;
            $storeData->nip = $request->nip;
            $storeData->nip_lama = $request->nipLama;
            $storeData->nama = $request->nama;
            $storeData->nama_dan_gelar = $request->namaDanGelar;
            $storeData->email = $request->email;
            $storeData->tempat_lahir = $request->tempatLahir;
            $storeData->tgl_lahir = $request->tanggalLahir;
            $storeData->jenis_kelamin = $request->jenisKelamin;
            $storeData->golongan_ruang = $request->golonganRuang;
            $storeData->nama_pangkat = $request->namaPangkat;
            $storeData->jabatan = $request->jabatan;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->id;
            $page = 'Tambah Data Pegawai';
            $activity = $auth->name . ' menambah Data Pegawai. Id Data Pegawai : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Data Pegawai. Id Data Pegawai : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DataPegawai::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'tr_data_pegawai.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'tr_data_pegawai.kode_sub_unit_audit')
            ->select(
                'tr_data_pegawai.id',
                'tr_data_pegawai.kode_sub_unit_audit as kodeSubUnitAudit',
                'sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
                'tr_data_pegawai.kode_unit_audit as kodeUnitAudit',
                'unit_audit.nama_unit_audit as namaUnitAudit',
                'nip',
                'nip_lama as nipLama',
                'nama',
                'nama_dan_gelar as namaDanGelar',
                'email',
                'tempat_lahir as tempatLahir',
                'tgl_lahir as tanggalLahir',
                'jenis_kelamin as jenisKelamin',
                'golongan_ruang as golonganRuang',
                'nama_pangkat as namaPangkat',
                'jabatan',
                'status',
            )
            ->where('tr_data_pegawai.id', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Data Pegawai');
            return response()->json($response, 403);
        } else {
            $data = DataPegawai::where('id', '=', $id)
                ->update([
                    'kode_sub_unit_audit' => $request->kodeSubUnitAudit,
                    'kode_unit_audit' => $request->kodeUnitAudit,
                    'nip' => $request->nip,
                    'nip_lama' => $request->nipLama,
                    'nama' => $request->nama,
                    'nama_dan_gelar' => $request->namaDanGelar,
                    'email' => $request->email,
                    'tempat_lahir' => $request->tempatLahir,
                    'tgl_lahir' => $request->tanggalLahir,
                    'jenis_kelamin' => $request->jenisKelamin,
                    'golongan_ruang' => $request->golonganRuang,
                    'nama_pangkat' => $request->namaPangkat,
                    'jabatan' => $request->jabatan,
                    'status' => $request->status,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Data Pegawai';
            $activity = $auth->name . ' mengubah Data Pegawai. Data Pegawai : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Data Pegawai: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Data Pegawai');
            return response()->json($response, 403);
        } else {
            // $data = DataPegawai::where('id', '=', $id)->delete();
            $data = DataPegawai::where('id', '=', $id)->update([
                'status' => 'inactive',
                'is_del' => '1',
                'updated_by' => $auth->name,
            ]);

            // Log Activity
            $key = $id;
            $page = 'Hapus Data Pegawai';
            $activity = $auth->name . ' menghapus Data Pegawai. Data Pegawai : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Data Pegawai. Data Pegawai : ' . $key);
            return response()->json($response, 200);
        }
    }
}
