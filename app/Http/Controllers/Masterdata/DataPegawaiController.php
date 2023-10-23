<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\DataPegawai;

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
        $data = DataPegawai::select(
            'kode_sub_unit_audit as kodeSubUnitAudit',
            'kode_unit_audit as kodeUnitAudit',
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
