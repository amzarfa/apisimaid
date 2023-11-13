<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;

class UploadFileController extends Controller
{
    // Upload File
    public function upload(Request $request)
    {
        $dataUpload = $request->file('file');
        $kodeUnitAudit = $request->kodeUnitAudit;
        $folder = $request->folder;
        $response = Helper::uploadFile($dataUpload, $kodeUnitAudit, $folder);
        if ($response != 'true') {
            return response()->json($response, 206);
        }
        return response()->json($response, 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
