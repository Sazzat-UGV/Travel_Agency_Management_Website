<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\PackageAmenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenity::latest('id')->get();
        return view('admin.pages.amenity.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:amenities,name',
        ]);
        Amenity::create([
            'name' => $request->name,
        ]);
        return redirect()->route('amenity.index')->with('success', 'Amenity added successfully');
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
        $amenity = Amenity::findOrFail($id);
        return view('admin.pages.amenity.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $amenity = Amenity::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:amenities,name,' . $amenity->id,
        ]);
        $amenity->update([
            'name' => $request->name,
        ]);
        return redirect()->route('amenity.index')->with('success', 'Amenity update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $total = PackageAmenity::where('amenity_id', $id)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'Amenity already assigned to a Package.');
        }
        $amenity = Amenity::findorFail($id);
        $amenity->delete();
        return redirect()->back()->with('success', 'Amenity delete successfully');
    }
}
