<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmailService;
use Hash;
use Illuminate\Http\Request;
use Password;
use Str;

class ResetPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);

        $user = User::where('email', $request->email)->first();
        $token = Password::createToken($user);
        $url = "http://localhost:8000/reset-password/$token/$request->email";
        $view = view('email.resetpassword', ['url' => $url])->render();
        EmailService::sendResetPasswordEmail($user, $view);
        return response(['message' => 'email sent']);

    }
    public function showResetForm($token, $email)
    {

        return view('auth.resetpassword', compact('token', 'email'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password'=>'required|confirmed',
            'email'=>'required|email'
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );
        return $status;
    }

}
