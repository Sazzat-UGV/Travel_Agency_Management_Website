<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CounterItem;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\WelcomeItem;

class FrontController extends Controller
{
    public function home()
    {
        $sliders = Slider::get();
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::latest('id')->get();
        $testimonials = Testimonial::latest('id')->get();

        return view('frontend.pages.home', compact(
            'sliders',
            'welcome_item',
            'features',
            'testimonials',
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

}
