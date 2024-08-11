<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest('id')->get();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $slider = Slider::create([
            'heading' => $request->heading,
            'text' => $request->text,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
        ]);
        $this->image_upload($request, $slider->id);
        return redirect()->route('slider.index')->with('success', 'Slider added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'heading' => 'required',
            'text' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $slider = Slider::findOrFail($id);
        $slider->update([
            'heading' => $request->heading,
            'text' => $request->text,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
        ]);
        $this->image_upload($request, $slider->id);
        return redirect()->route('slider.index')->with('success', 'Slider update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findorFail($id);
        if ($slider->photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/slider/';
            $old_photo_location = $photo_location . $slider->photo;
            unlink(base_path($old_photo_location));
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Slider delete successfully');
    }

    public function image_upload($request, $slider_id)
    {
        $slider = Slider::findorFail($slider_id);

        if ($request->hasFile('photo')) {
            if ($slider->photo != '') {
                //delete old photo
                $photo_location = 'public/uploads/slider/';
                $old_photo_location = $photo_location . $slider->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/slider/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $slider->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
