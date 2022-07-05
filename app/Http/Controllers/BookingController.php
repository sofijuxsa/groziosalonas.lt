<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->client_id = random_int(1, 1000);
        $booking->artist_id = $request->post('artist_id');
        $booking->active = 1;
        $booking->start_time = $request->post('start_time');
        $booking->end_time = $request->post('end_time');
        $booking->save();

        $client = new Client();
        $client->name = $request->post('name');
        $client->email = $request->post('email');
        $client->phone_number = $request->post('phone_number');
        $client->save();
    }

    public function create()
    {
        $data['services'] = Service::query()->where('parent_id', 0)->get();
        return view('booking.form', $data);
    }

    public function filterBooking(Request $request)
    {
        $artist_id = $request->post('artist');
        dd($artist_id);
//        $date = $request->post('formData');
//        console.log($date);
//        console.log($artist_id);
        return response()->json($artist_id);
    }
}
