<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Method untuk melihat profil (setelah login)
    public function profile(Request $request)
    {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }
}
