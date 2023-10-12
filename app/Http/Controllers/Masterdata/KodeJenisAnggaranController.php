<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeJenisAnggaran;

class KodeJenisAnggaranController extends Controller
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
        $data = KodeJenisAnggaran::select(
            'kode_jenis_anggaran as kodeJenisAnggaran',
            'nama_jenis_anggaran as namaJenisAnggaran',
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
            $response = Helper::labelMessageForbidden('menambah Kode Jenis Anggaran');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeJenisAnggaran();
            $storeData->kode_jenis_anggaran = $request->kodeJenisAnggaran;
            $storeData->nama_jenis_anggaran = $request->namaJenisAnggaran;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_jenis_anggaran;
            $page = 'Tambah Kode Jenis Anggaran';
            $activity = $auth->name . ' menambah Kode Jenis Anggaran. Id Kode Jenis Anggaran : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Jenis Anggaran. Id Kode Jenis Anggaran : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeJenisAnggaran::select(
            'kode_jenis_anggaran as kodeJenisAnggaran',
            'nama_jenis_anggaran as namaJenisAnggaran',
        )->where('kode_jenis_anggaran', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Jenis Anggaran');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisAnggaran::where('kode_jenis_anggaran', '=', $id)
                ->update([
                    'kode_jenis_anggaran' => $request->kodeJenisAnggaran,
                    'nama_jenis_anggaran' => $request->namaJenisAnggaran,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Jenis Anggaran';
            $activity = $auth->name . ' mengubah Kode Jenis Anggaran. Kode Kode Jenis Anggaran : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Jenis Anggaran: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Jenis Anggaran');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisAnggaran::where('kode_jenis_anggaran', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Jenis Anggaran';
            $activity = $auth->name . ' menghapus Kode Jenis Anggaran. Kode Kode Jenis Anggaran : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Jenis Anggaran. Kode Kode Jenis Anggaran : ' . $key);
            return response()->json($response, 200);
        }
    }
}
