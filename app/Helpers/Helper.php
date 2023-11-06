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

    public static function labelMessageFailed($label)
    {
        $response = array(
            'status' => false,
            'statusCode' => 206,
            'message' => $label,
        );
        return $response;
    }

    public static function getNamaSubUnitAudit($kodeSubUnitAudit)
    {
        if ($kodeSubUnitAudit === null) {
            return null;
        }
        $data = DB::table('tr_kode_sub_unit_audit')
            ->where('kode_sub_unit_audit', $kodeSubUnitAudit)
            ->select('nama_sub_unit_audit')
            ->first();
        return $data->nama_sub_unit_audit;
    }

    public static function getNamaUnitAudit($kodeUnitAudit)
    {
        if ($kodeUnitAudit === null) {
            return null;
        }
        $data = DB::table('tr_kode_unit_audit')
            ->where('kode_unit_audit', $kodeUnitAudit)
            ->select('nama_unit_audit')
            ->first();
        return $data->nama_unit_audit;
    }

    public static function getNamaLingkupAudit($kodeLingkupAudit)
    {
        $data = DB::table('tr_kode_lingkup_audit')
            ->where('kode_lingkup_audit', $kodeLingkupAudit)
            ->select('nama_lingkup_audit')
            ->first();
        return $data->nama_lingkup_audit;
    }

    public static function getNamaAreaPengawasan($kodeAreaPengawasan)
    {
        $data = DB::table('tr_kode_area_pengawasan')
            ->where('kode_area_pengawasan', $kodeAreaPengawasan)
            ->select('nama_area_pengawasan')
            ->first();
        return $data->nama_area_pengawasan;
    }

    public static function getNamaJenisPengawasan($kodeJenisPengawasan)
    {
        $data = DB::table('tr_kode_jenis_pengawasan')
            ->where('kode_jenis_pengawasan', $kodeJenisPengawasan)
            ->select('nama_jenis_pengawasan')
            ->first();
        return $data->nama_jenis_pengawasan;
    }

    public static function getNamaTingkatResiko($kodeTingkatResiko)
    {
        $data = DB::table('tr_kode_tingkat_resiko')
            ->where('kode_tingkat_resiko', $kodeTingkatResiko)
            ->select('nama_tingkat_resiko')
            ->first();
        return $data->nama_tingkat_resiko;
    }

    public static function getNamaBidangObrik($kodeBidangObrik)
    {
        if ($kodeBidangObrik === null) {
            return null;
        }
        $data = DB::table('tr_kode_bidang_obrik')
            ->where('kode_bidang_obrik', $kodeBidangObrik)
            ->select('nama_bidang_obrik')
            ->first();
        return $data->nama_bidang_obrik;
    }

    public static function paginateCustomResponse($response)
    {
        $data = array(
            'status' => true,
            'statusCode' => 200,
            'message' => 'Success',
            'count' => $response['total'],
            'total' => $response['total'],
            'from' => $response['from'],
            'to' => $response['to'],
            'currentPage' => $response['current_page'],
            'lastPage' => $response['last_page'],
            'path' => $response['path'],
            'firstPageUrl' => $response['first_page_url'],
            'lastPageUrl' => $response['last_page_url'],
            'prevPageUrl' => $response['prev_page_url'],
            'nextPageUrl' => $response['next_page_url'],
            'perPage' => $response['per_page'],
            'data' => $response['data'],
            'links' => $response['links'],
        );
        return $data;
    }

    public static function uploadLogoUnitAudit($dataUpload, $kodeUnitAudit)
    {
        $auth = Auth::user();
        $fileSize = $dataUpload->getSize();
        $fileSize = number_format($fileSize / 1048576, 2);
        if ($fileSize > 10) {
            $response = Helper::labelMessageFailed('Data terlalu besar! Maksimal 10 MB');
            return $response;
        }
        $filename = time() . '.' . $dataUpload->getClientOriginalExtension();
        $path = $dataUpload->storeAs($kodeUnitAudit . '/logo', $filename, 'public');
        $filepath = 'storage/' . $path;

        // Log Activity
        $key = $kodeUnitAudit;
        $page = 'Upload Logo Unit Audit';
        $activity = $auth->name . ' mengupload Logo Unit Audit. Kode Unit Audit : ' . $kodeUnitAudit . '. Path Logo : ' . $path;
        $method = 'UPLOAD';
        Helper::createLogActivity($key, $page, $activity, $method);

        $response = array(
            'status' => true,
            'statusCode' => 200,
            'message' => 'mengupload Logo Unit Audit. Kode Unit Audit : ' . $kodeUnitAudit,
            'filePath' => $filepath,
            'filePathWithUrl' => url($filepath),
        );
        return $response;
    }
}
