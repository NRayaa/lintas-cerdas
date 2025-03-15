<?php

namespace App\Http\Controllers\Logic;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba login menggunakan Auth::attempt()
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil user yang sedang login
            $user = Auth::user();
            // dd($user);
            // Redirect berdasarkan tipe user
            return match ($user->type) {
                'sd'  => redirect()->route('dashboard.sd'),
                'smp' => redirect()->route('dashboard.smp'),
                'sma' => redirect()->route('goal.sma'),
                default => redirect()->route('login')->withErrors(['error' => 'Tipe user tidak valid!']),
            };
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout(Request $request)
    {
        // Hapus session user
        Session::flush();
        $request->session()->regenerate();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
