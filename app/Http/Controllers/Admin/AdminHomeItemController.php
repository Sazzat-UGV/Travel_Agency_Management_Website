<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeItem;
use Illuminate\Http\Request;

class AdminHomeItemController extends Controller
{
    public function index()
    {
        $home_item = HomeItem::where('id', 1)->first();
        return view('admin.pages.home_item.index', compact('home_item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "destination_heading" => "required|string",
            "destination_subheading" => "required|string",
            "feature_heading" => "required|string",
            "feature_subheading" => "required|string",
            "package_heading" => "required|string",
            "package_subheading" => "required|string",
            "testimonial_heading" => "required|string",
            "testimonial_subheading" => "required|string",
            "blog_heading" => "required|string",
            "blog_subheading" => "required|string",
        ]);
        $home_item = HomeItem::where('id', 1)->first();
        $home_item->update([
            "destination_heading" => $request->destination_heading,
            "destination_subheading" => $request->destination_subheading,
            "destination_status" => $request->destination_status,
            "feature_heading" => $request->feature_heading,
            "feature_subheading" => $request->feature_subheading,
            "feature_status" => $request->feature_status,
            "package_heading" => $request->package_heading,
            "package_subheading" => $request->package_subheading,
            "package_status" => $request->package_status,
            "testimonial_heading" => $request->testimonial_heading,
            "testimonial_subheading" => $request->testimonial_subheading,
            "testimonial_status" => $request->testimonial_status,
            "blog_heading" => $request->blog_heading,
            "blog_subheading" => $request->blog_subheading,
            "blog_status" => $request->blog_status,
        ]);
        return redirect()->back()->with('success', 'Home item updated successfully.');
    }
}
