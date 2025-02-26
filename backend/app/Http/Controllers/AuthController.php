<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\RegisterRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Providers\RegisterRequest as ProvidersRegisterRequest;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if (!Auth::attempt($credentials)) {
            return response(['message' => 'Invalid credentials']);
        }

        $token = Auth::user()->createToken('main')->plainTextToken;

        return response(['token' => $token]);
    }

    public function CustomerRegister(RegisterRequest $request){
        $credentials = $request->validated();

        $user = User::create($credentials);
        $token = $user->createToken('main')->plainTextToken;

        return response(['token' => $token]);

    }
    public function ServiceProviderRegister(ProvidersRegisterRequest $request){
        $credentials = $request->validated();

        $user = User::create($credentials);
        $token = $user->createToken('main')->plainTextToken;

    }
    public function logout(Request $request){
        Auth::user()->tokens()->delete();

        return response(['message' => 'Logged out']);
    }
}
