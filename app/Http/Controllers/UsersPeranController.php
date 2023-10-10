<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersPeran;

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
        $usersPeran = UsersPeran::all();
        return response()->json($usersPeran);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $UsersPeran = new UsersPeran();

        $UsersPeran->kode_peran = $request->kodePeran;
        $UsersPeran->nama_peran = $request->namaPeran;
        $UsersPeran->modul = $request->modul;
        $UsersPeran->is_pusat = $request->isPusat;
        $UsersPeran->created_by = $request->createdBy;

        $UsersPeran->save();

        $response = array(
            'message' => 'Anda berhasil menambah Kode Peran User',
            'response' => $UsersPeran,
        );
        return response()->json($response, 201);
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
