@extends('layouts.UserProfile')

@section('header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პირადი ინფორმაციის განახლება</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">პროფილი</a></li>
                        <li class="breadcrumb-item active">პირადი ინფორმაციის განახლება</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')
    <!-- Main row -->
    <div class="row mt-5">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable mx-auto">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">პირადი ინფორმაცია</h3>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger" style="font-size: 80%">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('UserProfile.update', $guest->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="firstname">სახელი:</label><label class="RequiredStar">*</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder=""
                                   value="@if($guest->firstname == '') {{old('firstname')}} @else {{ $guest->firstname }} @endif">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">გვარი:</label><label class="RequiredStar">*</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder=""
                                   value="@if($guest->lastname == '') {{old('lastname')}} @else {{$guest->lastname}} @endif">
                        </div>
                        <div class="form-group">
                            <label>მობილური:</label><label class="RequiredStar">*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="phone" class="form-control" name="phone" id="phone"
                                       value="@if($guest->phone == '') {{old('phone')}} @else {{$guest->phone}} @endif">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit"
                                onclick="return confirm('ნამდვილად გნებავს პირადი ინფორმაციის განახლება?')"
                                class="btn btn-outline-primary">განახლება
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection
