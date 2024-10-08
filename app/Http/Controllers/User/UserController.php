<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Message;
use App\Models\MessageComment;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    public function dashboard()
    {
        $total_completed_order = Booking::where('user_id', Auth::user()->id)->where('payment_status', 'Completed')->count();
        $total_review = Review::where('user_id', Auth::user()->id)->count();

        $latest_booking = Booking::with('package', 'tour')->where('user_id', Auth::guard('web')->user()->id)->latest('id')->limit(5)->get();
        return view('user.pages.dashboard', compact('total_completed_order','total_review','latest_booking'));
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

    public function booking()
    {
        $all_booking = Booking::with('package', 'tour')->where('user_id', Auth::guard('web')->user()->id)->latest('id')->get();
        return view('user.pages.booking', compact('all_booking'));
    }

    public function user_invoice($invoice_no)
    {
        $admin = Admin::findOrFail(1);
        $invoice = Booking::with('user', 'package', 'tour')->where('invoice_no', $invoice_no)->first();
        return view('user.pages.invoice', compact('invoice', 'admin'));
    }

    public function index()
    {
        $reviews = Review::with('package')->where('user_id', Auth::user()->id)->latest('id')->get();
        return view('user.pages.reviews', compact('reviews'));
    }

    public function message()
    {
        $message_check = Message::where('user_id', Auth::user()->id)->count();
        $message = Message::where('user_id', Auth::user()->id)->first();
        if ($message) {
            $message_comment = MessageComment::where('message_id', $message->id)->get();
        } else {
            $message_comment = [];
        }

        return view('user.pages.message', compact('message_check', 'message_comment'));
    }

    public function message_start()
    {
        $message_check = Message::where('user_id', Auth::user()->id)->count();

        if ($message_check > 0) {
            return redirect()->back()->with('error', 'You have already started a conversation!');
        }
        Message::create([
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function message_submit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $message = Message::where('user_id', Auth::user()->id)->first();
        MessageComment::create([
            'message_id' => $message->id,
            'sender_id' => Auth::user()->id,
            'type' => 'User',
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', 'Message is sent successfully!');
    }
}
