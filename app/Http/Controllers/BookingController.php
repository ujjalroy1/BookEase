<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'booking_date' => $validated['booking_date'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }

    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return response()->json($bookings);
    }
    public function adminIndex()
    {

        $bookings = Booking::all();

        return response()->json($bookings);
    }
}
