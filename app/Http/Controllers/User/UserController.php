<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }

}
