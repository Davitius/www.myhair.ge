@extends('layouts.UserProfile')

@section('header')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პირადი ინფორმაცია</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">პროფილი</a></li>
                        <li class="breadcrumb-item">პირადი ინფორმაცია</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection




@section('body')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$Stats['CountActiveRes']}}</h3>

                    <p>ჩემი ჯავშნები</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->

        @if((Auth::user()->staffstatus == 'Staff') || (Auth::user()->staffstatus == 'Manager'))
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$Stats['CountMyActiveEvents']}}<sup style="font-size: 20px"></sup></h3>

                    <p>კლიენტის დაჯავშნული ვიზიტი</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        @endif

        @if(Auth::user()->staffstatus == '')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$Stats['CountReservs']}}<sup style="font-size: 20px"></sup></h3>

                    <p>დასრულებული ჯავშნები</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
    @endif


        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$feedbacks}}</h3>

                    <p>კომენტარები</p>
                </div>
                <div class="icon">
                    <i class="far fa-comments"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$Stats['Rating']}}</h3>

                    <p>რეიტინგი</p>
                </div>
                <div class="icon">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->





    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-md-6 mx-auto mt-5 mb-5 p-0">

                <div class="text-center">
                    @if(Auth::user()->photo != '')
                        <img class="profile-user-img img-circle" style="width: 20em; height: 20em; object-fit: cover;"
                             src="../../storage/{{$user->photo}}" alt="User picture">
                    @else
                        <img class="profile-user-img img-circle" src="{{asset('img/DefaultAvatar.png')}}"
                             style="width: 20em; height: 20em; object-fit: cover;"
                             alt=" Default user picture">
                    @endif
                </div>

                <p class="text-muted text-center">{{$user->access}}</p>
            <div class="col-md-6 mx-auto">
                @if($errors->any())
                    <div class="alert alert-danger" style="font-size: 80%">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('UserAvatarUpdate.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="photo">
                                <label class="custom-file-label" for="exampleInputFile">აირჩიე ფოტო</label>
                            </div>
                            <div class="">
                                <button type="submit" onclick="return confirm('განვაახლო თქვენი ავატარი?')" class="btn btn-outline-primary">ატვირთე</button>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="" style="font-size: 80%" href="https://www.img2go.com/crop-image" target="_blank">ფოტო რედაქტორი.</a>
                        </div>
                    </div>
                </form>
            </div>

                <div class="userinfocard mt-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>პირადი ინფორმაცია</th>
                            <th>@if(Auth::user()->phone != '')
                                    <a href="{{ route('UserProfile.edit', Auth::user()->id) }}"
                                       class="btn btn-outline-info">განაახლე</a>
                                @else
                                    <a href="{{ route('UserProfile.edit', Auth::user()->id) }}"
                                       class="btn btn-outline-info">შეავსე</a>
                                @endif</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>ID:</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>სახელი:</td>
                            <td>
                                {{$user->firstname}}
                            </td>
                        </tr>
                        <tr>
                            <td>გვარი:</td>
                            <td>
                                {{$user->lastname}}
                            </td>
                        </tr>
                        <tr>
                            <td>მობილური:</td>
                            <td>
                                {{$user->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>ელ. ფოსტა:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>სტატუსი:</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('Job')}}">
                                        <button class="btn btn-outline-info">
                                            @if($user->access == 'Manager')
                                                სალონის მფლობელი
                                            @elseif($user->access == 'Staff')
                                                სალონის პერსონალი
                                            @else
                                                მომხმარებელი
                                            @endif
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>განახლდა:</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                        <tr>
                            <td>შეიქმნა:</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                </div>

            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->


@endsection
