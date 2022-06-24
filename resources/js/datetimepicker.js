import $ from 'jquery'

import 'jquery-datetimepicker'

$("#datetimepicker").datetimepicker({
    minDate : 0,
    minTime : '08:00',
    maxTime : '19:00',
    step : 15
});

$("#datetimepickerSchedule").datetimepicker({
    minDate : 0,
    minTime : '08:00',
    maxTime : '19:00',
    step : 15,
});
