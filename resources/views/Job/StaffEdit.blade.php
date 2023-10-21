@extends('layouts.UserProfile')

@section('header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mx-auto text-center">
                    <h1 class="m-0">პერსონალის ცვლილება</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection


@section('body')
    <div class="row">
        @foreach($staff as $value)

            <div class="col-lg-10 connectedSortable mx-auto pt-5">
                {{--                                    <li class="list-group-item">--}}
                {{--                                        <b></b>--}}
                {{--                                    </li>--}}
                <li class="list-group-item">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">

                                <table class="table table-hover text-nowrap">
                                    <thead style="text-align: left; font-size: 80%">
                                    <tr>
                                        <th>სახელი</th>
                                        <th>გვარი</th>
                                        <th>Staffcode</th>
                                        <th>სტატუსი</th>
                                        <th>დამატების დრო</th>
                                        {{--                                                            <th>რედაქტირების დრო</th>--}}
                                        <th>ქმედება</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $value->firstname }}</td>
                                        <td>{{ $value->lastname }}</td>
                                        <td>{{ $value->staffcode }}</td>


                                        <form action="{{ route('Job.StaffUpdate', $value->id) }}" method="post">
                                            @csrf
                                            @method('patch')

                                            <td>
                                                <select class="form-control" id="status" name="status"
                                                        style="color: black">
                                                    <option class=""
                                                            value="{{ $value->staffstatus }}">{{ $value->staffstatus }}</option>
                                                    <option class="" value="Staff" style="color: green">Staff</option>
                                                    <option class="" value="Manager" style="color: red">Manager</option>
                                                </select>
                                            </td>
                                            <td>{{ $value->saladdtime }}</td>
                                            {{--                                                            <td>{{ $value->updated_at }}</td>--}}
                                            <td>

                                                <button class="btn btn-outline-info" onclick="return confirm('ნამდვილად გნებავთ რედაქტირება?')" title="რედაქტირება" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="20" height="20"
                                                         fill="currentColor" class="bi bi-pencil-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </button>

                                        </form>
                                        </td>

                                        <td>
                                            <button id="myBtn" class="btn btn-outline-danger" title="წაშლა">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     fill="currentColor"
                                                     class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                            </button>
                                            <div id="mypopup" class="popup">
                                                <div class="popup-content text-center">
                                                    <div class="popup-header">

                                                        <span class="close">&times;</span>
                                                    </div>

                                                    <div class="popup-body">
                                                        <img src="{{asset('img/alert.png')}}" class="alert-img">
                                                        <p><h4>ნამდვილად გნებავთ</h4></p>
                                                        <p><h4>პერსონალის წაშლა?</h4></p>
                                                    </div>

                                                    <div class="popup-footer">
                                                        <form method="post"
                                                              action="{{ route('Job.StaffDelete', $value->id) }}">
                                                            @csrf
                                                            @method('patch')
                                                            <button class="btn btn-danger" title="წაშლა" type="submit">
                                                                წაშალე
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </li>
                @endforeach
            </div>

    </div><!-- /.container-fluid -->
@endsection
