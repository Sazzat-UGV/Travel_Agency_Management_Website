<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Image;

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

    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:4',
                'retype_password' => 'required|string|same:password',
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();
        return redirect()->back()->with('success', 'Profile is updated!');
    }

    public function profile_image_submit(Request $request)
    {

        $request->validate([
            'photo' => 'required|mimes:png,jpg|max:10240',
        ]);
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        $old_photo = public_path('uploads/user/' . $admin->photo);
        if (file_exists($old_photo)) {
            unlink($old_photo);
        }
        $photo_loation = 'public/uploads/user/';
        $photo = $request->photo;
        $photoname = time() . '.' . $photo->getClientOriginalExtension();
        $new_photo_location = $photo_loation . $photoname;
        $status = Image::make($photo)->resize(600, 600)->save(base_path($new_photo_location));
        $admin->update([
            'photo' => $photoname,
        ]);

        return redirect()->back()->with('success', 'Profile Picture Updated Successfully!');
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
