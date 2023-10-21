@extends('layouts.main')

@section('content')
    <section class="py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5 mb-md-0">
                    <div class="staffPosterDiv">
                        @if($barber->photo != '')
                            <img class="posterImg" src="../../storage/{{$barber->photo}}" alt="პერსონალის ფოტო">
                        @else
                            <img class="posterImg" src="{{asset('img/barberdefault.jpg')}}" alt="პერსონალის ფოტო">
                        @endif
                        <div class="staffData">
                            <h3 class="fw-bold">{{$barber->firstname}} {{$barber->lastname}}</h3>
                            <label class="">სპეციალობა: {{ $barber->role }}</label>
                            <form method="get" action="{{route('Salon', $salon['id'])}}" class="d-flex"
                                  role="search">
                                <button class="btn btn-outline-primary font-weight-normal"
                                        type="submit">სალონი: {{$salon['name']}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="WorkDays pt-0">
                        <label class="headertext">რეიტინგი:</label>
                        <div class="GoldenFrames">
                            <div class="salonGstar">
                                <img src="{{asset('img/goldenstar.png')}}" alt="" class="Gstar">
                                <label class="Salonrating">{{$Stats['Rating']}}</label>
                            </div>
                            <div class="salonGstar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55"
                                     fill="gold" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                </svg>
                                <br>
                                <label class="Salonrating">{{$Stats['Sul']}}</label>
                            </div>
                        </div>
                        <div class="skills">
                            @for($i=1; $i<=5; $i++ )
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            <div class="progress-bar">
                                <div class="five" style="width: {{$Stats['PercentFive']}}%"><span>{{$Stats['PercentFive']}}%</span>
                                </div>
                            </div>
                            @for($i=1; $i<=4; $i++ )
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            <div class="progress-bar">
                                <div class="four" style="width: {{$Stats['PercentFour']}}%"><span>{{$Stats['PercentFour']}}%</span>
                                </div>
                            </div>
                            @for($i=1; $i<=3; $i++ )
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            <div class="progress-bar">
                                <div class="three" style="width: {{$Stats['PercentThree']}}%"><span>{{$Stats['PercentThree']}}%</span>
                                </div>
                            </div>
                            @for($i=1; $i<=2; $i++ )
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            <div class="progress-bar">
                                <div class="two" style="width: {{$Stats['PercentTwo']}}%"><span>{{$Stats['PercentTwo']}}%</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-star"></i>
                            <div class="progress-bar">
                                <div class="one" style="width: {{$Stats['PercentOne']}}%"><span>{{$Stats['PercentOne']}}%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @if(Auth()->user())
        @if($barber->dayoff != 'dayoff')
            <section class="mb-3">
                <div class="container">
                    <div class="card-header">
                        <h4 class="GeoArtText">აირჩიეთ მომსახურება შემდეგ
                            ვიზიტის დრო.</h4>
                    </div>
                    <div class="" style="min-height: 5em">
                        @if($massId == 1 || $massId == 2)
                            <div class="alert-danger p-2">
                                <ul>
                                    <li>{{$mass}}</li>
                                </ul>
                            </div>
                        @endif
                        @if($massId == 3)
                            <div class="alert-success p-2">
                                <ul>
                                    <li>{{$mass}} <a class="" href="{{route('Reservations')}}"> იხილეთ თქვენი
                                            ჯავშნები</a></li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <script>
                        $('.alert-danger').hide(40000);
                        $('.alert-success').hide(40000);
                    </script>

                    <div class="abilities col-md-12">
                        <table class="">
                            <tr>
                                <th></th>
                                <th>მომსახურება</th>
                                <th style="width: 70px">
                                    <label class="">ფასი. ₾</label>
                                </th>
                                <th style="width: 130px;">
                                    <label class="" style="">ხანგრძლივობა.</label>
                                </th>
                            </tr>
                            @foreach($abilities as $ability)
                                <tr>
                                    <td class="check">
                                        <input class=""
                                               type="checkbox"
                                               id="customCheckbox{{$N}}" name="{{$N}}"
                                               value="{{ $ability->service }}"
                                               onclick="isChecked()">
                                    </td>
                                    <td class="service">
                                        <input class="form-control"
                                               for="customCheckbox{{$N}}"
                                               id="chck{{$N}}" name="chck{{$N}}"
                                               value="{{ $ability->service }}" disabled>
                                    </td>
                                    <td class="price">
                                        <div class="btn-group">
                                            <input class="" id="price{{$N}}"
                                                   name="price{{$N}}"
                                                   value="{{ $ability->price }}"
                                                   disabled>
                                        </div>
                                    </td>
                                    <td class="time">
                                        <input class="" id="procH{{$N}}"
                                               name="procH{{$N}}"
                                               value="{{ $ability->hour }}"
                                               style="text-align: center"
                                               disabled>
                                        <label class=""> : </label>
                                        <input class="" id="procM{{$N}}"
                                               name="procM{{$N}}"
                                               value="{{ $ability->minute }}"
                                               disabled>
                                    </td>
                                </tr>
                                <script>
                                    var servTh{{$N}} = '{{ $ability->hour }}';
                                    var servTm{{$N}} = '{{ $ability->minute }}';
                                </script>
                                <label class="" hidden>{{ $N++ }}</label>

                            @endforeach
                        </table>
                    </div>
                </div>
            </section>


            <section class="space">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mb-5 mb-md-0">
                            <div id="calendar">
                                <button class="hiddenBtn" hidden>-</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2 class="section-title"></h2>
                            <p class=""></p>
                            <form action="{{ route('Booksy.Create', $barber->id) }}"
                                  method="post">
                                @csrf
                                <div class="booksyForm">
                                    <h4 class="text-center">თქვენი ჯავშანი</h4>
                                    <br>
                                    {{-- Hidden Inputs --}}
                                    <input class="" id="start" name="start" value="" hidden>
                                    <input class="" id="end" name="end" value="" hidden>
                                    <input class="" id="start_ms" name="start_ms"
                                           value="" hidden>
                                    <input class="" id="dur_ms" name="dur_ms" value="" hidden>
                                    <input class="" id="kvirisDghe" name="kvirisDghe" value="" hidden>
                                    {{-- End Hidden Inputs --}}

                                    <label class="">თარიღი:</label>
                                    <input class="form-control" id="startdate"
                                           name="startdate" value="" hidden>
                                    <input class="form-control" id="startdatee"
                                           name="startdatee" value="" disabled>

                                    <label class="">საათი:</label>
                                    <input class="form-control" id="starthour"
                                           name="starthour" value="" hidden>
                                    <input class="form-control" id="starthourr"
                                           name="starthourr" value="" disabled>

                                    <label class="">მომსახურება:</label>
                                    <textarea class="form-control" id="service"
                                              name="service" disabled></textarea>

                                    <label class="">ხანგრძლივობა:</label>
                                    <input class="form-control" id="allProcT"
                                           name="allProcT" value="" disabled>

                                    <label class="">სულ ფასი:</label>
                                    <input class="form-control" id="allprice"
                                           name="allprice" value="" disabled>

                                    <div class="col-md-6 mx-auto text-center mt-3">
                                        @if(Auth::user())

                                            <button class="btn btn-primary"
                                                    onclick="confirm('დავჯავშნო?')" type="submit"
                                                    id="booksyBtn" disabled>დაჯავშნე
                                            </button>
                                        @else
                                            <label class="authRequest">დაჯავშნისთვის გაიარეთ
                                                ავტორიზაცია.</label>
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <div id="external-events">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <section>
                <div class="container py-5 mb-5">
                    <div class="card-header">
                        <h4 class="GeoArtText">სპეციალისტი არ მუშაობს.</h4>
                    </div>
                    <img class="posterImg" src="{{asset('img/vakation.jpg')}}">
                </div>
            </section>
        @endif
    @else
        <section>
            <div class="container py-5 mb-5">
                <div class="alert alert-warning">
                    <ul>
                        <li>
                            <label class="ifo">ვიზიტის დაჯავშნისთვის გაიარეთ </label>
                            <a class="" href="{{route('MainLogin', 'j')}}">ავტორიზაცია</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    @endif

    <section class="space">
        <div class="container">
            <h2>ფოტო გალერეა</h2>
            <p class="text-muted">ჩემი შექმნილი სტილები.</p>

            <div class="BarberFlipster">
                <div class="carousel">
                    <ul>
                        @for($z=1; $z<6; $z++)
                            <?php
                            $Photo = 'flipphoto' . $z;
                            ?>
                            <li>
                                @if($barber->$Photo != '')
                                    <a class="" href="../../storage/{{$barber->$Photo}}" target="_blank">
                                        <img class="BarberFlipster" alt="ფოტო №1"
                                             src="../../storage/{{$barber->$Photo}}">
                                    </a>
                                @else
                                    <img class="barberworksimg" alt="ფოტო №{{$z}}" src="{{asset('img/hsnp.jpg')}}">
                                @endif
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <script>
                $('.carousel').flipster({
                    style: 'carousel',
                    spacing: -0.3,
                });
            </script>
        </div>
    </section>


    <section class="space">
        <div class="container">
            @if(Auth::user())
                <h2>კომენტარები</h2>
                <p class="text-muted mb-5">შეაფასე სტილისტი და დატოვე კომენტარი</p>
                @if(isset($check['0']))
                    @foreach($check as $checks)
                        <div class="col-md-6 mx-auto text-center">
                            <label class="text-muted">ჩემი შეფასება</label>
                        </div>
                        <div class="row" style="display: flex; justify-content: center">
                            <div class="col-md-4 foi-review" style="padding: 10px">
                                <div class="lightVioletFrame">
                                    <div class="foi-rating"
                                         style="display: flex; justify-content: space-between; align-items: center">
                                        <div class="">
                                            @for($i=1; $i<=$checks->star; $i++ )
                                                <i class="fas fa-star checked"></i>
                                            @endfor
                                        </div>
                                        <form method="post"
                                              action="{{route('BarberFeedback.delete', $checks->id)}}">
                                            @csrf
                                            <button id="myBtn" class="btn btn-default"
                                                    onclick="return confirm('ნამდვილად გნებავს წაშლა?')"
                                                    title="წაშლა">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                     height="20"
                                                     fill="red"
                                                     class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="" style="height: 5em; overflow-y: scroll">
                                        {!! $checks->feedback !!}
                                    </div>
                                    <div class="media foi-review-user p-1">
                                        @if(Auth::user()->photo != '')
                                            <img class="avatar" src="../../storage/{{Auth::user()->photo}}">
                                        @else
                                            <img class="avatar" src="{{asset('img/DefaultAvatar.png')}}">
                                        @endif
                                        <div class="media-body">
                                            <h6 class="mb-0">{{$checks->username}}</h6>
                                            <p>{{$checks->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else

                    @if(Auth::user()->id == $barber->id)

                    @else
                        @if(Auth::user()->sal_id != $barber->sal_id)
                            <form action="{{route('Feedbackadd', $barber->id)}}" method="post">
                                @csrf
                                <div class="rating col-md-6 mx-auto">
                                    <input type="radio" name="star" id="star1" value="5"><label
                                        for="star1"></label>
                                    <input type="radio" name="star" id="star2" value="4"><label
                                        for="star2"></label>
                                    <input type="radio" name="star" id="star3" value="3"><label
                                        for="star3"></label>
                                    <input type="radio" name="star" id="star4" value="2"><label
                                        for="star4"></label>
                                    <input type="radio" name="star" id="star5" value="1"><label
                                        for="star5"></label>
                                </div>
                                <div class="FeedbackCreate col-md-6 mx-auto">
                                    <div class="FeedbackText">
                                            <textarea class="tiny form-control mb-1" name="feedback" id="feedback"
                                                      cols=""
                                                      rows="3"
                                                      placeholder="">{{ old('feedback') }}</textarea>
                                        <input value="{{Auth::user()->id}}" name="user_id" id="user_id"
                                               hidden>
                                    </div>
                                    <button class="btn btn-outline-primary" type="submit">გაგზავნა</button>
                                    @if($errors->any())
                                        <div class="alert alert-danger" style="font-size: 80%">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        @endif
                    @endif
                @endif
            @else
                <div class="alert alert-warning">
                    <ul>
                        <li>
                            <label class="ifo">შეფასების და კომენტარის დასატოვებლად გაიარეთ </label>
                            <a class="" href="{{route('MainLogin', 'j')}}">ავტორიზაცია</a>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="container">
                <div class="row" style="display: flex; justify-content: center">
                    @foreach($feedbacks as $feedback)
                        <?php $avatar = \App\Models\User::find($feedback->user_id); ?>
                        <div class="col-md-4 foi-review" style="padding: 10px">
                            <div class="lightVioletFrame">
                                <div class="foi-rating">
                                    @for($i=1; $i<=$feedback->star; $i++ )
                                        <i class="fas fa-star checked"></i>
                                    @endfor
                                </div>
                                <div class="" style="height: 5em; overflow-y: scroll;">
                                    {!! $feedback->feedback !!}
                                </div>
                                <div class="media foi-review-user p-1">
                                    @if(isset($avatar->photo) && $avatar->photo != '')
                                        <img class="avatar" src="../../storage/{{$avatar->photo}}">
                                    @else
                                        <img class="avatar" src="{{asset('img/DefaultAvatar.png')}}">
                                    @endif
                                    <div class="media-body">
                                        <h6 class="mb-0">{{$feedback->username}}</h6>
                                        <p>{{$feedback->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="PaginBtn mt-3 d-flex justify-content-center">
                    <label
                        class="">{{ $feedbacks->appends([])->links() }}</label>
                </div>
            </div>
        </div>
    </section>





    <script>var eventz = [];</script>
    @foreach($events as $event)
        <script>
            eventz.push({
                title: '{{$event->title}}',
                start: '{{$event->start}}',
                end: '{{$event->end}}',
                allDay: false
            });
        </script>
    @endforeach
    <script>
        var checkboxes = [];
        for (var x = 1; x <= 15; x++) {
            checkboxes[x] = document.getElementById('customCheckbox' + x);
        }
        var checks = [];
        for (var j = 1; j <= 15; j++) {
            checks[j] = document.getElementById('chck' + j);
        }
        var prices = [];
        for (var p = 1; p <= 15; p++) {
            prices[p] = document.getElementById('price' + p);
        }
        var procHs = [];
        for (var h = 1; h <= 15; h++) {
            procHs[h] = document.getElementById('procH' + h);
        }
        var procMs = [];
        for (var m = 1; m <= 15; m++) {
            procMs[m] = document.getElementById('procM' + m);
        }
        var allProcT = document.getElementById('allProcT');
        var service = document.getElementById('service');
        var allPrice = document.getElementById('allprice');
        var dur_ms = document.getElementById('dur_ms');
        $('#calendar').slideToggle(1000);

        function isChecked() {
            const results = [];
            for (let i = 1; i <= 15; i++) {
                if (checkboxes[i] && checkboxes[i].checked) {
                    const checkx = checks[i].value;
                    const pricex = Number(prices[i].value);
                    const timex = (procHs[i].value * 60 * 60 * 1000) + (procMs[i].value * 60 * 1000);
                    results.push(`${checkx}.\r`);
                    results.push(Number(pricex));
                    results.push(Number(timex));
                } else {
                    results.push('');
                    results.push(Number(0));
                    results.push(Number(0));
                }
            }
            service.innerHTML = results[0] + results[3] + results[6] + results[9] + results[12] + results[15] + results[18] + results[21] + results[24] + results[27] + results[30] + results[33] + results[36] + results[39] + results[42];
            allPriceValue = results[1] + results[4] + results[7] + results[10] + results[13] + results[16] + results[19] + results[22] + results[25] + results[28] + results[31] + results[34] + results[37] + results[40] + results[43];
            allProcTime = results[2] + results[5] + results[8] + results[11] + results[14] + results[17] + results[20] + results[23] + results[26] + results[29] + results[32] + results[35] + results[38] + results[41] + results[44];
            procHour = Math.floor((allProcTime / (1000 * 60)) / 60);
            procMinute = (allProcTime / (1000 * 60)) % 60;
            allPrice.setAttribute('value', allPriceValue + ' ლარი');
            allProcT.setAttribute('value', procHour + ' საათი : ' + procMinute + ' წუთი');
            dur_ms.setAttribute('value', allProcTime);

            var control = document.getElementById('dur_ms');
            var control2 = document.getElementById('start');
            if (control.value !== '' && $('.hiddenBtn').text() === '-') {
                $('#calendar').slideToggle(1000);
                $('.hiddenBtn').text('+');
            }
            ;
            if (control.value === 0 || control2.value !== '') {
                document.getElementById("booksyBtn").disabled = true;
            }
            if (control.value != 0 && control2.value != '') {
                document.getElementById("booksyBtn").disabled = false;
            }
        }


        $(function () {


            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
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
                        revertDuration: 0  //  original position after the drag
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
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            var startdate = document.getElementById('startdate');
            var starthour = document.getElementById('starthour');
            var startdatee = document.getElementById('startdatee');
            var starthourr = document.getElementById('starthourr');
            var start = document.getElementById('start');
            var end = document.getElementById('end');
            var start_ms = document.getElementById('start_ms');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function (eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {

                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek'
                    // right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                themeSystem: 'bootstrap',
                //Random default events

                dateClick: function (info) {//1

                    if (info.date.toLocaleTimeString('ru-Ru') === '00:00:00') {
                        alert('დააწკაპუნეთ ღილაკზე და აირჩიეთ "ვიზიტის დრო".');
                    } else {//2
                        //მიმდინარე დრო. ms
                        // alert(new Date().getTime());
                        //დაჯავშნული დრო. ms
                        // alert(info.date.getTime())
                        if (info.date.getTime() > new Date().getTime()) {//3
                            startdate.setAttribute('value', info.date.toLocaleDateString('ru-Ru'));
                            starthour.setAttribute('value', info.date.toLocaleTimeString('ru-Ru'));

                            startdatee.setAttribute('value', '');
                            starthourr.setAttribute('value', '');
                            start.setAttribute('value', '');
                            end.setAttribute('value', '');
                            start_ms.setAttribute('value', '');
                            document.getElementById("booksyBtn").disabled = true;


                            let mexute = '{{$salon['work_fh']}}' + ':' + '00';


                            //შეზღუდვა: სალონის სამუშაოს დაწყების დროზე ადრე არ დაჯავშნოს.
                            if (info.date.toLocaleTimeString('ru-Ru') < '{{0 . $salon['work_sh'] . ":" . 0 . 0 . ":" . 0 . 0}}') {
                                alert('სალონი მუშაობას იწყებს {{$salon['work_sh']}} - საათზე!');
                            } else {//4
                                var maxTime = new Date(info.date.getTime() + allProcTime);
                                var limitTime = maxTime.getHours() + ':' + maxTime.getMinutes();
                                var kvirisDghe = document.getElementById('kvirisDghe');
                                kvirisDghe.setAttribute('value', maxTime.getDay());

                                //შეზღუდვა: დამთავრების დროს მერე ან თუ მეტი დრო ჩირდება მომსახურებას არ დაიჯავშნოს.
                                if (limitTime < mexute) {//5
                                    // alert(maxTime.getDay());
                                    startdatee.setAttribute('value', info.date.toLocaleDateString('ru-Ru'));
                                    starthourr.setAttribute('value', info.date.toLocaleTimeString('ru-Ru'));
                                    start.setAttribute('value', info.dateStr);
                                    var tst = new Date(info.dateStr);
                                    tst.setSeconds(tst.getSeconds() + (allProcTime / 1000));
                                    end.setAttribute('value', tst.toISOString());
                                    start_ms.setAttribute('value', info.date.getTime());
                                    // var dur = document.getElementById('dur_ms');

                                    if (start.value !== '') {//6
                                        document.getElementById("booksyBtn").disabled = false;
                                    }//6

                                } else {
                                    alert('სალონი მუშაობას ამთავრებს  {{$salon['work_fh']}} - საათზე! აირჩიეთ ვიზიტისთვის სხვა დრო.');
                                    // alert(maxTime.getDay());

                                }//5

                            }//4
                        } else {
                            alert('წარსულში ვიზიტს ვერ დაჯავშნი!');
                        }//3
                    }//2
                },//1

                events: eventz,
                // events: [
                //     {
                //         title          : 'Lunch',
                //         start          : new Date(y, m, d, 12, 0),
                //         end            : new Date(y, m, d, 14, 0),
                //         allDay         : false,
                //         backgroundColor: '#00c0ef', //Info (aqua)
                //         borderColor    : '#00c0ef' //Info (aqua)
                //     },
                // ],
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                drop: function (info) {
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
            // Color chooser button
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>

    <script>
        $('.carousel').flipster({
            style: 'carousel',
            spacing: -0.3,
        });
    </script>

@endsection
