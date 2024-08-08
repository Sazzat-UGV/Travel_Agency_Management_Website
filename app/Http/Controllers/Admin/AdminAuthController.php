<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'The information you entered is incorrect! Please try again!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout is successful!');
    }

    public function profile()
    {
        return view('admin.pages.auth.profile');
    }

    public function forget_password()
    {
        return view('admin.pages.auth.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Email is not found');
        }

        $token = hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = "Password Reset";

        Mail::to($request->email)->send(new Websitemail($subject, $reset_link));

        return redirect()->back()->with('success', 'We have sent a password reset link to your email.');
    }

    public function reset_password($token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if (!$admin) {
            return redirect()->route('admin.login')->with('error', 'Token or email is not correct');
        }
        return view('admin.pages.auth.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $admin = Admin::where('email', $email)->where('token', $token)->first();
        $admin->password = Hash::make($request->password);
        $admin->token = "";
        $admin->update();

        return redirect()->route('admin.login')->with('success', 'Password reset is successful. You can login now.');
    }
}
