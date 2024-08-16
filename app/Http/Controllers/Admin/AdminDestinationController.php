<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::latest('id')->get();
        return view('admin.pages.destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:destinations',
            'description' => 'required',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $destination = Destination::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'country' => $request->country,
            'language' => $request->language,
            'currency' => $request->currency,
            'area' => $request->area,
            'timezone' => $request->timezone,
            'visa_requirement' => $request->visa_requirement,
            'activity' => $request->activity,
            'best_time' => $request->best_time,
            'health_safety' => $request->health_safety,
            'map' => $request->map,
            'view_count' => 1,
        ]);
        $this->image_upload($request, $destination->id);
        return redirect()->route('destination.index')->with('success', 'Destination added successfully');
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
        $destination = Destination::findOrFail($id);
        return view('admin.pages.destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destination = Destination::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:destinations,name,' . $destination->id,
            'description' => 'required',
            'featured_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $destination->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'country' => $request->country,
            'language' => $request->language,
            'currency' => $request->currency,
            'area' => $request->area,
            'timezone' => $request->timezone,
            'visa_requirement' => $request->visa_requirement,
            'activity' => $request->activity,
            'best_time' => $request->best_time,
            'health_safety' => $request->health_safety,
            'map' => $request->map,
        ]);
        $this->image_upload($request, $destination->id);
        return redirect()->route('destination.index')->with('success', 'Destination update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        if ($destination->featured_photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/destination/';
            $old_photo_location = $photo_location . $destination->featured_photo;
            unlink(base_path($old_photo_location));
        }
        $destination->delete();
        return redirect()->back()->with('success', 'Destination delete successfully');
    }

    public function image_upload($request, $destination_id)
    {
        $destination = Destination::findorFail($destination_id);

        if ($request->hasFile('featured_photo')) {
            if ($destination->featured_photo != '') {
                //delete old photo
                $photo_location = 'public/uploads/destination/';
                $old_photo_location = $photo_location . $destination->featured_photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/destination/';
            $uploaded_photo = $request->file('featured_photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $destination->update([
                'featured_photo' => $new_photo_name,
            ]);
        }
    }
}
