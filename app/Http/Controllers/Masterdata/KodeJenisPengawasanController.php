<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeJenisPengawasan;

class KodeJenisPengawasanController extends Controller
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
        $data = KodeJenisPengawasan::select(
            'kode_jenis_pengawasan as kodeJenisPengawasan',
            'nama_jenis_pengawasan as namaJenisPengawasan',
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
            $response = Helper::labelMessageForbidden('menambah Kode Jenis Pengawasan');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeJenisPengawasan();
            $storeData->kode_jenis_pengawasan = $request->kodeJenisPengawasan;
            $storeData->nama_jenis_pengawasan = $request->namaJenisPengawasan;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_jenis_pengawasan;
            $page = 'Tambah Kode Jenis Pengawasan';
            $activity = $auth->name . ' menambah Kode Jenis Pengawasan. Id Kode Jenis Pengawasan : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Jenis Pengawasan. Id Kode Jenis Pengawasan : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeJenisPengawasan::select(
            'kode_jenis_pengawasan as kodeJenisPengawasan',
            'nama_jenis_pengawasan as namaJenisPengawasan',
        )->where('kode_jenis_pengawasan', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Jenis Pengawasan');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisPengawasan::where('kode_jenis_pengawasan', '=', $id)
                ->update([
                    'nama_jenis_pengawasan' => $request->namaJenisPengawasan,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Jenis Pengawasan';
            $activity = $auth->name . ' mengubah Kode Jenis Pengawasan. Kode Kode Jenis Pengawasan : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Jenis Pengawasan: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Jenis Pengawasan');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisPengawasan::where('kode_jenis_pengawasan', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Jenis Pengawasan';
            $activity = $auth->name . ' menghapus Kode Jenis Pengawasan. Kode Kode Jenis Pengawasan : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Jenis Pengawasan. Kode Kode Jenis Pengawasan : ' . $key);
            return response()->json($response, 200);
        }
    }
}
