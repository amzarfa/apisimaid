<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Helper
{
    public static function namaUnitAudit()
    {
        $auth = Auth::user();
        $namaUnitAudit = DB::table('tr_kode_unit_audit')->where('kode_unit_audit', '=', $auth->kode_unit_audit)->select('nama_unit_audit')->first();
        return $namaUnitAudit->nama_unit_audit;
    }

    public static function namaSubUnitAudit()
    {
        $auth = Auth::user();
        $namaSubUnitAudit = DB::table('tr_kode_sub_unit_audit')->where('kode_sub_unit_audit', '=', $auth->kode_sub_unit_audit)->select('nama_sub_unit_audit')->first();
        return $namaSubUnitAudit->nama_sub_unit_audit;
    }
}
