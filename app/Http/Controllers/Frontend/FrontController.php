<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Tour;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Booking;
use App\Models\Feature;
use App\Models\Package;
use App\Models\PackageFaq;
use App\Models\TeamMember;
use App\Models\CounterItem;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\WelcomeItem;
use App\Models\BlogCategory;
use App\Models\PackagePhoto;
use App\Models\PackageVideo;
use Illuminate\Http\Request;
use App\Models\PackageAmenity;
use App\Mail\PackageInquiryMail;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\PackageItinerary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
        $today = Carbon::today()->format('Y-m-d');
        $package = Package::with('destination')->where('slug', $slug)->first();
        $package_amenity_include = PackageAmenity::with('amenity:id,name')->where('package_id', $package->id)->where('type', 'Include')->select('id', 'package_id', 'amenity_id')->get();
        $package_amenity_exclude = PackageAmenity::with('amenity:id,name')->where('package_id', $package->id)->where('type', 'Exclude')->select('id', 'package_id', 'amenity_id')->get();
        $package_itineraries = PackageItinerary::where('package_id', $package->id)->get();
        $package_photos = PackagePhoto::latest('id')->where('package_id', $package->id)->get();
        $package_videos = PackageVideo::latest('id')->where('package_id', $package->id)->get();
        $package_faqs = PackageFaq::latest('id')->where('package_id', $package->id)->get();
        $tours = Tour::withSum('bookings', 'total_person')->latest('id')->where('package_id', $package->id)->where('booking_end_date', '>=', $today)->get();
        $package_reviews=Review::with('user')->latest('id')->where('package_id', $package->id)->get();
    
        return view('frontend.pages.package_detail', compact(
            'package',
            'package_amenity_include',
            'package_amenity_exclude',
            'package_itineraries',
            'package_photos',
            'package_videos',
            'package_faqs',
            'tours',
            'package_reviews',
        ));
    }

    public function package_inquiry(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $package = Package::findOrFail($id);
        $admin = Admin::where('id', 1)->first();

        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $inquiryMessage = $request->message;
        $package_name = $package->name;

        Mail::to($admin->email)->send(new PackageInquiryMail($name, $email, $phone, $inquiryMessage, $package_name));

        return redirect()->back()->with('success', 'Your mail has been sent successfully. We will contact you soon.');
    }

    public function payment(Request $request)
    {
        $user_id = Auth::user()->id;
        $package = Package::where('id', $request->package_id)->first();
        $total_price = $request->number_of_person * $request->ticket_price;
        if (!$request->tour_id) {
            return redirect()->back()->with('error', 'Please select a tour first');
        }

        $booked_seat = Booking::where('package_id', $request->package_id)->where('tour_id', $request->tour_id)->sum('total_person');
        $tour = Tour::where('id', $request->tour_id)->first();

        $available_seat = $tour->total_seat - $booked_seat;

        if ($available_seat > 0 && $available_seat < $request->number_of_person) {
            return redirect()->back()->with('error', 'Sorry! Only' . ' ' . $available_seat . ' ' . 'seats are available for this tour!');
        }

        if ($request->payment_method == 'PayPal') {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('paypal_success'),
                    'cancel_url' => route('paypal_cancel'),
                ],
                'purchase_units' => [
                    [
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => $total_price,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] == 'approve') {
                        session()->put('total_person', $request->number_of_person);
                        session()->put('tour_id', $request->tour_id);
                        session()->put('package_id', $request->package_id);
                        session()->put('user_id', $user_id);
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal_cancel');
            }
        }
        if ($request->payment_method == 'Stripe') {
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $package->name,
                            ],
                            'unit_amount' => $request->ticket_price * 100,
                        ],
                        'quantity' => $request->number_of_person,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe_success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe_cancel'),
            ]);
            //dd($response);
            if (isset($response->id) && $response->id != '') {
                session()->put('total_person', $request->number_of_person);
                session()->put('tour_id', $request->tour_id);
                session()->put('package_id', $request->package_id);
                session()->put('user_id', $user_id);
                session()->put('paid_amount', $total_price);
                return redirect($response->url);
            } else {
                return redirect()->route('stripe_cancel');
            }

        }

    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $obj = new Booking;
            $obj->tour_id = session()->get('tour_id');
            $obj->package_id = session()->get('package_id');
            $obj->user_id = session()->get('user_id');
            $obj->total_person = session()->get('total_person');
            $obj->paid_amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $obj->payment_status = 'Completed';
            $obj->payment_method = "PayPal";
            $obj->invoice_no = time();
            $obj->save();

            return redirect()->back()->with('success', "Payment is successful");

            unset($_SESSION['tour_id ']);
            unset($_SESSION['package_id ']);
            unset($_SESSION['user_id ']);
            unset($_SESSION['number_of_person']);

        } else {
            return redirect()->route('paypal_cancel');
        }

    }
    public function paypal_cancel()
    {
        return redirect()->back()->with('error', 'Payment is cancelled!');
    }

    public function stripe_success(Request $request)
    {
        if (isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $obj = new Booking;
            $obj->tour_id = session()->get('tour_id');
            $obj->package_id = session()->get('package_id');
            $obj->user_id = session()->get('user_id');
            $obj->total_person = session()->get('total_person');
            $obj->paid_amount = session()->get('paid_amount');
            $obj->payment_method = "Stripe";
            $obj->payment_status = 'Completed';
            $obj->invoice_no = time();
            $obj->save();

            return redirect()->back()->with('success', "Payment is successful");

            unset($_SESSION['tour_id ']);
            unset($_SESSION['package_id ']);
            unset($_SESSION['user_id ']);
            unset($_SESSION['number_of_person']);
            unset($_SESSION['paid_amount']);
        } else {
            return redirect()->route('stripe_cancel');
        }
    }

    public function stripe_cancel()
    {
        return redirect()->back()->with('error', 'Payment is cancelled!');
    }
    
    public function review_submit(Request $request){
        $request->validate([
            'review'=>'required',
            'rating'=>'required',
        ]);
       Review::create([
           'user_id'=>Auth::user()->id,
           'package_id'=>$request->package_id,
           'rating'=>$request->rating,
           'comment'=>$request->review,
        ]);

        $package_data=Package::where('id',$request->package_id)->first();
        $package_data->total_rating=$package_data->total_rating+1;
        $package_data->total_score=$package_data->total_score+$request->rating;
        $package_data->update();

        return redirect()->back()->with('success', 'Review is submitted successfully.');
    }
}
