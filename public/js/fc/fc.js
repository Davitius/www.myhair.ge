$(function () {

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            locale: 'ru',
            timeZone: 'local',
            // lang: 'ru',
            // dateClick: function() {
            //     // alert('მუშაიობს!');
            //     alert('Clicked on: ' + date.format());
            // },

            dateClick: function(info) {
                alert('თარიღი: ' + info.dateStr);

                // change the day's background color just for fun
                // info.dayEl.style.backgroundColor = 'red';
            },

            eventClick: function(info) {
                alert('ჯავშანი: ' + info.event.title);

                // change the border color just for fun
                info.el.style.borderColor = 'red';
            },

            events: [
                {
                    title: 'ხდომილება 1',
                    start: '2022-10-04'
                },
                {
                    title: 'ხდომილება 2',
                    start: '2022-10-14'
                },
                {
                    title: 'ხდომილება 3',
                    start: '2022-10-05',
                    color: '#1e2734',
                    textColor: 'navajowhite'
                },
            ],

        });
        calendar.render();

});

