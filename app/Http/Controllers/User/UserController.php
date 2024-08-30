<?php

namespace App\Http\Controllers\User;

use Image;
use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $total_completed_order=Booking::where('user_id',Auth::user()->id)->where('payment_status','Completed')->count();
        return view('user.pages.dashboard',compact('total_completed_order'));
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

    public function booking(){
        $all_booking = Booking::with('package','tour')->where('user_id',Auth::guard('web')->user()->id)->latest('id')->get();
        return view('user.pages.booking',compact('all_booking'));
    }

    public function user_invoice($invoice_no){
        $admin=Admin::findOrFail(1);
        $invoice = Booking::with('user','package','tour')->where('invoice_no', $invoice_no)->first();
        return view('user.pages.invoice',compact('invoice','admin'));
    }

}
