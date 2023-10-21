@extends('layouts.main')
@section('header')
    <div class="header-content mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb-3">www.myhair.ge</h1>
                <p class="text-dark">მარტივი გზა სილამაზისკენ</p>
                <a class="btn btn-primary mb-4" href="{{route('MainRegister', 'x')}}"> > > > </a>
            </div>
            <div class="col-md-6">
                <img src="{{asset('img/Logo.png')}}" alt="app" width="388px" class="img-fluid">
            </div>
        </div>
    </div>
@endsection

@section('content')

    {{-- ========== ქალაქის ასარჩევი ========== --}}
    <div class="container mt-5">
        <div class="city mx-auto">
            <select class="city" id="city" name="city" onchange="getSelectValue();">
                <option value="">აირჩიეთ ქალაქი.</option>
                @foreach($citys as $citi)
                    <option value="{{$citi->city}}">{{$citi->city}}</option>
                @endforeach
            </select>
        </div>
    </div><!-- /.container -->

    <section class="space">
        {{-- ========== სლაიდერი მენიუ ========== --}}
        <div class="container mb-5">
            <div class="SliderMenuDiv">
                <input type="radio" name="dot" id="one">
                <input type="radio" name="dot" id="two">
                <div class="main-card">
                    <div class="cards">
                        @for($m1 = 1; $m1 <= 6; $m1++)
                            <?php
                            if ($m1 == 1) {
                                $name1 = 'თმის შეჭრა, შეღებვა, ვარცხნილობა';
                                $src1 = asset('img/servicemenu/cuttinghair.jpg');
                            }
                            if ($m1 == 2) {
                                $name1 = 'წვერის გაპარსვა';
                                $src1 = asset('img/servicemenu/shave.jpg');
                            }
                            if ($m1 == 3) {
                                $name1 = 'მაკიაჟი';
                                $src1 = asset('img/servicemenu/makeup.jpg');
                            }
                            if ($m1 == 4) {
                                $name1 = 'მანიკური';
                                $src1 = asset('img/servicemenu/manicure.jpg');
                            }
                            if ($m1 == 5) {
                                $name1 = 'პედიკური';
                                $src1 = asset('img/servicemenu/pedicure.jpg');
                            }
                            if ($m1 == 6) {
                                $name1 = 'წარბები და წამწამები';
                                $src1 = asset('img/servicemenu/lashes_brows.jpg');
                            }
                            ?>
                            <div class="card">
                                <form method="get" action="{{route('menusearch')}}">
                                    <div class="content">
                                        <button class="contentBtn" type="submit">
                                            <div class="img">
                                                <img src="{{$src1}}" alt="{{$name1}}">
                                            </div>
                                        </button>
                                        <div class="details">
                                            <div class="name">{{$name1}}</div>
                                        </div>
                                        <input type="text" id="location{{$m1}}" name="location" hidden>
                                        <input type="text" id="MenuSearch" name="MenuSearch" value="{{$name1}}" hidden>
                                    </div>
                                </form>
                            </div>
                        @endfor
                    </div><!-- /.cards -->
                    <div class="cards">
                        @for($m2 = 7; $m2 <= 12; $m2++)
                            <?php
                            if ($m2 == 7) {
                                $name2 = 'ტატუირება';
                                $src2 = asset('img/servicemenu/tattooing.jpg');
                            }
                            if ($m2 == 8) {
                                $name2 = 'სპა';
                                $src2 = asset('img/servicemenu/spa.jpg');
                            }
                            if ($m2 == 9) {
                                $name2 = 'ეპილაცია';
                                $src2 = asset('img/servicemenu/epilation.jpg');
                            }
                            if ($m2 == 10) {
                                $name2 = 'კანის მოვლა';
                                $src2 = asset('img/servicemenu/skincare.jpg');
                            }
                            if ($m2 == 11) {
                                $name2 = 'სადღესასწაულო მაკიაჟი, ვარცხნილობა';
                                $src2 = asset('img/servicemenu/festivehairstyle.jpg');
                            }
                            if ($m2 == 12) {
                                $name2 = 'სოლარიუმი';
                                $src2 = asset('img/servicemenu/solarium.jpg');
                            }
                            ?>
                            <div class="card">
                                <form method="get" action="{{route('menusearch')}}">
                                    <div class="content">
                                        <button class="contentBtn" type="submit">
                                            <div class="img">
                                                <img src="{{$src2}}" alt="{{$name2}}">
                                            </div>
                                        </button>
                                        <div class="details">
                                            <div class="name">{{$name2}}</div>
                                        </div>
                                        <input type="text" id="location{{$m2}}" name="location" hidden>
                                        <input type="text" id="MenuSearch" name="MenuSearch" value="{{$name2}}" hidden>
                                    </div>
                                </form>
                            </div>
                        @endfor
                    </div><!-- /.cards -->
                </div><!-- /.min-card -->
                <div class="button" style="display: flex; justify-content: center; margin-top: 1em">
                    <label for="one" class=" active one"></label>
                    <label for="two" class="two"></label>
                </div>
            </div><!-- /.SliderMenuDiv -->
        </div><!-- /.container -->
    </section>


    {{-- ========== სვაიპერი "ჩვენ გირჩევთ" ========= --}}
    <section class="space">
        <div class="container">
            <h2>საუკეთესო სპეციალისტები</h2>
            <p class="text-muted mb-1">საუკეთესო სპეციალისტები</p>
            <div class="mainswiper">
                <div class="swiper mySwiper container">
                    <div class="swiper-wrapper content">
                        @foreach($BestUsers as $best)
                            <div class="swiper-slide card-swiper">
                                <div class="card-content">
                                    <div class="image">
                                        <?php $massId = 0; ?>
                                        @if($best->photo != '')
                                            <a class="" href="{{route('SalonStaff', [$best->id, $massId])}}"><img
                                                    class="Staffimg" alt="პერსონალის ფოტო"
                                                    src="../../storage/{{$best->photo}}"></a>
                                        @else
                                            <a class="" href="{{route('SalonStaff', [$best->id, $massId])}}">
                                                <img class="Staffimg" alt="პერსონალის ფოტო"
                                                     src="{{asset('img/barberdefault.jpg')}}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="media-icons">

                                    </div>
                                    <div class="name-profession">
                                        <span class="name">{{$best->firstname}} {{$best->lastname}}</span>
                                        <span class="profession">{{$best->role}}</span>
                                    </div>
                                    <div class="BestRating1">
                                        <div class="text-center mx-auto SalonRatingDiv">
                                            <?php $a = 0; $b = 0.7; ?>
                                            @for($s = 1; $s < 6; $s++)
                                                @if($best->rating <= $a)
                                                    <i class="fa-regular fa-star"></i>
                                                @else
                                                    @if ($best->rating > $a && $best->rating <= $b)
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                    @endif
                                                    @if ($best->rating > $b)
                                                        <i class="fa-solid fa-star"></i>
                                                    @endif
                                                @endif
                                                <?php $a += 1; $b += 1; ?>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        {{--        </div>--}}
    </section>


    {{--  საიტის შესახებ ინფო  --}}
    <section class="space">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    {{--                    <img src="{{asset('assets/images/app_2.png')}}" alt="special offers" class="img-fluid" width="492px">--}}
                    <img src="{{asset('assets/images/img_3.png')}}" alt="faq" class="img-fluid" width="424px">
                </div>
                <div class="col-md-6">
                    <h2 class="feature-faq-title">შესაძლებლობები</h2>

                    <div class="card feature-faq-card">
                        <div class="card-header bg-white" id="featureFaqOneTitle">
                            <a href="#featureFaqOneCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h5 class="mb-0">სალონი</h5> <i class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="featureFaqOneCollapse" class="collapse" aria-labelledby="featureFaqOneTitle">
                            <div class="card-body">
                                <p class="purpleText">შექმენი შენი სილამაზის სალონი, დაიმატე პერსონალი რომელთანაც
                                    მომხმარებელი შეძლებს ვიზიტისთვის თავისუფალი ადგილის დაჯავშნას.</p>
                                <p class="purpleText">
                                    თქვენ ან თქვენს მიერ დანიშნული მენეჯერი კი შეძლებს ჯავშნების კონტროლს და სტატისტიკის თვალის დევნებას.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card feature-faq-card">
                        <div class="card-header bg-white" id="featureFaqTwoTitle">
                            <a href="#featureFaqTwoCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h5 class="mb-0">პერსონალი</h5> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="featureFaqTwoCollapse" class="collapse" aria-labelledby="featureFaqTwoTitle">
                            <div class="card-body">
                                <p class="purpleText">გადაეცით თქვენი ათნიშნა პერსონალის კოდი დამსაქმებელს რომელიც
                                    შეძლებს თქვენს დამატებას სალონის პერსონალის სიაში.</p>
                                <p class="purpleText">შექმენი შენი მომსახურების პრეისკურანტი რომლითაც მომხამარებელი
                                    აირჩევს თავის სასურველ სერვის და დაჯავშნის თქვენთან ვიზიტს თავისუფალ დროს.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card feature-faq-card">
                        <div class="card-header bg-white" id="featureFaqThreeTitle">
                            <a href="#featureFaqThreeCollapse" class="d-flex align-items-center" data-toggle="collapse">
                                <h5 class="mb-0">მომხმარებელი</h5> <i
                                    class="far fa-plus-square ml-auto"></i>
                            </a>
                        </div>
                        <div id="featureFaqThreeCollapse" class="collapse" aria-labelledby="featureFaqThreeTitle">
                            <div class="card-body">
                                <p class="purpleText">აირჩიეთ თქვენთვის სასურველი სალონი, სპეციალისტი და დაჯავშნე
                                    მასთან ვიზიტი თქვენთვის სასურველ დროს.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
