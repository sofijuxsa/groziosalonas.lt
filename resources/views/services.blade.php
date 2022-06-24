@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

@section('content')
    <div class="card">
        <h2 class="title" style="color: #000000; text-align: center">
            Paslaugos
        </h2>
    </div>
    @foreach($services as $service)
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2> {{ $service->name }} </h2>
            </div>
        </div>
    </div>
         @foreach($service->children as $child)
        <div class="service-list">
            <ul>
                <li>{{$child->name}}</li>
            </ul>
            </div>
        </div>
        @endforeach
    @endforeach

@endsection

