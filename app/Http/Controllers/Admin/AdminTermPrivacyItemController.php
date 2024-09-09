<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermPrivacyItem;
use Illuminate\Http\Request;

class AdminTermPrivacyItemController extends Controller
{
    public function index()
    {
        $term_privacy_item = TermPrivacyItem::where('id', 1)->first();
        return view('admin.pages.term_privacy_item.index', compact('term_privacy_item'));
    }

    public function update(Request $request)
    {
        $term_privacy_item = TermPrivacyItem::where('id', 1)->first();
        $term_privacy_item->update([
            "term" => $request->term,
            "privacy" => $request->privacy,
        ]);
        return redirect()->back()->with('success', 'Term and Privacy updated successfully.');
    }
}
