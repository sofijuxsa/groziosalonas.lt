import $ from 'jquery'
window.$ = window.jQuery = $;
import 'jquery-datetimepicker'

import {isDisabled} from "bootstrap/js/src/util";

$("#datetimepicker").datetimepicker({
    minDate : 0,
    minTime : '08:00',
    maxTime : '19:00',
    step : 15,
    format: 'Y-m-d',
    maxDate: '+1970-02-02',
});

$("#datetimepickerSchedule").datetimepicker({
    minDate : 0,
    maxDate: '+1970-02-02',
    minTime : '08:00',
    maxTime : '19:00',
    step : 15,
    format : 'Y-m-d h:m',
    disabledDates : ["2022-07-03","2022-07-05"],
});

$("#datetimepickerDisable").datetimepicker({
    minDate : 0,
    timepicker: false,
    format: 'Y-m-d'
});


