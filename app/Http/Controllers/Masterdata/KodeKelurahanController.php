<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeKelurahan;
use Illuminate\Support\Facades\DB;

class KodeKelurahanController extends Controller
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

    //Search Kelurahan
    public function searchKelurahan(Request $request)
    {
        $auth = Auth::user();
        $isKl = substr($auth->kode_unit_audit, 0, 2); // Apakah Unit Audit KL atau Bukan
        $isProv = substr($auth->kode_unit_audit, 2, 4); // Apakah Unit Audit Provinsi atau Bukan

        $idprov = substr($auth->kode_unit_audit, 0, 2); // Substring Kode Provinsi
        $idKab = substr($auth->kode_unit_audit, 0, 4); // Substring Kode Kabupaten Kota

        $querySelect = array(
            'kelurahan.kode_provinsi as kodeProvinsi',
            'provinsi.nama_provinsi as namaProvinsi',
            'kelurahan.kode_kabkota as kodeKabKota',
            'kabkota.nama_kabkota as namaKabKota',
            'kelurahan.kode_kecamatan as kodeKecamatan',
            'kecamatan.nama_kecamatan as namaKecamatan',
            'kelurahan.kode_kelurahan as kodeKelurahan',
            'kelurahan.nama_kelurahan as namaKelurahan',
        );

        $query = DB::table('tr_kode_kelurahan as kelurahan')
            ->leftjoin('tr_kode_kecamatan as kecamatan', 'kecamatan.kode_kecamatan', '=', 'kelurahan.kode_kecamatan')
            ->leftjoin('tr_kode_kabupatenkota as kabkota', 'kabkota.kode_kabkota', '=', 'kelurahan.kode_kabkota')
            ->leftjoin('tr_kode_provinsi as provinsi', 'provinsi.kode_provinsi', '=', 'kelurahan.kode_provinsi')
            ->select($querySelect)
            ->where('kelurahan.is_del', '=', 0)
            ->where('kelurahan.nama_kelurahan', 'like', $request->search . '%');

        // Cek dulu apakah Unit Kerja merupakan KL atau Inspektorat Daerah
        if ($isKl == 00 || $isKl == 01) { // Ini untuk K/L, tampilkan seluruh Kelurahan/ Desa se-Indonesia
            $data = $query->get();
            $response = Helper::labelMessageSuccessWithCountData($data);
            return response()->json($response, 200);
        }

        // Provinsi/ Kabkota
        if ($isProv == 00 || $isProv == 99 || $isProv == 98) {
            $data = $query->where('kelurahan.kode_provinsi', '=', $idprov)->get(); // Jika Unit merupakan Provinsi
        } else {
            $data = $query->where('kelurahan.kode_kabkota', '=', $idKab)->get(); // Jika Unit merupakan Kabupaten Kota
        }

        $response = Helper::labelMessageSuccessWithCountData($data);
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = KodeKelurahan::select(
            'kode_kelurahan as kodeKelurahan',
            'kode_kecamatan as kodeKecamatan',
            'kode_kabkota as kodeKabKota',
            'kode_provinsi as kodeProvinsi',
            'nama_kelurahan as namaKelurahan',
            'jenis_kelurahan_desa as jenisKelurahan',
        )
            ->where('is_del', '=', 0)
            ->where('kode_kecamatan', '=', $request->kodeKecamatan)
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
