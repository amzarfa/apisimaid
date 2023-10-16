<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodeTingkatResiko;

class KodeTingkatResikoController extends Controller
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
        $data = KodeTingkatResiko::select(
            'kode_tingkat_resiko as kodeTingkatResiko',
            'nama_tingkat_resiko as namaTingkatResiko',
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
            $response = Helper::labelMessageForbidden('menambah Kode Tingkat Resiko');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodeTingkatResiko();
            $storeData->kode_tingkat_resiko = $request->kodeTingkatResiko;
            $storeData->nama_tingkat_resiko = $request->namaTingkatResiko;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->kode_tingkat_resiko;
            $page = 'Tambah Kode Tingkat Resiko';
            $activity = $auth->name . ' menambah Kode Tingkat Resiko. Id Kode Tingkat Resiko : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Tingkat Resiko. Id Kode Tingkat Resiko : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodeTingkatResiko::select(
            'kode_tingkat_resiko as kodeTingkatResiko',
            'nama_tingkat_resiko as namaTingkatResiko',
        )->where('kode_tingkat_resiko', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Kode Tingkat Resiko');
            return response()->json($response, 403);
        } else {
            $data = KodeTingkatResiko::where('kode_tingkat_resiko', '=', $id)
                ->update([
                    'nama_tingkat_resiko' => $request->namaTingkatResiko,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Tingkat Resiko';
            $activity = $auth->name . ' mengubah Kode Tingkat Resiko. Kode Kode Tingkat Resiko : ' . $key;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Tingkat Resiko: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Kode Tingkat Resiko');
            return response()->json($response, 403);
        } else {
            $data = KodeTingkatResiko::where('kode_tingkat_resiko', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Tingkat Resiko';
            $activity = $auth->name . ' menghapus Kode Tingkat Resiko. Kode Kode Tingkat Resiko : ' . $key;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Tingkat Resiko. Kode Kode Tingkat Resiko : ' . $key);
            return response()->json($response, 200);
        }
    }
}
