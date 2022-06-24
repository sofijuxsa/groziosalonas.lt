@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('content')

    <script>
        $(document).ready(function(){
            $("service-btn").click(function(){
                // Get value from input element on the page
                var service_id = $("#service_id").val();

                $.ajax({
                    url: 'choosingArtist',
                    type: "POST",
                    data: {'service_id' : service_id},
                    success: function(data) { // What to do if we succeed
                        console.log(response);
                        $("#result").html(data);
                        alert(data.responseText);
                    },
                    error:function(error)
                    {
                        console.log(error);
                    }
                })
            });
        });
    </script>

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

                            <label for="services">Pasirinkite paslaugą:</label> <br>
                                <select id="service_id">
                                @foreach($services as $service)
                                    <optgroup label="{{$service->name}}">
                                        @foreach($service->children as $child)
                                            <option id="service_id" value="{{$child->id}}">{{$child->name}}</option>
                                      @endforeach
                                    </optgroup>
                                @endforeach
                                </select>
                            <button type="service-btn">Pasirinkti paslaugą</button>
                                <div id="result"></div>

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
