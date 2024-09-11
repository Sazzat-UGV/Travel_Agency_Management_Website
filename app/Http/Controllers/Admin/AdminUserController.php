<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Message;
use App\Models\MessageComment;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::latest('id')->get();
        return view('admin.pages.user.users', compact('users'));
    }

    public function user_create()
    {
        return view('admin.pages.user.user_create');
    }
    public function user_create_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'country' => $request->country,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'status' => $request->status,
        ]);
        $this->image_upload($request, $user->id);
        return redirect()->route('admin.users')->with('success', 'User added successfully');
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.user.user_edit', compact('user'));
    }

    public function user_edit_submit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
        ]);
        $user = User::findOrFail($id);
        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->status = $request->status;
        $user->save();

        $this->image_upload($request, $user->id);
        return redirect()->route('admin.users')->with('success', 'User udpate successfully');
    }

    public function user_delete($id)
    {
        $total = Review::where('user_id', $id)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'User cannot be deleted because it has some reviews.');
        }
        $total1 = Message::where('user_id', $id)->count();
        if ($total1 > 0) {
            return redirect()->back()->with('error', 'User cannot be deleted because it has some message.');
        }
        $total2 = Booking::where('user_id', $id)->count();
        if ($total2 > 0) {
            return redirect()->back()->with('error', 'User cannot be deleted because it has some bookings.');
        }
        $user = User::findOrFail($id);
        if ($user->photo != 'default.jpg') {
            //delete old photo
            $photo_location = 'public/uploads/user/';
            $old_photo_location = $photo_location . $user->photo;
            unlink(base_path($old_photo_location));
        }
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User delete successfully');
    }

    public function message()
    {
        $messages = Message::with('user')->get();
        return view('admin.pages.user.message', compact('messages'));
    }

    public function message_detail($id)
    {
        $message_comment = MessageComment::where('message_id', $id)->get();
        return view('admin.pages.user.message_detail', compact('message_comment', 'id'));
    }

    public function message_submit(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        MessageComment::create([
            'message_id' => $id,
            'sender_id' => Auth::guard('admin')->user()->id,
            'type' => 'Admin',
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', 'Message is sent successfully!');
    }

    public function image_upload($request, $user_id)
    {
        $user = User::findorFail($user_id);

        if ($request->hasFile('photo')) {
            if ($user->photo != 'default.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/user/';
                $old_photo_location = $photo_location . $user->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/user/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $user->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
