<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeJenisAnggaran;
use App\Models\Masterdata\KodeJenisObrik;

class KodeJenisObrikController extends Controller
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
        $data = KodeJenisObrik::select(
            'kode_jenis_obrik as kodeJenisObrik',
            'nama_jenis_obrik as namaJenisObrik',
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
            $response = Helper::labelMessageForbidden('menambah Kode Jenis Obrik');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeJenisObrik();
            $storeData->kode_jenis_obrik = $request->kodeJenisObrik;
            $storeData->nama_jenis_obrik = $request->namaJenisObrik;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_jenis_obrik;
            $page = 'Tambah Kode Jenis Obrik';
            $activity = $auth->name . ' menambah Kode Jenis Obrik. Id Kode Jenis Obrik : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Jenis Obrik. Id Kode Jenis Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeJenisObrik::select(
            'kode_jenis_obrik as kodeJenisObrik',
            'nama_jenis_obrik as namaJenisObrik',
        )->where('kode_jenis_obrik', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Jenis Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisObrik::where('kode_jenis_obrik', '=', $id)
                ->update([
                    'kode_jenis_obrik' => $request->kodeJenisObrik,
                    'nama_jenis_obrik' => $request->namaJenisObrik,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Jenis Obrik';
            $activity = $auth->name . ' mengubah Kode Jenis Obrik. Kode Kode Jenis Obrik : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Jenis Obrik: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Jenis Obrik');
            return response()->json($response, 403);
        } else {
            $data = KodeJenisObrik::where('kode_jenis_obrik', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Jenis Obrik';
            $activity = $auth->name . ' menghapus Kode Jenis Obrik. Kode Kode Jenis Obrik : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Jenis Obrik. Kode Kode Jenis Obrik : ' . $key);
            return response()->json($response, 200);
        }
    }
}
