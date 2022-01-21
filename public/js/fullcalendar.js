function getCalendarData(type) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: get_calendar_data,
        type:'post',
        data: {
            type : type
        },
        success: function (response) {
            if(response.status){
                let data = response.data
                console.log(data);
                drawCalendar(data)
            }
            else{

            }
        },
        error: function () {

        }
    })
}
function drawCalendar(data) {
    calendars.clndr1 = $('.cal1').clndr({
        events: data,
        clickEvents: {
            click: function (target) {
                console.log('Cal-1 clicked: ', target);
            },
            today: function () {
                console.log('Cal-1 today');
            },
            nextMonth: function () {
                console.log('Cal-1 next month');
            },
            previousMonth: function () {
                console.log('Cal-1 previous month');
            },
            onMonthChange: function () {
                console.log('Cal-1 month changed');
            },
            nextYear: function () {
                console.log('Cal-1 next year');
            },
            previousYear: function () {
                console.log('Cal-1 previous year');
            },
            onYearChange: function () {
                console.log('Cal-1 year changed');
            },
            nextInterval: function () {
                console.log('Cal-1 next interval');
            },
            previousInterval: function () {
                console.log('Cal-1 previous interval');
            },
            onIntervalChange: function () {
                console.log('Cal-1 interval changed');
            }
        },
        multiDayEvents: {
            singleDay: 'date',
            endDate: 'endDate',
            startDate: 'startDate'
        },
        showAdjacentMonths: true,
        adjacentDaysChangeMonth: false
    });

}
