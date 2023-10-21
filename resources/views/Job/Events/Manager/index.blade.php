@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$personal->firstname}} {{$personal->lastname}}-ის ჯავშნები</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">პროფილი</a></li>
                        <li class="breadcrumb-item">ჯავშნები</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')

    <div class="col-md-6 mx-auto mb-5 mt-5 d-flex justify-content-center">
        <form method="get" action="{{ route('Manager', [$barberId]) }}">
            <div class="btn-group">
                <select class="form-control" id="pers" name="pers">
                    <option class=""
                            value="">პერსონალის ჯავშნები
                    </option>
                    @foreach($Data['personals'] as $pers)
                        <option class=""
                                value="{{ $pers->id }}">{{ $pers->firstname }} {{ $pers->lastname }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success" type="submit">ჩვენება</button>
            </div>
        </form>
    </div>




    <div class="row mt-5">

        {{--    სტატისტიკა    --}}
        <div class="col-lg-2">
            <div class="CardInfo mb-3" style="display: flex; justify-content: center; align-items: center;">
                <div class="">
                    <p class="">აქტიური ჯავშნები</p>
                </div>
                <div class="">
                    <p class="" style="font-size: 200%">{{$Data['CountActiveRes']}}</p>
                </div>
            </div>

            <div class="CardInfo mb-3" style="display: flex; justify-content: center; align-items: center;">
                <div class="text-center">
                    <p class="">დასრულებული ჯავშნები</p>
                </div>
                <div class="">
                    <p class="" style="font-size: 200%">{{$Data['CountReservs']}}</p>
                </div>
            </div>

            <div class="CardInfo mb-5" style="display: flex; justify-content: center; align-items: center;">
                <div class="text-center">
                    <p class="">სულ ნამუშევარი</p>
                </div>
                <?php
                $sumWorktime = 0;
                ?>
                @foreach($job as $worktime)
                    <?php
                    $sumWorktime += $worktime->dur_ms;
                    ?>
                @endforeach
                <div class="" style="display: flex; flex-wrap: wrap; justify-content: space-around">
                    <div class="text-center p-2">
                        <table>
                            <tr>
                                <th>საათი</th>
                            </tr>
                            <tr>
                                <td style="font-size: 150%">{{floor($sumWorktime/1000/60/60)}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="text-center p-2">
                        <table>
                            <tr>
                                <th>წუთი</th>
                            </tr>
                            <tr>
                                <td style="font-size: 150%">{{($sumWorktime/1000/60)%60}}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

        </div><!-- /.col-lg-2 -->


        <div class="col-lg-10 mx-auto mb-3">
            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card">

                        {{--=================== აქტიური ჯავშნები ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title">აქტიური ჯავშნები</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
{{--                                    <th>ID</th>--}}
                                    <th>თარიღი</th>
                                    <th>საათი</th>
                                    <th>მომხმარებელი</th>
                                    <th>მომსახურება</th>
                                    <th>სტატუსი</th>
                                    <th>მოკლე კომენტარი</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                @foreach($Data['ActiveRes'] as $res)
                                    <tbody>
                                    <tr>
{{--                                        <td>{{$res->id}}</td>--}}
                                        <td>{{$res->startdate}}</td>
                                        <td>{{$res->starthour}}</td>
                                        <td>
                                            <form method="post" action="{{route('ClientInfo', $res->user_id)}}">
                                                @csrf
                                                <button type="submit" class="btn btn-default">{{$res->title}}</button>
                                            </form>
                                        </td>
                                        <td>{{$res->service}}</td>
                                        <td>
                                            @if($res->status == 'waiting')
                                                <button id="" class="btn btn-default"
                                                        title="ჯავშანი მიღებულია, გელოდებით">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="#0b5ed7" class="bi bi-hourglass-split"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                            @if($res->status == 'done')
                                                <button id="" class="btn btn-default" title="შესრულებულია">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                            @if($res->status == 'reject')
                                                <button id="" class="btn btn-default" title="უარყოფილია">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                        </td>
                                        <form method="post" action="{{route('Event.StatusUpdateManager', [$res->id, $barberId])}}">
                                            <td>
                                                <textarea class="form-control" id="comment" name="comment"
                                                          maxlength="55"
                                                          style="font-size: 80%; height: 40px">{{$res->comment}}</textarea>
                                            </td>
                                            <td>
                                                @csrf
                                                @method('patch')
                                                <div class="btn-group">
                                                    <select class="form-control" id="status" name="status"
                                                            style="width: 140px">
                                                        <option class="" value="">სტატუსი</option>
                                                        <option class="" style="color: blue" value="waiting">მიღება
                                                        </option>
                                                        <option class="" style="color: green" value="done">შესრულდა
                                                        </option>
                                                        <option class="" style="color: red" value="reject">უარყოფა
                                                        </option>
                                                    </select>

                                                    <button id="" onclick="return confirm('ნამდვილად გნებავს ჯავშნის სტატუსის შეცვლა?')" class="btn btn-outline-success" title="შეცვლა">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             fill="navy" class="bi bi-arrow-return-left"
                                                             viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                  d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <div class="PaginBtn mt-3 d-flex justify-content-center">
                                <label
                                    class="">{{ $Data['ActiveRes']->appends([])->links() }}</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>


            <li class="list-group-item mt-5">
                <div class="col-12 mt-3">
                    <div class="card">

                        {{--=================== დასრულებული ჯავშნები ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title">დასრულებული ჯავშნები</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>თარიღი</th>
                                    <th>საათი</th>
                                    <th>მომხმარებელი</th>
                                    <th>მომსახურება</th>
                                    <th>სტატუსი</th>
                                    <th>მოკლე კომენტარი</th>
                                </tr>
                                </thead>

                                @foreach($Data['Reservs'] as $reserv)
                                    <tbody>
                                    <tr>
                                        <td>{{$reserv->id}}</td>
                                        <td>{{$reserv->startdate}}</td>
                                        <td>{{$reserv->starthour}}</td>
                                        <td>
                                            <form method="post" action="{{route('ClientInfo', $reserv->user_id)}}">
                                                @csrf
                                                <button type="submit"
                                                        class="btn btn-default">{{$reserv->title}}</button>
                                            </form>
                                        </td>
                                        <td>{{$reserv->service}}</td>
                                        <td>
                                            @if($reserv->status == 'waiting')
                                                <button id="" class="btn btn-default"
                                                        title="ჯავშანი მიღებულია, გელოდებით">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="#0b5ed7" class="bi bi-hourglass-split"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                            @if($reserv->status == 'done')
                                                <button id="" class="btn btn-default" title="შესრულებულია">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                            @if($reserv->status == 'reject')
                                                <button id="" class="btn btn-default" title="უარყოფილია">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                         fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                                </button>
                                            @endif
                                        </td>
                                        <td style="font-size: 80%">{{$reserv->comment}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <div class="PaginBtn mt-3 d-flex justify-content-center">
                                <label
                                    class="">{{ $Data['Reservs']->appends([])->links() }}</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>

        </div><!-- /.col-lg-10 -->


    </div> <!-- /row -->
@endsection
