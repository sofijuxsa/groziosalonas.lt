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

@section('page-script')
    <script type ="text/javascript">
        $(document).ready( function () {

            var disabledDates = {};
            //SelectedDates[ new Date('05/28/2012' )] = new Date( '05/28/2012' );
            //SelectedDates[ new Date('05/29/2012' )] = new Date( '05/29/2012' );
            //SelectedDates[ new Date('05/30/2012' )] = new Date( '05/30/2012' );

            $.ajax({
                url: "{{ route('schedule.filter2') }}",
                data:{},
                method:'get',
                dataType: 'json',
                success:function(response) {

                    console.log(response);

                    $( '#datetimepickerDisable1' ).datetimepicker({
                        format: 'Y-m-d',
                        maxDate: '+1970-02-02',
                        minDate : 0,
                        timepicker: false,
                        disabledDates: response,
                    });

                    $( '#datetimepickerEnable' ).datetimepicker({
                        format: 'Y-m-d',
                        maxDate: '+1970-02-02',
                        minDate : 0,
                        timepicker: false,
                        allowDates: response,
                    });
                }});
        });
    </script>


@section('content')
    <body>
    <div class="container">
        <div class="card-body">
            <div class="col-md-8">
                <form id="disableDay" method="POST" action="{{ route ('schedule.disableDay')}}">
                    @csrf
                    <input id="datetimepickerDisable1" type="text" name="disableDay">
                    <script src="{{asset('js/datetimepicker.js')}}"></script>
                    <input type="submit" value="Deaktyvuoti dieną" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <form id="enableDay" method="POST" action="{{ route ('schedule.enableDay')}}">
                    @csrf
                    <input id="datetimepickerEnable" type="text" name="enableDay">
                    <script src="{{asset('js/datetimepicker.js')}}"></script>
                    <input type="submit" value="Aktyvuoti dieną" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    </body>
@endsection
