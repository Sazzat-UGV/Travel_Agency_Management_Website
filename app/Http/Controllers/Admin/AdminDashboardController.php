<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Tour;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $total_slider = Slider::count();
        $total_testimonial = Testimonial::count();
        $total_team_member = TeamMember::count();
        $total_blog_post = Blog::count();
        $total_destination = Destination::count();
        $total_package = Package::count();
        $total_user = User::where('status', 1)->count();
        $total_subscriber = Subscriber::where('status', 'Active')->count();
        $total_tour = Tour::count();
        return view('admin.dashboard', compact([
            'total_slider',
            'total_testimonial',
            'total_team_member',
            'total_blog_post',
            'total_destination',
            'total_package',
            'total_user',
            'total_subscriber',
            'total_tour',
        ]));
    }
}
