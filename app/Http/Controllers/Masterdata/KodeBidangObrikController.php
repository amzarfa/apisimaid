<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Masterdata\KodeBidangObrik;

class KodeBidangObrikController extends Controller
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
        $data = KodeBidangObrik::select(
            'tr_kode_bidang_obrik.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_bidang_obrik.kode_unit_obrik as kodeUnitObrik',
            'unitobrik.nama_unit_obrik as namaUnitObrik',
            'tr_kode_bidang_obrik.kode_bidang_obrik as kodeBidangObrik',
            'tr_kode_bidang_obrik.nama_bidang_obrik as namaBidangObrik',
        )
            ->leftjoin('tr_kode_unit_obrik as unitobrik', 'unitobrik.kode_unit_obrik', '=', 'tr_kode_bidang_obrik.kode_unit_obrik')
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_bidang_obrik.kode_unit_audit')
            ->where('tr_kode_bidang_obrik.is_del', '=', 0)
            ->where('tr_kode_bidang_obrik.kode_unit_obrik', '=', $request->kodeUnitObrik)
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
            $response = Helper::labelMessageForbidden('menambah Bidang Obrik');
            return response()->json($response, 403);
        } else {
            // Define Kode Unit Audit & Kode Unit Obrik dari Kode Bidang Obrik yang diberikan
            $kodeUnitAudit = substr($request->kodeBidangObrik, 0, 4);
            $kodeUnitObrik = substr($request->kodeBidangObrik, 0, 6);

            // Store
            $storeData = new KodeBidangObrik();
            $storeData->kode_unit_audit = $kodeUnitAudit;
            $storeData->kode_unit_obrik = $kodeUnitObrik;
            $storeData->kode_bidang_obrik = $request->kodeBidangObrik;
            $storeData->nama_bidang_obrik = $request->namaBidangObrik;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_bidang_obrik;
            $page = 'Tambah Bidang Obrik';
            $activity = $auth->name . ' menambah Bidang Obrik. Kode Bidang Obrik : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Bidang Obrik. Kode Bidang Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeBidangObrik::select(
            'tr_kode_bidang_obrik.kode_unit_audit as kodeUnitAudit',
            'unitaudit.nama_unit_audit as namaUnitAudit',
            'tr_kode_bidang_obrik.kode_unit_obrik as kodeUnitObrik',
            'unitobrik.nama_unit_obrik as namaUnitObrik',
            'tr_kode_bidang_obrik.kode_bidang_obrik as kodeBidangObrik',
            'tr_kode_bidang_obrik.nama_bidang_obrik as namaBidangObrik',
        )
            ->leftjoin('tr_kode_unit_obrik as unitobrik', 'unitobrik.kode_unit_obrik', '=', 'tr_kode_bidang_obrik.kode_unit_obrik')
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'tr_kode_bidang_obrik.kode_unit_audit')
            ->where('tr_kode_bidang_obrik.kode_bidang_obrik', '=', $id)
            ->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Bidang Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeBidangObrik::where('kode_bidang_obrik', '=', $id)
                ->update([
                    'nama_bidang_obrik' => $request->namaBidangObrik,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Bidang Obrik';
            $activity = $auth->name . ' mengubah Bidang Obrik. Kode Bidang Obrik : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Bidang Obrik: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Bidang Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeBidangObrik::where('kode_bidang_obrik', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Bidang Obrik';
            $activity = $auth->name . ' menghapus Bidang Obrik. Kode Bidang Obrik : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Bidang Obrik. Kode Bidang Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }
}
