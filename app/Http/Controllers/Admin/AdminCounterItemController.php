<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounterItem;
use Illuminate\Http\Request;

class AdminCounterItemController extends Controller
{
    public function index()
    {
        $counter_item = CounterItem::where('id', 1)->first();
        return view('admin.pages.counter.index', compact('counter_item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "item1_name" => "required|string",
            "item1_number" => "required|numeric",
            "item2_name" => "required|string",
            "item2_number" => "required|numeric",
            "item3_name" => "required|string",
            "item3_number" => "required|numeric",
            "item4_name" => "required|string",
            "item4_number" => "required|numeric",
        ]);
        $counter_item = CounterItem::where('id', 1)->first();
        $counter_item->update([
            "item1_name" => $request->item1_name,
            "item1_number" => $request->item1_number,
            "item2_name" => $request->item2_name,
            "item2_number" => $request->item2_number,
            "item3_name" => $request->item3_name,
            "item3_number" => $request->item3_number,
            "item4_name" => $request->item4_name,
            "item4_number" => $request->item4_number,
            "status" => $request->status,
        ]);
        return redirect()->back()->with('success', 'Counter item updated successfully.');
    }
}
