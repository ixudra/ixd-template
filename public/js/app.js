$(document).ready(function() {

    $('.datePicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('.timePicker').datetimepicker({
        useMinutes: true,
        useSeconds: false,
        minuteStepping: 1,
        language: 'nl'
    });

    $(".rest").restfulizer();

});