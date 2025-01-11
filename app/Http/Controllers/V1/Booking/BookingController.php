<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function getAllVendorBookings()
    {
        $bookings = auth()->user()->provider()->serviceOffer;
        return $booking;
    }



    public function store(BookingRequest $request)
    {
        Booking::create($request->validated());
        return $this->responseWithSuccessMessage("service booked successfully", 201);
    }


    public function show(Booking $booking)
    {
        return $this->respondWithItem($booking);
    }



    public function update(Request $request, Booking $booking)
    {
        //
    }


    public function destroy(Booking $booking)
    {
        //
    }
}
