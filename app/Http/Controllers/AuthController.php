<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
            return response()->json([
                'token' => $token,
                'name' => $user->name,
                'nip' => $user->nip,
                'kode_unit_audit' => $user->kode_unit_audit,
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

    // Method untuk reset password
    public function resetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Email reset password telah dikirim'], 200)
            : response()->json(['message' => 'Email reset password tidak ditemukan'], 400);
    }
}
