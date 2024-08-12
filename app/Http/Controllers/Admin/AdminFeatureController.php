<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::latest('id')->get();
        return view('admin.pages.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'description' => 'required',
        ]);
        Feature::create([
            'icon' => $request->icon,
            'heading' => $request->heading,
            'description' => $request->description,
        ]);
        return redirect()->route('feature.index')->with('success', 'Feature added successfully');
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
        $feature = Feature::findOrFail($id);
        return view('admin.pages.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'description' => 'required',
        ]);
        $feature = Feature::findOrFail($id);
        $feature->update([
            'icon' => $request->icon,
            'heading' => $request->heading,
            'description' => $request->description,
        ]);
        return redirect()->route('feature.index')->with('success', 'Feature update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->back()->with('success', 'Feature delete successfully');
    }

}
