<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login admin.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Email tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email admin tidak terdaftar.',
            ])->onlyInput('email');
        }

        // Password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Password yang Anda masukkan salah.',
            ])->onlyInput('email');
        }

        // Bukan admin
        if ($user->role !== 'admin') {
            return back()->withErrors([
                'email' => 'Akun ini bukan admin.',
            ])->onlyInput('email');
        }

        // Login
        Auth::login($user);

        // Regenerate session
        $request->session()->regenerate();

        // Masuk dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}