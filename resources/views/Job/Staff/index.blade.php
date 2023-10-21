@extends('layouts.UserProfile')

@section('header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პერსონალი</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">ოფისი</a></li>
                        <li class="breadcrumb-item">პერსონალი</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('body')
    <div class="row mt-5">

        <div class="col-lg-8">
            @if($errors->any())
                <div class="alert alert-danger" style="font-size: 80%">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            {{--=================== თანამშრომლის დამატება ========================================--}}
            <li class="list-group-item">
                <b>პერსონალის პარამეტრები</b>
            </li>
            {{--=================== Staff Search ==========================--}}
            <li class="list-group-item mb-3">
                <div class="row pb-3">

                    <!-- /.card -->
                    <div class="col-md-6 card">

                        <div class="row pb-3">
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                @if(Auth::user()->dayoff == 'working')
                                    <div
                                        class="p-0 d-flex justify-content-center align-items-center">
                                        <img class="w-100" src="{{asset('img/barberworking.gif')}}">
                                    </div>
                                @else
                                    <div class="alert alert-danger p-1 text-center">
                                        <label class="" style="font-weight: normal">თქვენ იმყოფებით დასვენების
                                            რეჟიმზე!</label>
                                        <label class="" style="font-weight: normal">დასვენების რეჟიმის დროს ადგილის
                                            დაჯავშნა
                                            შეუძლებელია!</label>
                                    </div>
                            @endif
                            <!-- /.card-body -->
                            </div>


                            <div class="col-md-6 d-flex justify-content-center align-items-center">

                                @if(Auth::user()->dayoff == 'working')
                                    <form method="post" action="{{ route('Staff.WorkingUpdate') }}">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-outline-danger"
                                                onclick="return confirm('ნამდვილად გნებავს დასვენების რეჟიმზე გადასვლა?')">
                                            დაისვენე
                                        </button>
                                    </form>
                                @else
                                    <form method="post" action="{{ route('Staff.WorkingUpdate') }}">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-outline-success">ვმუშაობ</button>
                                    </form>
                                @endif
                            </div>
                            <!-- /.card-header -->
                        </div>
                    </div>


                    <div class="col-md-6 pb-3 card">
                        <div class="card-header">
                            <h3 class="card-title">თქვენი სპეციალობა: {{ Auth::user()->role }}</h3>
                        </div>
                        <br>
                        <!-- /.card-header -->

                        <form method="post" action="{{ route('Staff.RoleUpdate') }}">
                            @csrf
                            @method('patch')
                            <div class="btn-group w-100">
                                <select class="form-control" name="spec" id="spec">
                                    <option class="" value="{{ Auth::user()->role }}">{{ Auth::user()->role }}</option>
                                @foreach($specs as $spec)
                                        <option class="" value="{{ $spec->spec }}">{{ $spec->spec }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-success" type="submit">შეცვლა</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.row -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ჩემი პრეისკურანტი.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-50">მომსახურება</th>
                                    <th>შესრულების დრო</th>
                                    <th>ფასი (₾)</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                @foreach($BarbAbils as $ba)
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label class="w-100"
                                                   style="font-weight: normal">{{$ba->service}}</label>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <label class=""
                                                       style="font-weight: normal">{{$ba->hour}}:{{$ba->minute}}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <label class=""
                                                   style="font-weight: normal">{{$ba->price}}</label>
                                        </td>
                                        <td>
                                            <form action="{{ route('Staff.AbilityDelete', $ba->id) }}"
                                                  method="post">
                                                @csrf
                                                <button class="btn btn-default"
                                                        onclick="return confirm('ნამდვილად გებნებავთ მომსახურების პრეისკურანტიდან ამოშლა?')"
                                                        title="წაშლა" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                         height="20"
                                                         fill="red"
                                                         class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </li>





            <li class="list-group-item mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">დაამატე ახალი მომსახურება.</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th class="w-50">მომსახურება</th>
                                    <th>შესრულების დრო</th>
                                    <th>ფასი (₾)</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                <form method="post" action="{{ route('Staff.AbilityCreate') }}">
                                    @csrf
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="service" name="service">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <select class="form-control" name="hour" id="hour"
                                                    style="width: 100px">
                                                <option class="" value="">საათი</option>
                                                <option class="" value="0">0</option>
                                                @for($h=1; $h<10; $h++)
                                                    <option class="" value="{{$h}}">{{$h}}</option>
                                                @endfor
                                            </select>
                                            <label class=""
                                                   style="margin-right: 0.7em; margin-left: 0.7em; margin-top: 0.4em;">:</label>
                                            <select class="form-control" name="minute" id="mminute"
                                                    style="width: 100px">
                                                <option class="" value="">წუთი</option>
                                                <option class="" value="00">00</option>
                                                <option class="" value="30">30</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <input class="form-control" name="price" id="price"
                                               style="width: 70px" type="number">
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-success" title="პრისკურანტში დამატება"
                                                type="submit">
                                            დამატება
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                                </form>

                            </table>
                        </div>
                    </div>
                </div>
            </li>
        </div>


        <div class="col-lg-4">
            {{--============================= Barber Foto Galery =====================================--}}
            <section class="col-lg-12 mb-5 mx-auto">
                {{--=====  დასახელება =====--}}
                <li class="list-group-item">
                    <b>ჩემი ვარცხნილობები</b>
                    <br>
                    <a class="" style="font-size: 80%" href="https://www.img2go.com/crop-image" target="_blank">ფოტო
                        რედაქტორი.</a>
                </li>
                <form method="post" action="{{ route('Staff.FlipPhotoUpdate') }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="card">

                                @for($z=1; $z<6; $z++)
                                    <?php
                                    $Photo = 'flipphoto' . $z;
                                    ?>
                                    {{--=====  ფოტო_1 =====--}}
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                        <div class="form-group FotoFrame">
                                            <label for="exampleInputFile">ფოტო №{{$z}}:</label>
                                            <div class="input-group w-100">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="{{$Photo}}"
                                                           id="{{$Photo}}">
                                                    <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                        ფოტო</label>
                                                </div>
                                            </div>
                                            <br>
                                            @if(Auth::user()->$Photo != '')
                                                <img class="barberworksimg" alt="ფოტო №{{$z}}"
                                                     src="../../storage/{{Auth::user()->$Photo}}">
                                            @else
                                                <img class="barberworksimg" alt="ფოტო №{{$z}}"
                                                     src="{{asset('img/hsnp.jpg')}}">
                                            @endif
                                        </div>
                                    </div>
                                @endfor


                                {{--=====  ღილაკები =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="card-body d-flex justify-content-center">
                                        <button type="submit" class="btn btn-outline-primary">ატვირთე</button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                </div>
                            </div>
                        </div>
                    </li>
                </form>
            </section>
        </div>

    </div> <!-- /row -->


@endsection
