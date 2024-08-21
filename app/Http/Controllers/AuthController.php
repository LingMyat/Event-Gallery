<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if(User::where('email', $request->email)->first()->role !== 'admin') {
                return back()
                    ->with('error', 'The provided credentials do not match our records.');
            }

            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()
                ->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
