<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersPeran;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class UsersPeranController extends Controller
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
        $data = UsersPeran::select(
            'kode_peran as kodePeran',
            'nama_peran as namaPeran',
            'modul',
            'is_pusat as isPusat',
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
        if ($auth->peran_ren != 'admin-ren') {
            $response = Helper::labelMessageForbidden('menambah Kode Peran User');
            return response()->json($response, 403);
        } else {
            // Store
            $UsersPeran = new UsersPeran();
            $UsersPeran->kode_peran = $request->kodePeran;
            $UsersPeran->nama_peran = $request->namaPeran;
            $UsersPeran->modul = $request->modul;
            $UsersPeran->is_pusat = $request->isPusat;
            $UsersPeran->created_by = $auth->name;
            $UsersPeran->save();

            // Log Activity
            $key = $UsersPeran->kode_peran;
            $page = 'Tambah Kode Peran User';
            $activity = $auth->name . ' menambah kode peran user. Kode Peran User : ' . $request->kodePeran;
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menambah Kode Peran User');
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = UsersPeran::select(
            'kode_peran as kodePeran',
            'nama_peran as namaPeran',
            'modul',
            'is_pusat as isPusat',
        )->where('kode_peran', '=', $id)->first();
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
        if ($auth->peran_ren != 'admin-ren') {
            $response = Helper::labelMessageForbidden('mengubah Kode Peran User');
            return response()->json($response, 403);
        } else {
            $data = UsersPeran::where('kode_peran', '=', $id)
                ->update([
                    'nama_peran' => $request->namaPeran,
                    'modul' => $request->modul,
                    'is_pusat' => $request->isPusat,
                    'updated_by' => $auth->name,
                ]);

            // Log Activity
            $key = $id;
            $page = 'Ubah Kode Peran User';
            $activity = $auth->name . ' mengubah kode peran user. Kode Peran User : ' . $id;
            $method = 'PATCH';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('mengubah Kode Peran User: ' . $id);
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auth = Auth::user();
        if ($auth->peran_ren != 'admin-ren') {
            $response = Helper::labelMessageForbidden('menghapus Kode Peran User');
            return response()->json($response, 403);
        } else {
            $data = UsersPeran::where('kode_peran', '=', $id)->delete();

            // Log Activity
            $key = $id;
            $page = 'Hapus Kode Peran User';
            $activity = $auth->name . ' menghapus kode peran user. Kode Peran User : ' . $id;
            $method = 'DELETE';
            Helper::createLogActivity($key, $page, $activity, $method);

            // Response
            $response = Helper::labelMessageSuccess('menghapus Kode Peran User: ' . $id);
            return response()->json($response, 200);
        }
    }
}
