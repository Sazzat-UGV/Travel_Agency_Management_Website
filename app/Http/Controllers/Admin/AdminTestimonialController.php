<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image;

class AdminTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest('id')->get();
        return view('admin.pages.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $testimonial = Testimonial::create([
            'name' => $request->name,
            'location' => $request->location,
            'comment' => $request->comment,
        ]);
        $this->image_upload($request, $testimonial->id);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'comment' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'name' => $request->name,
            'location' => $request->location,
            'comment' => $request->comment,
        ]);
        $this->image_upload($request, $testimonial->id);
        return redirect()->route('testimonial.index')->with('success', 'Testimonial update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findorFail($id);
        if ($testimonial->photo != 'default.png') {
            //delete old photo
            $photo_location = 'public/uploads/testimonial/';
            $old_photo_location = $photo_location . $testimonial->photo;
            unlink(base_path($old_photo_location));
        }
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial delete successfully');
    }

    public function image_upload($request, $testimonial_id)
    {
        $testimonial = Testimonial::findorFail($testimonial_id);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo != 'default.png') {
                //delete old photo
                $photo_location = 'public/uploads/testimonial/';
                $old_photo_location = $photo_location . $testimonial->photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/testimonial/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->resize(600, 600)->save(base_path($new_photo_location));
            $check = $testimonial->update([
                'photo' => $new_photo_name,
            ]);
        }
    }
}
