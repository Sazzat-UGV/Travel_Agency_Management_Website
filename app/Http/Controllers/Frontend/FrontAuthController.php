<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AccountConfirmationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontAuthController extends Controller
{
    public function registration()
    {
        return view('frontend.pages.registration');
    }

    public function registration_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:4',
            'confirm_password' => 'required|string|min:4|same:password',
        ]);

        $token = hash('sha256', time());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'token' => $token,
        ]);

        $verification_link = url('registration_verify/' . $token . '/' . $request->email);
        $subject = "Account Verification";

        Mail::to($request->email)->send(new AccountConfirmationMail($subject, $verification_link));
        return redirect()->back()->with('success', 'We sent a verification link in your email.');
    }

    public function registration_verify($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token or email is not correct');
        }
        $user->token = '';
        $user->status = '1';
        $user->update();
        return redirect()->route('login')->with('success', 'Account verified Successfully. You can login now.');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function login_submit(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'The information you entered is incorrect! Please try again!')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout is successful!');
    }

    public function forget_password()
    {
        return view('frontend.pages.forget_password');
    }
}
