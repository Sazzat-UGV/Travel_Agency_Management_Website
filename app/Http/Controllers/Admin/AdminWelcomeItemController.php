<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeItem;
use Illuminate\Http\Request;
use Image;

class AdminWelcomeItemController extends Controller
{
    public function index()
    {
        $welcome_item = WelcomeItem::where('id', 1)->first();
        return view('admin.pages.welcome.index', compact('welcome_item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "heading" => "required|string",
            "description" => "required|string",
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $welcome_item->update([
            "heading" => $request->heading,
            "description" => $request->description,
            "button_name" => $request->button_name,
            "button_link" => $request->button_link,
            "video" => $request->video,
            "status" => $request->status,
        ]);

        if ($request->hasFile('photo')) {
            if ($welcome_item->photo != 'default.png') {
                //delete old photo
                $photo_location = 'public/uploads/welcome_item/';
                $old_photo_location = $photo_location . $welcome_item->photo;
                unlink(base_path($old_photo_location));
            }

            $photo_loation = 'public/uploads/welcome_item/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = 'welcome_item' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(800, 800)->save(base_path($new_photo_location));
            $check = $welcome_item->update([
                'photo' => $new_photo_name,
            ]);
        }
        return redirect()->back()->with('success', 'Welcome item updated successfully.');
    }

}
