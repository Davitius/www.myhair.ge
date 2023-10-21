@extends('layouts.main')

@section('content')

    <div class="container pt-5 mt-5">
        <div class="city mx-auto">
            <select class="city" id="city" name="city" onchange="getSelectValue();">
                @if($city == '')
                    <option value="">აირჩიეთ ქალაქი.</option>@endif
                <option value="">{{$city}}</option>
                @foreach($citys as $citi)
                    <option value="{{$citi->city}}">{{$citi->city}}</option>
                @endforeach
            </select>
        </div><!-- /.col-sm-4 -->
    </div><!-- /.container -->

    {{--                 ========== მენიუ - სლაიდერი ==========--}}
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
                                            <img src="{{$src1}}"
                                                 alt="{{$name1}}">
                                        </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">{{$name1}}</div>
                                    </div>
                                    <input type="text" id="location{{$m1}}" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch"
                                           value="{{$name1}}" hidden>
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
                                            <img src="{{$src2}}"
                                                 alt="{{$name2}}">
                                        </div>
                                    </button>
                                    <div class="details">
                                        <div class="name">{{$name2}}</div>
                                    </div>
                                    <input type="text" id="location{{$m2}}" name="location" hidden>
                                    <input type="text" id="MenuSearch" name="MenuSearch"
                                           value="{{$name2}}" hidden>
                                </div>
                            </form>
                        </div>
                    @endfor
                </div><!-- /.cards -->
            </div><!-- /.min-card -->
            <div class="button" id="searchResult">
                <label for="one" class=" active one"></label>
                <label for="two" class="two"></label>
            </div>
        </div><!-- /.SliderMenuDiv -->
    </div>


    {{--  ძებნის შედეგი  --}}
    <div class="container page-blog-post">
        @if(count($search) == 0)
            <div class="notfoundDiv mx-auto mb-3 text-center">
                <label class="GeoArtMotto">ჩანაწერი არ მოიძებნა.</label>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <section class="related-posts-section">
                    <div class="row">
                        @foreach($search as $result)
                            <div class="col-md-4 related-post mb-4">
                                <div class="searchCard text-center">
                                    <div class="related-post-thumbnail-wrapper">
                                        @if($result->photo != '')
                                            <a href="{{ route('Salon', $result->id) }}">
                                                <img class="salonposterimg" src="../../storage/{{$result->photo}}"
                                                     alt="salon picture"></a>
                                        @else
                                            <a href="{{ route('Salon', $result->id) }}">
                                                <img src="{{asset('img/nophoto1.png')}}" class="salonposterimg"></a>
                                        @endif
                                    </div>
                                    <div class="searchRating">
                                        <div class="text-start SalonRatingDiv">
                                            <div class="mr-1">
                                                <?php $a = 0; $b = 0.7; ?>
                                                @for($s = 1; $s < 6; $s++)
                                                    @if($result->rating <= $a)
                                                        <i class="fa-regular fa-star"></i>
                                                    @else
                                                        @if ($result->rating > $a && $result->rating <= $b)
                                                            <i class="fa-solid fa-star-half-stroke"></i>
                                                        @endif
                                                        @if ($result->rating > $b)
                                                            <i class="fa-solid fa-star"></i>
                                                        @endif
                                                    @endif
                                                    <?php $a += 1; $b += 1; ?>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="">
                                            <p class="post-published-date">{{$result->rating}}/5</p>
                                        </div>
                                    </div>
                                    <h5 class="post-tite">{{$result->name}}</h5>
                                    <p class="text-muted mb-5">{{$result->motto}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="PaginBtn mt-3 d-flex justify-content-center">
                        <label
                            class="">{{ $search->appends(['MenuSearch' => request()->Search])->links() }}</label>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        const searchSelected = document.getElementById('searchResult');
        searchSelected.scrollIntoView(top);
    </script>
@endsection
