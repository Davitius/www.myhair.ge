@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">მომხმარებლები</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('AdminPanel')}}">ადმინ-პანელი</a></li>
                        <li class="breadcrumb-item">ქალაქები</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')
    <div class="row mt-5">

        <div class="col-lg-8 mx-auto mb-3">
            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card">


                        <div class="card-header">
                            <h3 class="card-title">ქალაქის დამატება</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="post" action="{{route('AdminCity.add')}}">
                                @csrf
                            <div class="btn-group d-flex justify-content-center">
                                <input class="form-control" type="text" name="city" id="" placeholder="ქალაქი" required>
                                <button class="btn btn-outline-success" type="submit">დამატება</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>
        </div><!-- /.col-lg-9 -->


        {{--    სტატისტიკა    --}}
        <div class="col-lg-4">
            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card">

                        {{--=================== User Search ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <form method="get" action="{{route('CitylistSearch')}}">
                                <div class="card-tools">
                                    <div class="btn-group">
                                        <input type="text" name="CitySearch" id="CitySearch" class="form-control"
                                               placeholder="ქალაქი">


                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <a href="{{route('AdminPanel.Citylist')}}">
                                            <button class="btn btn-default">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-arrow-clockwise"
                                                     viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                    <path
                                                        d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                </svg>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-header -->


                        <div class="card-body table-responsive p-0">
                            @if(isset($citys))
                                @if(count($citys))
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    {{--                                    <th>ID</th>--}}
                                    <th>ქალაქი</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>
                                @foreach($citys as $city)
                                    <tbody>
                                    <tr>
                                        {{--                                        <td>{{$city->id}}</td>--}}
                                        <td>{{$city->city}}</td>
                                        <td>
                                            <form method="post" action="{{route('AdminCity.delete', [$city->id])}}">
                                                @csrf
                                                <button class="btn btn-default float-right"
                                                        onclick="return confirm('ნამდვილად გინდა წაშლა?')"
                                                        title="წაშლა">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd"
                                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <div class="PaginBtn mt-3 d-flex justify-content-center">
{{--                                <label--}}
{{--                                    class="">{{ $citys->appends(['UserSearch' => request()->UserSearch])->links() }}</label>--}}
                                <label
                                    class="">{{ $citys->appends(['CitySearch' => request()->CitySearch])->links() }}</label>
                            </div>
                            @else
                                <div
                                    class="NotFound bg-warning d-flex justify-content-center pt-3">
                                    <p class="">ჩანაწერი არ მოიძებნა.</p>
                                </div>
                                @endif
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>


        </div><!-- /.col-lg-3 -->

    </div> <!-- /row -->
@endsection
