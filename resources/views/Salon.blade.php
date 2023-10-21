@extends('layouts.main')

@section('content')
    <?php $massId = 0; ?>

    <section class="mb-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-md-0 mb-5">
                    <div class="headertext mb-0">{{$Salon->name}}</div>
                    <label class="text-muted text-center d-block mb-5">{{$Salon->motto}}</label>
                    @if($Salon->photo != '')
                        <img class="posterImgsalon" src="../../storage/{{$Salon->photo}}" alt="სალონის ფოტო">
                    @else
                        <img class="posterImgsalon" alt="სალონის ფოტო" src="{{asset('img/barberdefault.jpg')}}">
                    @endif
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65"
                                     fill="gold" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                </svg>

                                <label class="Salonrating">{{$Stats['Sul']}}</label>
                            </div>
                        </div>

                        <div class="">
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
                    </div><!-- /.SWorkDays -->
                </div>
            </div>
        </div>
    </section>

    <section class="space">
        <div class="container">
            <h2>ჩვენი პერსონალი</h2>
            <p class="text-muted">დაჯავშნე ვიზიტი სპეციალისტთან და მიიღე მაღალი ხარისხის მომსახურება.</p>
            <div class="row violetBoldFrame pt-5">
                <div class="salonStaffs col-12 mb-3 d-flex flex-wrap justify-content-around">
                    @foreach($Staffs as $staff)
                        <div class="col-md-2 mb-5">
                            <div class="team-member-card col-12">
                                @if($staff->photo != '')
                                    <img class="team-member-avatar mb-1" alt="პერსონალის ფოტო"
                                         src="../../storage/{{$staff->photo}}">
                                @else
                                    <img class="team-member-avatar mb-1" alt="პერსონალის ფოტო"
                                         src="{{asset('img/barberdefault.jpg')}}">
                                @endif

                                <div class="SalonRatingDiv">
                                    @if($staff->rating == 0)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        @if ($staff->rating > 0 && $staff->rating <= 0.5)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @if ($staff->rating > 0.5)
                                            <i class="fa-solid fa-star"></i>

                                        @endif
                                    @endif

                                    @if($staff->rating < 1)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        @if ($staff->rating >= 1 && $staff->rating <= 1.5)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @if ($staff->rating > 1.5)
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    @endif

                                    @if($staff->rating < 2)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        @if ($staff->rating >= 2 && $staff->rating <= 2.5)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @if ($staff->rating > 2.5)
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    @endif

                                    @if($staff->rating < 3)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        @if ($staff->rating >= 3 && $staff->rating <= 3.5)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @if ($staff->rating > 3.5)
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    @endif

                                    @if($staff->rating < 4)
                                        <i class="fa-regular fa-star"></i>
                                    @else
                                        @if ($staff->rating >= 4 && $staff->rating <= 4.5)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @if ($staff->rating > 4.5)
                                            <i class="fa-solid fa-star"></i>
                                        @endif
                                    @endif

                                </div>
                                <h6 class="mb-0" style="font-size: 90%">{{$staff->firstname}}</h6>
                                <h6 class="mb-0" style="font-size: 90%">{{$staff->lastname}}</h6>
                                <div class="" style="height: 40px">
                                    <p class="team-member-designation">{{$staff->role}}</p>
                                </div>
                                @if($staff->dayoff == 'working')
                                    <div class="booksyDiv">
                                        <form action="{{route('SalonStaff', [$staff->id, $massId])}}" method="get">
                                            <button class="booksyBtn" type="submit">დაჯავშნე</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="booksyDiv2">
                                        <form action="{{route('SalonStaff', [$staff->id, $massId])}}" method="get">
                                            <button class="booksyBtn2" type="submit">არ მუშაობს</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--                <div class="paginBtns">--}}
                {{--                    <label class="">{{ $Staffs->appends([])->links() }}</label>--}}
                {{--                </div>--}}
            </div>
        </div>
    </section>


    <section class="space">
        <div class="container">
            <h2>ფოტო გალერეა</h2>
            <p class="text-muted">სალონის ფოტო გალერეა.</p>
            <div class="BarberFlipster">
                <div class="carousel">
                    <ul>
                        @for($z=1; $z<6; $z++)
                            <?php
                            $Photo = 'flipphoto' . $z;
                            ?>
                            <li>
                                @if($Salon->$Photo != '')
                                    <a class="" href="../../storage/{{$Salon->$Photo}}" target="_blank">
                                        <img class="BarberFlipster" alt="სალონის ფოტო №{{$z}}"
                                             src="../../storage/{{$Salon->$Photo}}">
                                    </a>
                                @else
                                    <img class="barberworksimg" alt="სალონის ფოტო №{{$z}}"
                                         src="{{asset('img/hsnp.jpg')}}">
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
            <h2>გვესტუმრეთ</h2>
            <p class="text-muted mb-5">ჩვენთან მიიღებთ მაღალი ხარისხის მომსახურებას.</p>
            <div class="row mt-5">
                <div class="col-md-8 mb-5 mb-md-0">
                    <div class="" id="map">
                        @if (($Salon->latitude == '') || ($Salon->longitude == ''))
                            <img src="{{asset('img/googlemap.png')}}" alt="რუქა" class="salonMap">
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="lightVioletFrame">
                        <div class="btn-group workdaysHeader">
                            <h6>დაგვიკავშირდით: </h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                 class="bi bi-phone-vibrate-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4 4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4zm5 7a1 1 0 1 0-2 0 1 1 0 0 0 2 0zM1.807 4.734a.5.5 0 1 0-.884-.468A7.967 7.967 0 0 0 0 8c0 1.347.334 2.618.923 3.734a.5.5 0 1 0 .884-.468A6.967 6.967 0 0 1 1 8c0-1.18.292-2.292.807-3.266zm13.27-.468a.5.5 0 0 0-.884.468C14.708 5.708 15 6.819 15 8c0 1.18-.292 2.292-.807 3.266a.5.5 0 0 0 .884.468A7.967 7.967 0 0 0 16 8a7.967 7.967 0 0 0-.923-3.734zM3.34 6.182a.5.5 0 1 0-.93-.364A5.986 5.986 0 0 0 2 8c0 .769.145 1.505.41 2.182a.5.5 0 1 0 .93-.364A4.986 4.986 0 0 1 3 8c0-.642.12-1.255.34-1.818zm10.25-.364a.5.5 0 0 0-.93.364c.22.563.34 1.176.34 1.818 0 .642-.12 1.255-.34 1.818a.5.5 0 0 0 .93.364C13.856 9.505 14 8.769 14 8c0-.769-.145-1.505-.41-2.182z"/>
                            </svg>
                        </div>
                        <p class="">{{$Salon->phone}}</p>
                    </div>
                    <div class="lightVioletFrame">
                        <div class="btn-group workdaysHeader">
                            <h6>მისამართი:</h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                 class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </div>
                        <p>ქალაქი: {{$Salon->location}}</p>
                        <p class="">{{$Salon->address}}</p>
                    </div>
                    <div class="lightVioletFrame">
                        <div class="btn-group workdaysHeader">
                            <h6>სამუშაო დღეები:</h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                 class="bi bi-calendar-week" viewBox="0 0 16 16">
                                <path
                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                        {!! $Salon->work_d !!}
                    </div>
                    <div class="lightVioletFrame">
                        <div class="btn-group workdaysHeader">
                            <h6>სამუშაო საათები:</h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
                                 class="bi bi-watch" viewBox="0 0 16 16">
                                <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V5z"/>
                                <path
                                    d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A5.985 5.985 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a5.99 5.99 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A5.99 5.99 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667H5.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0z"/>
                            </svg>
                        </div>
                        <div class="col-lg-12 Start">
                            <p class="">დაწყება: {{$Salon->work_sh}} სთ.</p>
                        </div>

                        <div class="col-lg-12 Finish">
                            <p class="">დასრულება: {{$Salon->work_fh}} სთ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="space">
        <div class="container">
            <h2>კომენტარები</h2>
            <p class="text-muted mb-5">შეაფასე სალონი და დატოვე კომენტარი</p>
            @if(Auth::user())
                @if($Salon['id'] != Auth::user()->sal_id && $Salon['user_id'] != Auth::user()->id)
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
                                                  action="{{route('Salfeedbacks.delete', $checks->id)}}">
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
{{--                        კომენტარის დასატოვები ფორმა.--}}
                        <form action="{{route('Salfeedbacksadd', $Salon->id)}}" method="post">
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
                                            <textarea class=" tiny form-control mb-1" name="feedback" id="feedback"
                                                      cols=""
                                                      rows="3"
                                                      placeholder="">{{ old('feedback') }}</textarea>
                                    <input value="{{Auth::user()->id}}" name="user_id" id="user_id" hidden>
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

                @else

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
                                <div class="" style="height: 5em; overflow-y: scroll">
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















    <script>
        let map;

        function initMap() {
            var pos = {lat: {{$Salon->latitude}}, lng: {{$Salon->longitude}} };
            var opt = {
                center: pos,
                zoom: 14,
            };
            var myMap = new google.maps.Map(document.getElementById("map"), opt);
            var marker = new google.maps.Marker({
                position: pos,
                map: myMap,
                title: "{{$Salon->name}}",
                // icon: '',
            });
            var info = new google.maps.InfoWindow({
                content: '<h3>{{$Salon->name}}</h3>'
            });
            marker.addListener("click", function () {
                info.open(myMap, marker);
            });
        }

        window.initMap = initMap;
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVdkMPL-Jni-AN60M-aZEzzV3H-yzqJbs&callback=initMap&v=weekly"
        defer
    ></script>
@endsection
