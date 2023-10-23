<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LogActivity;

class Helper
{
    public static function createLogActivity($key, $page, $activity, $method)
    {
        $auth = Auth::user();
        if (!$auth) {
            $id = $key;
            $name = $activity;
        } else {
            $id = $auth->id;
            $name = $auth->name;
        }
        LogActivity::create([
            'idt_user' => $id,
            'name' => $name,
            'page' => $page,
            'activity' => $activity,
            'method' => $method,
            'key' => $key,
        ]);
    }

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

    public static function labelMessageSuccessWithData($data)
    {
        $response = array(
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'data' => $data,
        );
        return $response;
    }

    public static function labelMessageSuccessWithCountData($data)
    {
        $response = array(
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'count' => $data->count(),
            'data' => $data,
        );
        return $response;
    }

    public static function labelMessageSuccess($label)
    {
        $response = array(
            'status' => true,
            'statusCode' => 200,
            'message' => 'Anda berhasil ' . $label,
        );
        return $response;
    }

    public static function labelMessageForbidden($label)
    {
        $response = array(
            'status' => false,
            'statusCode' => 403,
            'message' => 'Anda tidak berhak ' . $label,
        );
        return $response;
    }
}
