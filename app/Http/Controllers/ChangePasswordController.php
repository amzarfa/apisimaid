<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
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

    // Method untuk Change Password
    public function changePassword(Request $request)
    {
        $auth = Auth::user();
        $hashedPassword = $auth->password;

        // Cek Password Lama
        if (!Hash::check($request->oldPass, $hashedPassword)) {
            $response = array(
                'status' => false,
                'statusCode' => 406,
                'message' => 'Password lama tidak sama'
            );
            return response()->json($response, 406);
        }

        // Cek Password Baru
        if (Hash::check($request->newPass, $hashedPassword)) {
            $response = array(
                'status' => false,
                'statusCode' => 406,
                'message' => 'Password baru tidak boleh sama dengan password lama'
            );
            return response()->json($response, 406);
        }

        $changePass = User::where('id', '=', $auth->id)
            ->update([
                'password' => bcrypt($request->newPass),
                'updated_by' => $auth->name,
            ]);

        // Log Activity
        $key = $auth->id;
        $page = 'Ubah Password';
        $activity = $auth->name . ' mengubah Passwordnya. User ID : ' . $key;
        $method = 'POST';
        Helper::createLogActivity($key, $page, $activity, $method);

        $response = Helper::labelMessageSuccess('mengubah Password');
        return response()->json($response, 200);
    }
}
