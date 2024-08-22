<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\API\AuthRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return response()->json([
            'message' => 'Register successfully',
        ], 200);
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {
            if(Auth::user()->role === 'admin') {
                return response()->json([
                    'message' => 'Invalid credentials',
                    'errors'  => [
                        'email'  => 'Invalid credentials',
                    ]
                ], 401);
            }

            if(count(Auth::user()->tokens)) Auth::user()->tokens()->delete();

            return response()->json([
                'token' => Auth::user()->createToken('event')->plainTextToken
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
            'errors'  => [
                'email'  => 'Invalid credentials',
            ]
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
