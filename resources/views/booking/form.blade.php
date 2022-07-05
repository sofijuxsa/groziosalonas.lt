@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<script type="text/javascript" scr="{{asset('js/datepicker.js')}}"></script>

@section('page-script')
    <script>
        $(function chooseService() {

            $('#chooseService').on('change', function() {

                let formData = $('#serviceForm').serialize();

                $.ajax({
                    url: "{{ route('artist.filter') }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        var select = $('#chooseArtist').empty();

                        select.append( '<option value="-1">Pasirinkite meistrą</option>');

                        $.each(response, function(index, artist) {
                            select.append( '<option id="artist" value="'
                                + artist.id
                                + '">'
                                + artist.name
                                + '</option>');
                        });

                    },
                    error: function (response) {
                        console.log('Error', response);
                    }
                });
            });
        });
    </script>

    <script>
        $(function chooseArtist() {

            $('#chooseArtist').on('change', function() {

                let formData = $('#artistForm').serialize();


                $.ajax({
                    url: "{{ route('schedule.filter') }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        $('#datepickerSchedule').datetimepicker({
                            minDate : 0,
                            maxDate: '+1970-02-02',
                            minTime : '08:00',
                            maxTime : '19:00',
                            step : 15,
                            formatDate : 'Y-m-d',
                            formatTime: 'H:i',
                            disabledDates: response
                        });

                    },
                    error: function (response) {
                        console.log('Error', response);
                    }
                });
            });
        });
    </script>

    <script>
        $(function chooseDate() {

            $('#datepickerSchedule').on('oninput', function() {

                var serviceId = document.getElementById('service');
                console.log(serviceId);
                var artistId = document.getElementById('artist');
                console.log(artistId);


                let formData = $('#dateForm').serialize();

                // formData.append('artist_id', artist_id);


                $.ajax({
                    url: "{{ route('booking.filter') }}",
                    method: 'post',
                    data: {id : artistId},
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                    },
                    error: function (response) {
                        console.log('Error', response);
                    }
                });
            });
        });
    </script>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rezervacija') }}</div>
                <div class="card-body">
{{--                    <form class="form" method="POST" action="{{ route('booking.store') }}">--}}
{{--                        @csrf--}}
{{--                        @method('POST')--}}
{{--                        <div class="form-group">--}}
{{--                            <input id="name" type="text" name="name" class="form-control"--}}
{{--                                   placeholder="Vardas">--}}
{{--                            <input id="email" type="email" name="email" class="form-control"--}}
{{--                                   placeholder="El. paštas">--}}
{{--                            <input id="phone_number" type="text" name="phone_number" class="form-control"--}}
{{--                                   placeholder="Tel. numeris">--}}

{{--                            <label for="services">Pasirinkite paslaugą:</label> <br>--}}
{{--                            @foreach($services as $service)--}}

{{--                                <label type="title" value="{{$service->id}}" name="parent_id"> {{$service->name}} </label> <br>--}}
{{--                                @foreach($service->children as $child)--}}
{{--                                    ---<input type="radio" value="{{$child->id}}" name="service_id"> {{$child->name}} <br>--}}
{{--                                @endforeach--}}
{{--                            @endforeach--}}
{{--                                    <button type="button">Pasirinkti paslaugą</button>--}}
                        <form id="serviceForm">
                            @csrf
                            <label for="services">Pasirinkite paslaugą:</label> <br>
                                <select name="chooseService" id="chooseService" >
                                @foreach($services as $service)
                                    <optgroup label="{{$service->name}}">
                                        @foreach($service->children as $child)
                                            <option id="service" value="{{$child->id}}">{{$child->name}}</option>
                                      @endforeach
                                    </optgroup>
                                @endforeach
                                </select>
                        </form>
                        <form id="artistForm">
                            @csrf
                            <select name="chooseArtist" id="chooseArtist"></select>
                        </form>

                    <form id="dateForm">
                        @csrf
                        <input id="datepickerSchedule" type="text" name="datepickerSchedule">

                        <script src="{{asset('js/datetimepicker.js')}}"></script>
                    </form>

                    {{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">Rezervuoti</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
