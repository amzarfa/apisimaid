<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // Method untuk melihat profil (setelah login)
    public function profile()
    {
        $auth = Auth::user();
        $data = User::where('users.id', '=', $auth->id)
            ->leftjoin('tr_kode_unit_audit as unitaudit', 'unitaudit.kode_unit_audit', '=', 'users.kode_unit_audit')
            ->leftjoin('tr_kode_sub_unit_audit as subunitaudit', 'subunitaudit.kode_sub_unit_audit', '=', 'users.kode_sub_unit_audit')
            ->select(
                'users.id',
                'users.name',
                'users.nip',
                'users.email',
                'users.kode_unit_audit as kodeUnitAudit',
                'unitaudit.nama_unit_audit as namaUnitAudit',
                'users.kode_sub_unit_audit as kodeSubUnitAudit',
                'subunitaudit.nama_sub_unit_audit as namaSubUnitAudit',
                'users.peran',
                'users.peran_ren as peranRen',
                'users.peran_lak as peranLak',
                'users.peran_por as peranPor',
                'users.peran_simhpnas as peranSimhpnas',
                'users.status',
            )
            ->first();

        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }

    public function index()
    {
        $data = DB::table('tr_kode_provinsi')->select(
            'kode_provinsi as kodeProvinsi',
            'nama_provinsi as namaProvinsi',
        )->where('is_del', '=', 0)->get();
        $response = Helper::labelMessageSuccessWithCountData($data);
        return response()->json($response, 200);
    }
}
