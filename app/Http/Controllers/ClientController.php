<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request)
    {
        $client = new Client();
        $client->name = $request->post('name');
        $client->email = $request->post('email');
        $client->phone_number = $request->post('phone_number');
        $client->save();
    }
}
