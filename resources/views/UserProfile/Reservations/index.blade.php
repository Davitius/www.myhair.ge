@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ჯავშნები</h1>
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
    <div class="row mt-5">
        <?php $massId = 0; ?>

        {{--    სტატისტიკა    --}}
        <div class="col-lg-2">
            <div class="CardInfo mb-3" style="display: flex; justify-content: center; align-items: center;">
                <div class="">
                    <p class="">აქტიური ჯავშნები</p>
                </div>
                <div class="">
                    <p class="" style="font-size: 300%">{{$Data['CountActiveRes']}}</p>
                </div>
            </div>

            <div class="CardInfo mb-3" style="display: flex; justify-content: center; align-items: center;">
                <div class="text-center">
                    <p class="">დასრულებული ჯავშნები</p>
                </div>
                <div class="">
                    <p class="" style="font-size: 300%">{{$Data['CountReservs']}}</p>
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
                                    <th>სალონი</th>
                                    <th>სპეციალისტი</th>
                                    <th>მომსახურება</th>
                                    <th>სტატუსი</th>
                                    <th>შემსრულებლის კომენტარი</th>
                                    <th>გაუქმება</th>
                                </tr>
                                </thead>

                                @foreach($Data['ActiveRes'] as $res)
                                    <tbody>
                                    <tr>
{{--                                        <td>{{$res->id}}</td>--}}
                                        <td>{{$res->startdate}}</td>
                                        <td>{{$res->starthour}}</td>
                                        <td>{{$res->salon}}</td>
                                        <td><a href="{{route('SalonStaff', [$res->barber_id, $massId])}}"><button class="btn btn-default">{{$res->barber}}</button></a></td>
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
                                        <td><textarea class="form-control" style="width: 100%; font-size: 80%; height: 40px"
                                                      disabled>{{$res->comment}}</textarea></td>
                                        <td>
                                            <form method="post" action="{{route('Event.CancelUser', $res->id)}}">
                                                @csrf
                                                @method('patch')
                                                <button id="" class="btn btn-outline-warning" onclick="return confirm('ნამდვილად გნებავს ჯავშნის გაუქმება?')" title="ჯავშნის გაუქმება">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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

                        {{--=================== ჩემი ჯავშნები ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title">ჩემი ჯავშნები</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>თარიღი</th>
                                    <th>საათი</th>
                                    <th>სალონი</th>
                                    <th>სპეციალისტი</th>
                                    <th>მომსახურება</th>
                                    <th>სტატუსი</th>
                                    <th>კომენტარი</th>
                                </tr>
                                </thead>

                                @foreach($Data['Reservs'] as $reserv)
                                    <tbody>
                                    <tr>
                                        <td>{{$reserv->id}}</td>
                                        <td>{{$reserv->startdate}}</td>
                                        <td>{{$reserv->starthour}}</td>
                                        <td>{{$reserv->salon}}</td>
                                        <td>{{$reserv->barber}}</td>
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
                                        <td>{{$reserv->comment}}</td>
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
