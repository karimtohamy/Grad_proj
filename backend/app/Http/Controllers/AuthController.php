<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\RegisterRequest;
use App\Models\User;
use App\Services\EmailService;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\Providers\RegisterRequest as ProvidersRegisterRequest;
use Illuminate\Support\Facades\Password;
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
            return response(['message' => 'Invalid credentials'], 401);
        }
        $user = Auth::user();
        $user_data = [
            'id' => $user->id,
            'name' => $user->getTranslation('name', app()->getLocale())
        ];
        $token = $user->createToken('main')->plainTextToken;

        return response(['token' => $token, 'user' => $user_data]);
    }

    public function CustomerRegister(RegisterRequest $request)
    {
        $credentials = $request->validated();

        $user = User::create([
            'email' => $request->email,
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'phone_verified_at' => now()
        ]);
        $token = $user->createToken('main')->plainTextToken;

        return response(['token' => $token,]);

    }
    public function ServiceProviderRegister(ProvidersRegisterRequest $request)
    {
        $credentials = $request->validated();

        $user = User::create($credentials);
        $token = $user->createToken('main')->plainTextToken;

    }
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response(['message' => 'Logged out']);
    }



}
