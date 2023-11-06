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
                'title' => 'Download PKPT',
            ],
            [
                'urlDownload' => url('/api/ren/downloadpkau'),
                'title' => 'Download PKAU',
            ],
        ];

        $response = Helper::labelMessageSuccessWithData($data);
        return response()->json($response, 200);
    }
}
