<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
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
        $destination_photos = DestinationPhoto::where('destination_id', $destination->id)->count();
        $destination_videos = DestinationVideo::where('destination_id', $destination->id)->count();
        if ($destination_photos > 0) {
            return redirect()->back()->with('error', 'Delete all the photo of this destination first.');
        }
        if ($destination_videos > 0) {
            return redirect()->back()->with('error', 'Delete all the video of this destination first.');
        }
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

    public function destination_photos($id)
    {
        $destination = Destination::findOrFail($id);
        $photos = DestinationPhoto::latest('id')->where('destination_id', $destination->id)->get();
        return view('admin.pages.destination.photos', compact('destination', 'photos'));
    }

    public function destination_photo_submit(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $destination = Destination::findOrFail($id);
        if ($request->hasFile('photo')) {
            $photo_loation = 'public/uploads/destination/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = 'multi' . time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            DestinationPhoto::create([
                'destination_id' => $destination->id,
                'photo' => $new_photo_name,
            ]);
        }
        return redirect()->back()->with('success', 'Photo inserted successfully');
    }

    public function destination_photo_delete($id)
    {

        $destination_photo = DestinationPhoto::findOrFail($id);
        if ($destination_photo->photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/destination/';
            $old_photo_location = $photo_location . $destination_photo->photo;
            unlink(base_path($old_photo_location));
        }
        $destination_photo->delete();
        return redirect()->back()->with('success', 'Photo delete successfully');
    }

    public function destination_videos($id)
    {
        $destination = Destination::findOrFail($id);
        $videos = DestinationVideo::latest('id')->where('destination_id', $destination->id)->get();
        return view('admin.pages.destination.videos', compact('destination', 'videos'));
    }

    public function destination_video_submit(Request $request, $id)
    {
        $request->validate([
            'video' => 'required',
        ]);
        $destination = Destination::findOrFail($id);
        DestinationVideo::create([
            'destination_id' => $destination->id,
            'video' => $request->video,
        ]);
        return redirect()->back()->with('success', 'Video inserted successfully');
    }

    public function destination_video_delete($id)
    {

        $destination_video = DestinationVideo::findOrFail($id);
        $destination_video->delete();
        return redirect()->back()->with('success', 'Video delete successfully');
    }
}
