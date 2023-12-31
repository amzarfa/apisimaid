<?php

namespace App\Http\Controllers\Masterdata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Masterdata\KodePeran;

class KodePeranController extends Controller
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
        $data = KodePeran::select(
            'id_peran as id',
            'kode_peran as kodePeran',
            'nama_peran as namaPeran',
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
            $response = Helper::labelMessageForbidden('menambah Peran Tim');
            return response()->json($response, 403);
        } else {
            // Store
            $storeData = new KodePeran();
            $storeData->kode_peran = $request->kodePeran;
            $storeData->nama_peran = $request->namaPeran;
            $storeData->created_by = $auth->name;
            $storeData->save();

            // Log Activity
            $key = $storeData->id;
            $page = 'Tambah Peran Tim';
            $activity = $auth->name . ' menambah peran tim. Id Peran Tim : ' . $key;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Peran Tim. Id Peran Tim : ' . $key);
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KodePeran::select(
            'id_peran as id',
            'kode_peran as kodePeran',
            'nama_peran as namaPeran',
        )->where('id_peran', '=', $id)->first();
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
            $response = Helper::labelMessageForbidden('mengubah Kode Peran User');
            return response()->json($response, 403);
        } else {
            $data = KodePeran::where('id_peran', '=', $id)
                ->update([
                    'kode_peran' => $request->kodePeran,
                    'nama_peran' => $request->namaPeran,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Peran Tim';
            $activity = $auth->name . ' mengubah peran tim. Kode Peran Tim : ' . $id;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Peran Tim: ' . $key);
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
            $response = Helper::labelMessageForbidden('menghapus Peran Tim');
            return response()->json($response, 403);
        } else {
            $data = KodePeran::where('id_peran', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Peran Tim';
            $activity = $auth->name . ' menghapus peran Tim. Id Peran Tim : ' . $id;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Peran Tim. Kode Peran Tim : ' . $key);
            return response()->json($response, 200);
        }
    }
}
