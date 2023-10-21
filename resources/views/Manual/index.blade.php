@extends('layouts.UserProfile')

@section('header')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mx-auto text-center">
                    <h1 class="m-0">ვიდეო ინსტრუქცია (კეთდება).</h1>
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
                            <a class="btn btn-info form-control text-start mb-2" href="#">დაჯავშნა.</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">ჯავშნის კონტროლი.
                                (მომხმარებლისთვის)</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">სტატუსის შეცვლა და
                                პერსონალის კოდი.</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">პერსონალის გვერდის
                                მართვა.</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">ჯავშნების მართვა.
                                (პერსონალისთვის)</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">სალონის შექმნა /
                                განახლება.</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">სალონში პერსონალის
                                დამატება.</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">პერსონალისთვის
                                მენეჯერი-ს წვდომის გაწერა..</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">სალონის პერსონალის
                                ჯავშნების კონტროლი (მენეჯერისთვის).</a>
                        </li>
                        <li>
                            <a class="btn btn-info form-control text-start mb-2" href="#">ფოტოების დამატება და
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
