<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ekskul;

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function showMuridLogin()
    {
        $ekskuls = Ekskul::where('status', true)->get();
        return view('auth.murid-login', compact('ekskuls'));
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function muridLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'ekskul_id' => 'required|exists:ekskuls,id',
        ]);

        $user = User::where('email', $credentials['email'])
                   ->where('role', 'murid')
                   ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Check if user is enrolled in selected ekskul
            if ($user->ekskuls()->where('ekskul_id', $credentials['ekskul_id'])->exists()) {
                Auth::login($user);
                session(['selected_ekskul_id' => $credentials['ekskul_id']]);
                return redirect()->route('murid.dashboard');
            } else {
                return back()->withErrors(['ekskul_id' => 'Anda tidak terdaftar di ekstrakurikuler ini']);
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
