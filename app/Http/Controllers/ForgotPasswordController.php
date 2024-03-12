<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function forgetPasswordForm()
    {
        return view('forget-password');
    }

    public function submitForgetPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users'
        ]);


        $token = Str::random(64);

        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if ($existingToken) {

            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        Mail::send('forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function resetPasswordForm($token)
    {
        return view('forget-PasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets_tokens')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
