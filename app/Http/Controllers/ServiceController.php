<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {

    }

    public function show(Service $service)
    {
        $data['services'] = Service::query()->where('parent_id', 0)->get();
        return view('services', $data);
    }
}
