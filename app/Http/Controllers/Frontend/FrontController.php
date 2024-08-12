<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CounterItem;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\WelcomeItem;

class FrontController extends Controller
{
    public function home()
    {
        $sliders = Slider::get();
        $welcome_item = WelcomeItem::where('id', 1)->first();
        $features = Feature::latest('id')->get();
        return view('frontend.pages.home', compact(
            'sliders',
            'welcome_item',
            'features',
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

}
