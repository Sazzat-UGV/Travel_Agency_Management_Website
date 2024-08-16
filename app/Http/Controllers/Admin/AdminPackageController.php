<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Package;
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
}
