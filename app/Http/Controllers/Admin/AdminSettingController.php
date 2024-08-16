<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->first();
        return view('admin.pages.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::where('id', 1)->first();

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            ]);
            if ($setting->logo != 'default_logo.png') {
                //delete old photo
                $photo_location = 'public/uploads/setting/';
                $old_photo_location = $photo_location . $setting->logo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('logo');
            $new_photo_name = 'new_logo' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $setting->update([
                'logo' => $new_photo_name,
            ]);
        }
        if ($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            ]);
            if ($setting->favicon != 'default_favicon.png') {
                //delete old photo
                $photo_location = 'public/uploads/setting/';
                $old_photo_location = $photo_location . $setting->favicon;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('favicon');
            $new_photo_name = 'new_favicon' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $setting->update([
                'favicon' => $new_photo_name,
            ]);
        }
        if ($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:10240',
            ]);
            if ($setting->banner != 'default_banner.jpg') {
                //delete old photo
                $photo_location = 'public/uploads/setting/';
                $old_photo_location = $photo_location . $setting->banner;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/setting/';
            $uploaded_photo = $request->file('banner');
            $new_photo_name = 'new_banner' . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $setting->update([
                'banner' => $new_photo_name,
            ]);
        }
        $setting->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'copyright' => $request->copyright,
        ]);

        return redirect()->back()->with('success', 'Setting is updated successfully.');
    }
}
