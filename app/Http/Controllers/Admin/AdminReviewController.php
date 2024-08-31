<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user', 'package')->latest('id')->get();
        return view('admin.pages.review.index', compact('reviews'));
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $rating = $review->rating;
        $package_id = $review->package_id;
        $review->delete();

        $package_data = Package::where('id', $package_id)->first();
        $updated_total_rating = $package_data->total_rating - 1;
        $updated_total_score = $package_data->total_score - $rating;
        $package_data->update([
            'total_rating' => $updated_total_rating,
            'total_score' => $updated_total_score,
        ]);
        return redirect()->back()->with('success', 'Review delete successfully');
    }
}
