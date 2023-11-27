<?php

namespace App\Http\Controllers\Ren\Report;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            [
                'urlDownload' => url('/api/ren/downloadpkpt'),
                'type' => 'xlsx',
                'title' => 'Download List PKPT Excel',
            ],
            [
                'urlDownload' => url('/api/ren/downloadpkau'),
                'type' => 'xlsx',
                'title' => 'Download List PKAU Excel',
            ],
            [
                'urlDownload' => url('/api/ren/downloadpkpt/pdf'),
                'type' => 'pdf',
                'title' => 'Download List PKPT PDF',
            ],
        ];

        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }
}
