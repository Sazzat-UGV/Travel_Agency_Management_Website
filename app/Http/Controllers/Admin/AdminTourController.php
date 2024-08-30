<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Tour;
use Illuminate\Http\Request;

class AdminTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::with('package')->latest('id')->get();
        return view('admin.pages.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::latest('id')->get();
        return view('admin.pages.tour.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'package' => 'required|numeric',
            'total_seat' => 'nullable',
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
        ]);
        Tour::create([
            'package_id' => $request->package,
            'total_seat' => $request->total_seat,
            'tour_start_date' => $request->tour_start_date,
            'tour_end_date' => $request->tour_end_date,
            'booking_end_date' => $request->booking_end_date,
        ]);
        return redirect()->route('tour.index')->with('success', 'Tour added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $packages = Package::latest('id')->get();
        $tour = Tour::findOrFail($id);
        return view('admin.pages.tour.edit', compact('tour', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'package' => 'required|numeric',
            'total_seat' => 'nullable',
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
        ]);
        $tour = Tour::findOrFail($id);
        $tour->update([
            'package_id' => $request->package,
            'total_seat' => $request->total_seat,
            'tour_start_date' => $request->tour_start_date,
            'tour_end_date' => $request->tour_end_date,
            'booking_end_date' => $request->booking_end_date,
        ]);
        return redirect()->route('tour.index')->with('success', 'Tour update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $total=Booking::where('tour_id',$id)->count();
        if($total>0){
            return redirect()->back()->with('error', 'This tour has bookings. So it cannot be deleted.');
        }
        $tour = Tour::findOrFail($id);
        $tour->delete();
        return redirect()->back()->with('success', 'Tour delete successfully');
    }

    public function tour_booking($tour_id, $package_id)
    {
        $all_booking = Booking::with('user')->where('tour_id', $tour_id)->where('package_id', $package_id)->latest('id')->get();
        return view('admin.pages.tour.booking', compact('all_booking'));
    }

    public function tour_booking_delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Booking is deleted successfully.');
    }

    public function tour_invoice($invoice_no)
    {
        $invoice = Booking::with('user','package','tour')->where('invoice_no', $invoice_no)->first();
        return view('admin.pages.tour.invoice', compact('invoice'));
    }
}
