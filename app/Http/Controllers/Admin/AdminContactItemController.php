<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactItem;
use Illuminate\Http\Request;

class AdminContactItemController extends Controller
{
    public function index()
    {
        $contact_item = ContactItem::where('id', 1)->first();
        return view('admin.pages.contact_item.index', compact('contact_item'));
    }

    public function update(Request $request)
    {
        $contact_item = ContactItem::where('id', 1)->first();
        $contact_item->update([
            "map_code" => $request->map_code,
        ]);
        return redirect()->back()->with('success', 'Contact item updated successfully.');
    }
}
