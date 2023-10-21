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

        <div class="col-lg-10 mx-auto mb-3">
            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card">

                        {{--=================== Staffs Search ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <form method="get" action="{{route('StaffsSearch')}}">
                                <div class="card-tools">
                                    <div class="btn-group">
                                        <input type="text" name="StaffSearch" id="StaffSearch" class="form-control"
                                               placeholder="StaffCode">
                                        <button type="submit" class="btn btn-default" title="ძებნა">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <a href="{{route('AdminPanel.Staffs')}}">
                                            <button class="btn btn-default" title="განახლება">
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
                            @if(isset($Staffs))
                                @if(count($Staffs))
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>სახელი</th>
                                            <th>გვარი</th>
                                            <th>როლი</th>
                                            <th>სტატუსი</th>
                                            <th>ქმედება</th>
                                        </tr>
                                        </thead>
                                        @foreach($Staffs as $Staff)
                                            <tbody>
                                            <tr>
                                                <td>{{$Staff->id}}</td>
                                                <td>{{$Staff->firstname}}</td>
                                                <td>{{$Staff->lastname}}</td>
                                                <td @if($Staff->staffstatus == "Manager") style="color: orange"
                                                    @else style="color: green" @endif >{{$Staff->staffstatus}}</td>
                                                <td @if($Staff->status == "Active") style="color: green"
                                                    @else style="color: red" @endif >{{$Staff->status}}</td>
                                                <td>
                                                    <a href="{{ route('AdminStaffs.edit', $Staff->id) }}">
                                                        <button class="btn btn-default" title="ნახვა სრულად">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 height="20"
                                                                 fill="dodgerblue" class="bi bi-eye-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <div class="PaginBtn mt-3 d-flex justify-content-center">
                                        <label
                                            class="">{{ $Staffs->appends(['StaffsSearch' => request()->StaffsSearch])->links() }}</label>
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

        </div><!-- /.col-lg-9 -->


        {{--    სტატისტიკა    --}}
        <div class="col-lg-2">
            <div class="CardInfo mb-3">
                <label class="">სტატისტიკა</label>
                <div class="mt-3">
                    <p class="">სულ: {{$Statistic['all']}}</p>
                </div>
                <div class="">
                    <p class="" style="color: orange">მენეჯერი: {{$Statistic['Manager']}}</p>
                </div>
                <div class="">
                    <p class="" style="color: green">პერსონალი: {{$Statistic['Staff']}}</p>
                </div>
            </div>

            <div class="CardInfo mb-3">
                <label class=""></label>
                <div class="mt-3">
                    <p class=""></p>
                </div>
                <div class="">
                    <p class="" style="color: green"></p>
                </div>
                <div class="">
                    <p class="" style="color: orange"></p>
                </div>
            </div>

            <div class="CardInfo mb-3">
                <label class=""></label>
                <div class="mt-3">
                    <p class=""></p>
                </div>
                <div class="">
                    <p class="" style="color: green"></p>
                </div>
                <div class="">
                    <p class="" style="color: red"></p>
                </div>
            </div>
        </div><!-- /.col-lg-3 -->
    </div> <!-- /row -->
@endsection
