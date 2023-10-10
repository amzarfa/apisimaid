<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

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

        // Coba untuk melakukan login
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            // Menghapus angka yang mewakili jumlah login dari token
            $tokenParts = explode('|', $token);
            if (count($tokenParts) === 2) {
                $token = $tokenParts[1];
            }
            return response()->json([
                'token' => $token,
                'name' => $user->name,
                'nip' => $user->nip,
                'kode_unit_audit' => $user->kode_unit_audit,
                'kode_sub_unit_audit' => $user->kode_sub_unit_audit,
                'token_type' => 'bearer',
                'peran_ren' => $user->peran_ren,
            ], 200);
        } else {
            return response()->json(['message' => 'Login gagal, periksa kembali email dan password Anda'], 401);
        }
    }

    // Method untuk logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logout berhasil'], 200);
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

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $token = Password::createToken($user);

        // Kirim email
        Mail::to($email)->send(new ResetPasswordMail($email, $token));

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

        $status = Password::reset(
            $request->only('email', 'token', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password berhasil diubah'], 200);
        }

        return response()->json(['message' => 'Gagal mereset password'], 500);
    }
}
