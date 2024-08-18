<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Package;
use App\Models\TeamMember;
use App\Models\CounterItem;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\WelcomeItem;
use App\Models\BlogCategory;
use App\Models\PackagePhoto;
use App\Models\PackageAmenity;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\PackageItinerary;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function home()
    {
        $sliders = Slider::get();
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::latest('id')->get();
        $testimonials = Testimonial::latest('id')->get();
        $blogs = Blog::latest('id')->take(3)->get();
        $destinations = Destination::latest('view_count')->limit(12)->get();
        return view('frontend.pages.home', compact(
            'sliders',
            'welcome_item',
            'features',
            'testimonials',
            'blogs',
            'destinations',
        ));
    }

    public function about()
    {
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::latest('id')->get();
        $counter_item = CounterItem::where('id', 1)->first();

        return view('frontend.pages.about', compact(
            'welcome_item',
            'features',
            'counter_item',
        ));
    }

    public function team_members()
    {
        $team_members = TeamMember::latest('id')->paginate(12);
        return view('frontend.pages.team_member', compact('team_members'));
    }

    public function team_member($slug)
    {
        $team_member = TeamMember::where('slug', $slug)->first();
        return view('frontend.pages.team_member_detail', compact('team_member'));
    }

    public function faq()
    {
        $faqs = Faq::get();
        return view('frontend.pages.faq', compact('faqs'));
    }

    public function blog()
    {
        $blogs = Blog::latest('id')->paginate(9);
        return view('frontend.pages.blog', compact('blogs'));
    }

    public function blog_details($slug)
    {
        $blog_categories = BlogCategory::latest('id')->limit(8)->get();
        $latest_blogs = Blog::latest('id')->whereNot('slug', $slug)->limit(3)->get();
        $blog = Blog::with('blog_category:id,name,slug')->where('slug', $slug)->first();
        return view('frontend.pages.blog_details', compact('blog', 'blog_categories', 'latest_blogs'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->first();
        $blogs = Blog::with('blog_category')->where('blog_category_id', $category->id)->latest('id')->paginate(9);
        return view('frontend.pages.category', compact('category', 'blogs'));
    }

    public function destinations()
    {
        $destinations = Destination::latest('id')->paginate(12);
        return view('frontend.pages.destinations', compact('destinations'));
    }

    public function destination($slug)
    {
        $destination = Destination::where('slug', $slug)->first();
        $photos = DestinationPhoto::latest('id')->where('destination_id', $destination->id)->get();
        $videos = DestinationVideo::latest('id')->where('destination_id', $destination->id)->get();
        $packages = Package::where('destination_id', $destination->id)->get();
        $destination->view_count += 1;
        $destination->update();
        return view('frontend.pages.destination', compact('destination', 'photos', 'videos', 'packages'));
    }

    public function package($slug)
    {
        $package = Package::with('destination')->where('slug', $slug)->first();
        $package_amenity_include = PackageAmenity::with('amenity:id,name')->where('package_id', $package->id)->where('type', 'Include')->select('id', 'package_id', 'amenity_id')->get();
        $package_amenity_exclude = PackageAmenity::with('amenity:id,name')->where('package_id', $package->id)->where('type', 'Exclude')->select('id', 'package_id', 'amenity_id')->get();
        $package_itineraries = PackageItinerary::where('package_id', $package->id)->get();
        $package_photos = PackagePhoto::latest('id')->where('package_id', $package->id)->get();
        return view('frontend.pages.package_detail', compact(
            'package',
            'package_amenity_include',
            'package_amenity_exclude',
            'package_itineraries',
            'package_photos',
        ));
    }
}
