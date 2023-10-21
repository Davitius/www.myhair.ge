@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ინფორმაცია კლიენტის შესახებ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('Events')}}">დაჯავშნული ვიზიტები</a></li>
                        <li class="breadcrumb-item">კლიენტი</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')
    <div class="row mt-5">

        {{--    სტატისტიკა    --}}
        <div class="col-lg-2">
            <div class="CardInfo mb-3" style="display: flex; justify-content: center; align-items: center;">
                <div class="text-center">
                    <p class="">{{$salonName}}-ში ვიზიტების რაოდენობა</p>
                </div>
                <div class="">
                    <p class="" style="font-size: 300%">{{$CountBvisits}}</p>
                </div>
            </div>
        </div><!-- /.col-lg-2 -->


        <div class="col-lg-10 mx-auto mb-3">
            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card" style="min-height: 160px">

                        {{--===================  ==========================--}}
                        <div class="card-header">
                            <h3 class="card-title">კლიენტი</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>მომხმარებელი</th>
                                    <th>სახელი-გვარი</th>
                                    <th>ელ. ფოსტა</th>
                                    <th>მობილური</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>{{$Client->id}}</td>
                                    <td>{{$Client->name}}</td>
                                    <td>{{$Client->firstname}} {{$Client->lastname}}</td>
                                    <td>{{$Client->email}}</td>
                                    <td>{{$Client->phone}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>


        </div><!-- /.col-lg-10 -->




    </div> <!-- /row -->
@endsection
