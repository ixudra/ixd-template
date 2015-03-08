$(document).ready(function() {

    $('.datePicker').datetimepicker({
        pickDate: true,
        pickTime: false,
        language: 'en'
    });

    $('.timePicker').datetimepicker({
        pickDate: false,
        pickTime: true,
        pick12HourFormat: true,
        useMinutes: true,
        useSeconds: false,
        minuteStepping: 1,
        language: 'nl'
    });

    $(".rest").restfulizer();

});