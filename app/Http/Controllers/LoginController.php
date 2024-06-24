<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        Log::info('Attempting login with credentials: ', $credentials);

        if (Auth::attempt($credentials)) {
            Log::info('Login successful for user: ' . $request->email);
            $request->session()->regenerate();
            return redirect()->intended('admin/home');
        } else {
            Log::warning('Login failed for user: ' . $request->email);
            return redirect()->route('login')->with('failed', 'Incorrect Email or Password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }
}
