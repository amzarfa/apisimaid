<?php

namespace App\Http\Controllers\Ren;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ren\Jakwas;
use Illuminate\Support\Facades\DB;

class JakwasController extends Controller
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
        $data = Jakwas::leftjoin('tr_kode_unit_audit as unit_audit', 'unit_audit.kode_unit_audit', '=', 'ren_jakwas.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as sub_unit_audit', 'sub_unit_audit.kode_sub_unit_audit', '=', 'ren_jakwas.kode_sub_unit_audit')
            ->select(
                'ren_jakwas.id_jakwas as idJakwas',
                'ren_jakwas.kode_sub_unit_audit as kodeSubUnitAudit',
                'sub_unit_audit.nama_sub_unit_audit as namaSubUnitAudit',
                'ren_jakwas.kode_unit_audit as kodeUnitAudit',
                'unit_audit.nama_unit_audit as namaUnitAudit',
                'tahun',
                'nama_jakwas as namaJakwas',
                'deskripsi',
            )
            ->where('ren_jakwas.is_del', '=', 0)
            ->where('ren_jakwas.kode_unit_audit', '=', $auth->kode_unit_audit)
            ->orderBy('ren_jakwas.id_jakwas', 'Desc')
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
