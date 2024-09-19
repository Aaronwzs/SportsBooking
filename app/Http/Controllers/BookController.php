<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function index()
    {
        $facilities = Facility::select('facility_name', 'facility_id', 'status')->distinct()->where('status', 1)->get();

        return view('booking.book', compact('facilities'));
    }



    public function submit(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'venue' => 'required|exists:facilities,facility_id',
        ]);

        // Check for overlapping bookings
        $overlap = Booking::where('facility_id', $request->venue)
            ->where('booking_date', $request->booking_date)
            ->where(function ($query) use ($request) {
                $query->whereBetween('time_from', [$request->start_time, $request->end_time])
                      ->orWhereBetween('time_to', [$request->start_time, $request->end_time])
                      ->orWhere(function ($query) use ($request) {
                          $query->where('time_from', '<=', $request->start_time)
                                ->where('time_to', '>=', $request->end_time);
                      });
            })
            ->exists();

        if ($overlap) {
            return redirect()->back()->withErrors(['time' => 'The selected time overlaps with an existing booking.'])->withInput();
        }

        // Create a new booking
        $booking = new Booking();
        $booking->ref_code = strtoupper(Str::random(10));
        $booking->user_id = Auth::id();
        $booking->facility_id = $request->venue;
        $booking->booking_date = $request->booking_date;
        $booking->time_from = $request->start_time;
        $booking->time_to = $request->end_time;
        $booking->status = 0; // Set status to 0 for pending bookings

        // Save the booking
        $booking->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Booking created successfully!');

        
    }

    public function userBookings()
    {
        // Assuming you have a way to get the authenticated user
        $user = auth()->user();

        // Fetch bookings related to the user
        $bookings = Booking::where('user_id', $user->id)->get();

        return view('booking.myBooking', compact('bookings'));
    }

    public function cancelBooking($id)
{
    $booking = Booking::findOrFail($id);
    
    // Update the status to 0 for cancelled
    $booking->status = 4;
    $booking->save();

    return redirect()->route('booking.mybooking')->with('success', 'Booking cancelled successfully.');
}
    
}