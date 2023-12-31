<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Helpers\Helper;

class AuthController extends Controller
{
    // Method untuk login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba untuk login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            // Delete angka yang mewakili jumlah login dari token
            $tokenParts = explode('|', $token);
            if (count($tokenParts) === 2) {
                $token = $tokenParts[1];
            }
            $unitAudit = Helper::namaUnitAudit();
            $namaSubUnitAudit = Helper::namaSubUnitAudit();
            $data = [
                'token' => $token,
                'name' => $user->name,
                'email' => $user->email,
                'nip' => $user->nip,
                'kodeUnitAudit' => $user->kode_unit_audit,
                'namaUnitAudit' => $unitAudit,
                'kodeSubUnitAudit' => $user->kode_sub_unit_audit,
                'namaSubUnitAudit' => $namaSubUnitAudit,
                'tokenType' => 'bearer',
                'peran' => $user->peran,
                'peranRen' => $user->peran_ren,
            ];
            $response = array(
                'status' => true,
                'statusCode' => 200,
                'message' => 'Success',
                'data' => $data,
            );
            return response()
                ->json($response, 200)
                ->withCookie('auth', $token)
                ->withCookie('jwt', $token);
        } else {
            $response = array(
                'status' => false,
                'statusCode' => 401,
                'message' => 'Login gagal, periksa kembali email dan password Anda',
            );
            return response()->json($response, 401);
        }
    }

    // Method untuk logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        $response = array(
            'status' => true,
            'status_code' => 200,
            'message' => 'Successfully logged out',
        );
        return response()->json($response, 200);
    }

    // Method untuk mengirimkan email dan menampilkan token untuk reset password
    public function sendResetEmail(Request $request)
    {
        $email = $request->email;

        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', $email)->first();
        // return response()->json($user->id, 200);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $token = Password::createToken($user);

        // Kirim email
        Mail::to($email)->send(new ResetPasswordMail($email, $token));

        // Log Activity
        $key = $user->id;
        $page = 'Mencoba Reset Password';
        $activity = $user->name . ' mencoba melakukan Reset Password. User ID : ' . $key;
        $method = 'POST';
        Helper::createLogActivity($key, $page, $activity, $method);

        return response()->json([
            'message' => 'Email reset password telah dikirim',
            'email' => $email,
            'token' => $token,
        ], 200);
    }

    // Method untuk Set New Password
    public function setNewPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        }

        $idUser = User::where('email',$request->email)->first();
        if(!$idUser){
            return response()->json(['message' => 'User tidak ada'], 404);
        }

        $status = Password::reset(
            $request->only('email', 'token', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            // Log Activity
            $key = $idUser->id;
            $page = 'Reset Password Baru';
            $activity = $request->email . ' melakukan Reset Password';
            $method = 'POST';
            Helper::createLogActivity($key, $page, $activity, $method);
            return response()->json(['message' => 'Password berhasil diubah'], 200);
        }

        return response()->json(['message' => 'Gagal mereset password, token tidak valid'], 400);
    }
}
