<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RSC | Member</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url() . 'theme/images/logo/favicon.ico' ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- AdminLTE css -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/dist/css/adminlte.min.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/fullcalendar/main.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/fullcalendar-daygrid/main.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/fullcalendar-timegrid/main.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/fullcalendar-bootstrap/main.min.css' ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/summernote/summernote-bs4.css' ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/member/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
    <!-- pop up konfirmasi pesanan -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        .color {
            background-color: #fff;
            margin-top: -20px;
        }

        .metode {

            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        h2 {
            font-family: 'Times New Roman', Times, serif;
        }

        .btn {
            border: 1px solid #fff;
        }
    </style>
    <title><?= $title ?></title>
</head>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() . 'theme/member/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() . 'theme/member/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'theme/member/dist/js/adminlte.js' ?>"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url() . 'theme/member/dist/js/demo.js' ?>"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url() . 'theme/member/plugins/jquery-mousewheel/jquery.mousewheel.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/raphael/raphael.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/jquery-mapael/jquery.mapael.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/jquery-mapael/maps/usa_states.min.js' ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() . 'theme/member/plugins/chart.js/Chart.min.js' ?>"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url() . 'theme/member/dist/js/pages/dashboard2.js' ?>"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url() . 'theme/member/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url() . 'theme/member/plugins/moment/moment.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/fullcalendar/main.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/fullcalendar-daygrid/main.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/fullcalendar-timegrid/main.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/fullcalendar-interaction/main.min.js' ?>"></script>
<script src="<?php echo base_url() . 'theme/member/plugins/fullcalendar-bootstrap/main.min.js' ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url() . 'theme/member/plugins/summernote/summernote-bs4.min.js' ?>"></script>
<!-- sweet alert -->
<script src="<?php echo base_url() . 'assets/sweetalert/sweetalert2.all.min.js' ?>"></script>
<!-- Page Script -->
<script>
    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script>
<!-- Page specific script -->
<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                console.log(eventEl);
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            'themeSystem': 'bootstrap',
            //Random default events
            events: [{
                    title: 'All Day Event',
                    start: new Date(y, m, 1),
                    backgroundColor: '#f56954', //red
                    borderColor: '#f56954', //red
                    allDay: true
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2),
                    backgroundColor: '#f39c12', //yellow
                    borderColor: '#f39c12' //yellow
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false,
                    backgroundColor: '#0073b7', //Blue
                    borderColor: '#0073b7' //Blue
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false,
                    backgroundColor: '#00c0ef', //Info (aqua)
                    borderColor: '#00c0ef' //Info (aqua)
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    backgroundColor: '#00a65a', //Success (green)
                    borderColor: '#00a65a' //Success (green)
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/',
                    backgroundColor: '#3c8dbc', //Primary (light-blue)
                    borderColor: '#3c8dbc' //Primary (light-blue)
                }
            ],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            //Save color
            currColor = $(this).css('color')
            //Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            //Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            //Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.html(val)
            $('#external-events').prepend(event)

            //Add draggable funtionality
            ini_events(event)

            //Remove event from text input
            $('#new-event').val('')
        })
    })
</script>
<!-- pop up pembayaran -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>