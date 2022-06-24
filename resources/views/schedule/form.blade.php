@extends('layouts.app')

    <!DOCTYPE html>

<head>
    <link rel="stylesheet" href="{{asset('css/jquery.datetimepicker.min.css')}}">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
</head>
@section('content')
    <body>
    <div class="container">
        <div class="card-body">
            <div class="col-md-8">
                <input id="datetimepickerSchedule" type="text">

                <script src="{{asset('js/datetimepicker.js')}}"></script>
            </div>
        </div>
    </div>
    </body>
@endsection
