<?php

namespace App\Http\Controllers\Ren\Report;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $protocol = $request->secure() ? 'https' : 'http';
        $data = [
            [
                'urlDownload' => url('/api/ren/report/downloadpkpt', [], $protocol),
                // 'urlDownload' => '/api/ren/report/downloadpkpt',
                'type' => 'xlsx',
                'title' => 'Download List PKPT Excel',
            ],
            [
                'urlDownload' => url('/api/ren/report/downloadpkpt/pdf', [], $protocol),
                // 'urlDownload' => '/api/ren/report/downloadpkpt/pdf',
                'type' => 'pdf',
                'title' => 'Download List PKPT PDF',
            ],
        ];

        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }
}
