@extends('layouts.UserProfile')


@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პერსონალი</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('AdminPanel')}}">ადმინ-პანელი</a></li>
                        <li class="breadcrumb-item"><a href="{{route('AdminPanel.Staffs')}}">პერსონალი</a></li>
                        <li class="breadcrumb-item">შეცვლა</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection



@section('body')
    <div class="row mt-5">


        <div class="col-lg-12 mx-auto mb-5">

            <li class="list-group-item">
                <div class="col-12 mt-3">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap">
                                <thead style="text-align: left;">
                                <tr>
                                    <th>ID</th>
                                    <th>Sal_ID</th>
                                    <th>სახელი</th>
                                    <th>გვარი</th>
                                    <th>StaffCode</th>
                                    <th>StaffStatus</th>
                                    <th>Status</th>
                                    <th>შეიქმნა</th>
                                    <th>განახლდა</th>
                                    <th>ქმედება</th>
                                </tr>
                                </thead>

                                @foreach($Staffs as $Staff)

                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="{{ route('AdminUsers.edit', $Staff->id) }}">
                                                    <button type="" class="btn btn-default" title="მომხმარებელი" >{{$Staff->id}}</button></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('AdminSalons.edit', $Staff->sal_id) }}">
                                                    <button type="" class="btn btn-default" title="სალონი" >{{$Staff->sal_id}}</button></a>
                                            </td>

                                            <td>{{$Staff->firstname}}</td>
                                            <td>{{$Staff->lastname}}</td>
                                            <td>{{$Staff->staffcode}}</td>
                                            <td>{{$Staff->staffstatus}}</td>

                                            <form action="{{route('AdminStaffs.update', $Staff->id)}}" method="post">
                                                @csrf
                                                @method('patch')
                                            <td>
                                                <select class="form-control" id="status" name="status" style="color: black">
                                                    <option class="" value="{{ $Staff->status }}">{{ $Staff->status }}</option>
                                                    <option class="" value="Active" style="color: green">Active</option>
                                                    <option class="" value="Disable" style="color: red">Disable</option>
                                                </select>
                                            </td>
                                            <td>{{$Staff->created_at}}</td>
                                            <td>{{$Staff->updated_at}}</td>
                                            <td>
                                                <button class="btn btn-default" onclick="return confirm('ნამდვილად გნებავს რედაქტირება?')" title="რედაქტირება" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         width="20" height="20"
                                                         fill="orange" class="bi bi-pencil-fill"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </button>
                                    </form>
                                    </td>

                                    <td>
                                        <button id="myBtn" class="btn btn-default" title="წაშლა">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red"
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
                                                    <form method="post" action="{{route('AdminStaffs.delete', $Staff->id)}}">
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
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </li>
        </div>
    </div> <!-- /row -->
@endsection
