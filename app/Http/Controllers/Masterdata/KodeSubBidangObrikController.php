<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Masterdata\KodeSubBidangObrik;

class KodeSubBidangObrikController extends Controller
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
        $data = KodeSubBidangObrik::select(
            'tr_kode_sub_bidang_obrik.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_sub_bidang_obrik.kode_unit_obrik as kodeUnitObrik',
            'unitobrik.nama_unit_obrik as namaUnitObrik',
            'tr_kode_sub_bidang_obrik.kode_bidang_obrik as kodeBidangObrik',
            'bidangobrik.nama_bidang_obrik as namaBidangObrik',
            'tr_kode_sub_bidang_obrik.kode_bidang_obrik as kodeSubBidangObrik',
            'tr_kode_sub_bidang_obrik.nama_bidang_obrik as namaSubBidangObrik',
        )
            ->leftjoin('tr_kode_bidang_obrik as bidangobrik', 'bidangobrik.kode_bidang_obrik', '=', 'tr_kode_sub_bidang_obrik.kode_bidang_obrik')
            ->leftjoin('tr_kode_unit_obrik as unitobrik', 'unitobrik.kode_unit_obrik', '=', 'tr_kode_sub_bidang_obrik.kode_unit_obrik')
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_sub_bidang_obrik.kode_unit_audit')
            ->where('tr_kode_sub_bidang_obrik.is_del', '=', 0)
            ->where('tr_kode_sub_bidang_obrik.kode_bidang_obrik', '=', $request->kodeBidangObrik)
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
