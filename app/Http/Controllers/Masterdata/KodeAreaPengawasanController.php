<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeAreaPengawasan;

class KodeAreaPengawasanController extends Controller
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
        $data = KodeAreaPengawasan::select(
            'kode_area_pengawasan as kodeAreaPengawasan',
            'nama_area_pengawasan as namaAreaPengawasan',
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
        $auth = Auth::user();
        if ($auth->peran != 'admin') {
            $response = Helper::labelMessageForbidden('menambah Kode Area Pengawasan');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeAreaPengawasan();
            $storeData->kode_area_pengawasan = $request->kodeAreaPengawasan;
            $storeData->nama_area_pengawasan = $request->namaAreaPengawasan;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_area_pengawasan;
            $page = 'Tambah Kode Area Pengawasan';
            $activity = $auth->name . ' menambah Kode Area Pengawasan. Id Kode Area Pengawasan : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Area Pengawasan. Id Kode Area Pengawasan : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeAreaPengawasan::select(
            'kode_area_pengawasan as kodeAreaPengawasan',
            'nama_area_pengawasan as namaAreaPengawasan',
        )->where('kode_area_pengawasan', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Area Pengawasan');
            return response()->json($response, 403);
        } else {
            $data = KodeAreaPengawasan::where('kode_area_pengawasan', '=', $id)
                ->update([
                    'nama_area_pengawasan' => $request->namaAreaPengawasan,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Area Pengawasan';
            $activity = $auth->name . ' mengubah Kode Area Pengawasan. Kode Area Pengawasan : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Area Pengawasan: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Area Pengawasan');
            return response()->json($response, 403);
        } else {
            $data = KodeAreaPengawasan::where('kode_area_pengawasan', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Area Pengawasan';
            $activity = $auth->name . ' menghapus Kode Area Pengawasan. Kode Area Pengawasan : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Area Pengawasan. Kode Area Pengawasan : ' . $key);
            return response()->json($response, 200);
        }
    }
}
