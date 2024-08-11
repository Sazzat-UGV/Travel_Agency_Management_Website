<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function home(){

        $sliders=Slider::get();
        return view('frontend.pages.home',compact('sliders'));
    }

}
