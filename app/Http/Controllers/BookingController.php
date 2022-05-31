<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        $booking = new Booking();
        $booking->client_id = $request->post('client_id');
        $booking->artist_id = $request->post('artist_id');
        $booking->active = 1;
        $booking->start_time = $request->post('start_time');
        $booking->end_time = $request->post('end_time');
        $booking-save();
    }
}
