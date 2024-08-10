<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }

    public function profile()
    {
        return view('user.pages.profile');
    }

    public function profile_submit(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|min:11',
            'country' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:4',
                'retype_password' => 'required|string|same:password',
            ]);
            $user->password = Hash::make($request->password);
        }

        if ($request->photo) {
            $request->validate([
                'photo' => 'required|mimes:png,jpg|max:10240',
            ]);
            if ($user->photo != 'default.jpg') {
                $old_photo = public_path('uploads/user/' . $user->photo);
                if (file_exists($old_photo)) {
                    unlink($old_photo);
                }
            }
            $photo_loation = 'public/uploads/user/';
            $photo = $request->photo;
            $photoname = time() . '.' . $photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $photoname;
            $status = Image::make($photo)->resize(600, 600)->save(base_path($new_photo_location));
            $user->update([
                'photo' => $photoname,
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->zip_code;
        $user->update();

        return redirect()->back()->with('success', 'Profile is updated!');
    }

}
