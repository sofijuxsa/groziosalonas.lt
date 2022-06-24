<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceArtist;
use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->last_name = $request->post('last_name');
        $artist->email = $request->post('email');
        $artist->password = $request->post('password');
        $artist->phone_number = $request->post('phone_number');
        $artist->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        $data['artists'] = $artist;
        return view('artist.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        $data['artist'] = $artist;
        return view('artist.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->name = $request->post('name');
        $artist->last_name = $request->post('last_name');
        $artist->email = $request->post('email');
        $artist->password = $request->post('password');
        $artist->phone_number = $request->post('phone_number');
        $artist->save();
    }

    public function mySchedule(Artist $artist)
    {
        $id = Auth::id();
        $data['schedule'] = Schedule::query()->where('artist_id', $id)->get();
        return view('artist.schedule', $data);
    }

    public function filterArtist(Request $request)
    {
        $service = $request->post('service_id');

        $data['artist'] = ServiceArtist::query()->where('service_id', $service)->get();
//        $html = view('booking.form', $data);
//        return \Response::json(['status' => 'true','html' => $html->render() ]);
//        return view('booking.form', $data);
        return response()->view('booking.form', compact($data));
    }

}
