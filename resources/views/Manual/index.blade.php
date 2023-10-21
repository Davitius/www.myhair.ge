@extends('layouts.UserProfile')

@section('header')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ვიდეო ინსტრუქცია (კეთდება).</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">პროფილი</a></li>
                        <li class="breadcrumb-item">ვიდეო ინსტრუქცია</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection




@section('body')






    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-md-6 mx-auto mt-5 mb-5 p-0">
            <div class="userinfocard mt-5">
                <div class="card-body">
                    <ul>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">დაჯავშნა.</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">ჯავშნის კონტროლი.
                                (მომხმარებლისთვის)</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">სტატუსის შეცვლა და
                                პერსონალის კოდი.</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">პერსონალის გვერდის
                                მართვა.</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">ჯავშნების მართვა.
                                (პერსონალისთვის)</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">სალონის შექმნა /
                                განახლება.</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">სალონში პერსონალის
                                დამატება.</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">პერსონალისთვის
                                მენეჯერი-ს წვდომის გაწერა..</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">სალონის პერსონალის
                                ჯავშნების კონტროლი (მენეჯერისთვის).</a>
                        </li>
                        <li>
                            <a class="btn bg-gradient-blue form-control text-start mb-2" href="#">ფოტოების დამატება და
                                ფოტო რედაქტორის გამოყენება.</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->


@endsection
