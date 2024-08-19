<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Destination;
use App\Models\Package;
use App\Models\PackageAmenity;
use App\Models\PackageFaq;
use App\Models\PackageItinerary;
use App\Models\PackagePhoto;
use App\Models\PackageVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class AdminPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::latest('id')->get();
        return view('admin.pages.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('admin.pages.package.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:packages',
            'description' => 'required',
            'destination' => 'required|numeric',
            'price' => 'required|numeric',
            'featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $package = Package::create([
            'destination_id' => $request->destination,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'map' => $request->map,
        ]);
        $this->image_upload($request, $package->id);
        return redirect()->route('package.index')->with('success', 'Package added successfully');
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
        $package = Package::findOrFail($id);
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('admin.pages.package.edit', compact('package', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = Package::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:packages,name,' . $package->id,
            'description' => 'required',
            'destination' => 'required|numeric',
            'price' => 'required|numeric',
            'featured_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        $package->update([
            'destination_id' => $request->destination,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'map' => $request->map,
        ]);
        $this->image_upload($request, $package->id);
        return redirect()->route('package.index')->with('success', 'Package update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $total = PackageAmenity::where('package_id', $id)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'Package contain some amenities.');
        }

        $total1 = PackageItinerary::where('package_id', $id)->count();
        if ($total1 > 0) {
            return redirect()->back()->with('error', 'Package contain some itineraries.');
        }
        $total2 = PackagePhoto::where('package_id', $id)->count();
        if ($total2 > 0) {
            return redirect()->back()->with('error', 'Package contain some photos.');
        }
        $total3 = PackageVideo::where('package_id', $id)->count();
        if ($total3 > 0) {
            return redirect()->back()->with('error', 'Package contain some videos.');
        }
        $total4 = PackageFaq::where('package_id', $id)->count();
        if ($total4 > 0) {
            return redirect()->back()->with('error', 'Package contain some faqs.');
        }

        $package = Package::findOrFail($id);
        if ($package->featured_photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/package/';
            $old_photo_location = $photo_location . $package->featured_photo;
            unlink(base_path($old_photo_location));
        }
        $package->delete();
        return redirect()->back()->with('success', 'Package delete successfully');
    }

    public function image_upload($request, $dpackage_id)
    {
        $package = Package::findorFail($dpackage_id);

        if ($request->hasFile('featured_photo')) {
            if ($package->featured_photo != '') {
                //delete old photo
                $photo_location = 'public/uploads/package/';
                $old_photo_location = $photo_location . $package->featured_photo;
                unlink(base_path($old_photo_location));
            }
            $photo_loation = 'public/uploads/package/';
            $uploaded_photo = $request->file('featured_photo');
            $new_photo_name = time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            $check = $package->update([
                'featured_photo' => $new_photo_name,
            ]);
        }
    }
    public function package_amenity($id)
    {
        $package = Package::findOrFail($id);
        $amenities = Amenity::orderBy('name', 'asc')->get();
        $package_amenities = PackageAmenity::with('amenity')->latest('id')->where('package_id', $package->id)->get();
        return view('admin.pages.package.amenities', compact('package', 'package_amenities', 'amenities'));
    }

    public function package_amenity_submit(Request $request, $id)
    {
        $total = PackageAmenity::where('package_id', $id)->where('amenity_id', $request->amenity)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'Amenity alrady inserted.');
        }
        PackageAmenity::create([
            'package_id' => $id,
            'amenity_id' => $request->amenity,
            'type' => $request->type,
        ]);
        return redirect()->back()->with('success', 'Amenity inserted successfully');
    }

    public function package_amenity_delete($id)
    {
        $package_amenity = PackageAmenity::findOrFail($id);
        $package_amenity->delete();
        return redirect()->back()->with('success', 'Amenity delete successfully');
    }

    public function package_itinerary($id)
    {
        $package = Package::findOrFail($id);
        $package_itineraries = PackageItinerary::latest('id')->where('package_id', $package->id)->get();
        return view('admin.pages.package.itineraries', compact('package', 'package_itineraries'));
    }

    public function package_itinerary_submit(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|numeric',
            'name' => 'required|unique:package_itineraries,name',
            'description' => 'required',
        ]);
        PackageItinerary::create([
            'package_id' => $id,
            'day' => $request->day,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Itinerary inserted successfully');
    }

    public function package_itinerary_delete($id)
    {
        $package_itinerary = PackageItinerary::findOrFail($id);
        $package_itinerary->delete();
        return redirect()->back()->with('success', 'Itinerary delete successfully');
    }

    public function package_photos($id)
    {
        $package = Package::findOrFail($id);
        $photos = PackagePhoto::latest('id')->where('package_id', $package->id)->get();
        return view('admin.pages.package.photos', compact('package', 'photos'));
    }

    public function package_photos_submit(Request $request, $id)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        if ($request->hasFile('photo')) {
            $photo_loation = 'public/uploads/package/';
            $uploaded_photo = $request->file('photo');
            $new_photo_name = 'multi' . time() . '.' . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_loation . $new_photo_name;
            Image::make($uploaded_photo)->save(base_path($new_photo_location));
            PackagePhoto::create([
                'package_id' => $id,
                'photo' => $new_photo_name,
            ]);
        }
        return redirect()->back()->with('success', 'Photo inserted successfully');
    }

    public function package_photos_delete($id)
    {

        $package_photo = PackagePhoto::findOrFail($id);
        if ($package_photo->photo != '') {
            //delete old photo
            $photo_location = 'public/uploads/package/';
            $old_photo_location = $photo_location . $package_photo->photo;
            unlink(base_path($old_photo_location));
        }
        $package_photo->delete();
        return redirect()->back()->with('success', 'Photo delete successfully');
    }

    public function package_videos($id)
    {
        $package = Package::findOrFail($id);
        $videos = PackageVideo::latest('id')->where('package_id', $package->id)->get();
        return view('admin.pages.package.videos', compact('package', 'videos'));
    }

    public function package_videos_submit(Request $request, $id)
    {
        $request->validate([
            'video' => 'required',
        ]);
        $package = Package::findOrFail($id);
        PackageVideo::create([
            'package_id' => $package->id,
            'video' => $request->video,
        ]);
        return redirect()->back()->with('success', 'Video inserted successfully');
    }

    public function package_videos_delete($id)
    {

        $package_video = PackageVideo::findOrFail($id);
        $package_video->delete();
        return redirect()->back()->with('success', 'Video delete successfully');
    }

    public function package_faqs($id)
    {
        $package = Package::findOrFail($id);
        $faqs = PackageFaq::latest('id')->where('package_id', $package->id)->get();
        return view('admin.pages.package.faqs', compact('package', 'faqs'));
    }

    public function package_faqs_submit(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $package = Package::findOrFail($id);
        PackageFaq::create([
            'package_id' => $package->id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->back()->with('success', 'Faq inserted successfully');
    }

    public function package_faqs_delete($id)
    {

        $package_faq = PackageFaq::findOrFail($id);
        $package_faq->delete();
        return redirect()->back()->with('success', 'Faq delete successfully');
    }
}
