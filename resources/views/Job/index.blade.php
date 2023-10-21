@extends('layouts.UserProfile')

@section('header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mx-auto text-center">
                    <h1 class="m-0">სტატუსი</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection


@section('body')
    <div class="row">


        {{--=====  სტატუსი =====--}}
        <section class="col-lg-8 connectedSortable mb-3 mx-auto mt-5">
            <li class="list-group-item">
                <label class="">მიმდინარე სტატუსი: </label>
            </li>

            <li class="list-group-item">
                <div class="col-12">
                    <div class="card">

                        <form action="{{route('Status.update', Auth::user()->id) }}" method="post">
            @csrf
            @method('patch')
            <li class="list-group-item text-center">
                <label class="staffcode">
                    @if(Auth::user()->access == 'User' || Auth::user()->access == 'user')
                        მომხმარებელი
                    @endif
                    @if(Auth::user()->access == 'Staff')
                        სალონის პერსონალი
                    @endif
                    @if(Auth::user()->access == 'Manager')
                        სალონის მფლობელი
                    @endif
                </label>
            </li>

            <div class="row mb-3">
                <div class="col-md-6">
                    <li class="list-group-item" style="font-size: 90%; font-weight: lighter">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="User" type="radio" id="customRadio1"
                                   name="access" @if(Auth::user()->access == 'User' || Auth::user()->access == 'user') checked @endif>
                            <label for="customRadio1" class="custom-control-label">მომხმარებელი.</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Staff" type="radio" id="customRadio2"
                                   name="access" @if(Auth::user()->access == 'Staff') checked @endif>
                            <label for="customRadio2" class="custom-control-label">სალონის პერსონალი.</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="Manager" type="radio"
                                   id="customRadio3"
                                   name="access" @if(Auth::user()->access == 'Manager') checked @endif>
                            <label for="customRadio3" class="custom-control-label">სალონის მფლობელი.</label>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-outline-info" type="submit">სტატუსის შესცვლა</button>
                        </div>
                    </li>
                </div>

                @if(Auth::user()->access == 'Manager')
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="w-100" src="{{asset('img/alert.png')}}">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <label class="">სტატუსის შეცვლით, თქვენს მიერ შექმნილი სალონი
                                    წაიშლება!</label>
                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <li class="list-group-item text-center">
                @if(Auth::user()->access == 'User')
                    <label class="">შესაძლებლობები:</label>
                    <ul class="text-left">
                        <li>საიტის დათვალიერება.</li>
                        <li>ძებნა.</li>
                        <li>პირადი ინფორმაციის რედაქტირება.</li>
                        <li>მომსახურე პერსონალის, სალონის შეფასება და კომენტარის დატოვება.</li>
                        <li>ვიზიტის დაჯავშნა სპეციალისტთან და მათი მართვა.</li>
                    </ul>
                @endif
                @if(Auth::user()->access == 'Staff')
                    <label class="">შესაძლებლობები:</label>
                    <ul class="text-left">
                        <li>საიტის დათვალიერება.</li>
                        <li>ძებნა.</li>
                        <li>პირადი ინფორმაციის რედაქტირება.</li>
                        <li>მომსახურე პერსონალის ასევე სალონის შეფასება და კომენტარის დატოვება. (გარდადა საკუთარი
                            თავის)
                        </li>
                        <li>ვიზიტის დაჯავშნა სპეციალისტთან და მათი მართვა.</li>
                        <li>სპეციალისტის გვერდის შექმნა.</li>
                        <li>კლიენტების მიერ დაჯავშნული ვიზიტების მართვა.</li>
                    </ul>
                @endif
                @if(Auth::user()->access == 'Manager')
                    <label class="">შესაძლებლობები:</label>
                    <ul class="text-left">
                        <li>საიტის დათვალიერება.</li>
                        <li>ძებნა.</li>
                        <li>პირადი ინფორმაციის რედაქტირება.</li>
                        <li>მომსახურე პერსონალის ასევე სალონის შეფასება და კომენტარის დატოვება. (გარდადა საკუთარი
                            თავის)
                        </li>
                        <li>ვიზიტის დაჯავშნა სპეციალისტთან და მათი მართვა.</li>
                        <li>სპეციალისტის გვერდის შექმნა.</li>
                        <li>კლიენტების მიერ დაჯავშნული ვიზიტების მართვა.</li>
                        <li>სალონის შექმნა.</li>
                        <li>სალონში პერსონალის დამატება. (პერსონალის კოდით)</li>
                        <li>პერსონალის უფლებების მინიჭება.</li>
                    </ul>
                @endif
            </li>


            </form>
        </section>


        {{--=====  ახალი Staffcode დაგენერირება =====--}}
        @if (Auth::user()->access === 'Staff' || Auth::user()->access === 'Manager')
            <section class="col-lg-8 mb-3 mx-auto">

                <li class="list-group-item">


                    @if($salonName != '')
                        <b>თქვენ დამატებული ხართ "{{ $salonName }}"-ში როგორც პერსონალი.</b>
                    @else
                        <b>მიმდინარე პერსონალის კოდი:</b>
                    @endif

                </li>
                <li class="list-group-item">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <div class="form-group">
                                    <div class="card-body box-profile text-center">
                                        <label class="staffcode">{{Auth::user()->staffcode}}</label>
                                        <div class="mt-2">
                                            @if($salonName != '')
                                                <button class="btn btn-outline-danger" id="myBtn">სალონის პერსონალის
                                                    სიიდან ამოშლა
                                                </button>

                                                <div id="mypopup" class="popup">
                                                    <div class="popup-content text-center">
                                                        <div class="popup-header">

                                                            <span class="close">&times;</span>
                                                        </div>

                                                        <div class="popup-body">
                                                            <img src="{{asset('img/alert.png')}}"
                                                                 class="alert-img">
                                                            <div class="text-center"
                                                                 style="font-size:90%">
                                                                <p>თქვენი ანგარიში სალონის,
                                                                    პერსონალის სიიდან ამოიშლება!</p>
                                                                <p>სალონის პერსონალის სიაში
                                                                    დასამატებლად, გადაეცით ახალი
                                                                    პერსონალის კოდი სალონის მფლობელს.</p>
                                                            </div>
                                                        </div>

                                                        <div class="popup-footer">
                                                            <form
                                                                action="{{ route('Job.StaffDelete', Auth::user()->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <button type="submit"
                                                                        class="btn btn-danger"
                                                                        title="პერსონალის სიიდან ამოშლა">
                                                                    წაშალე
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <form
                                                    action="{{route('StaffCode.update', Auth::user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button class="btn btn-outline-info"
                                                            title="Staffcode-ის დაგენერირება"
                                                            type="submit">
                                                        ახალი კოდის დაგენერირება
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </section>
        @endif


    </div> <!-- /row -->
@endsection
