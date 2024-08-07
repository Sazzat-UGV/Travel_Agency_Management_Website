<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function profile()
    {
        return view('admin.pages.auth.profile');
    }

    public function forget_password()
    {
        return view('admin.pages.auth.forget_password');
    }

    public function reset_password()
    {
        return view('admin.pages.auth.reset_password');
    }
}
