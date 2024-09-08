<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use Illuminate\Http\Request;

class AdminAboutItemController extends Controller
{
    public function index()
    {
        $about_item = AboutItem::where('id', 1)->first();
        return view('admin.pages.about_item.index', compact('about_item'));
    }

    public function update(Request $request)
    {
        $about_item = AboutItem::where('id', 1)->first();
        $about_item->update([
            "feature_status" => $request->feature_status,
        ]);
        return redirect()->back()->with('success', 'About item updated successfully.');
    }
}
