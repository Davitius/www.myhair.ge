@extends('layouts.UserProfile')

@section('header')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">სილამაზის სალონი</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('UserProfile')}}">ოფისი</a></li>
                        <li class="breadcrumb-item">სილამაზის სალონი</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection


@section('body')




    <div class="row mt-5">
        @if($salon != null)
            <section class="col-lg-8 mb-3">

                @if($errors->any())
                    <div class="alert alert-danger" style="font-size: 80%">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--=================== თანამშრომლის დამატება ========================================--}}
                <li class="list-group-item">
                    <b>პერსონალის დამატება</b>
                </li>

                {{--=================== Staff Search ==========================--}}
                <li class="list-group-item mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <div class="btn-group">
                                    <form method="get" class="btn-group" action="{{ route('Job.StaffSearch') }}">
                                        <input type="text" name="staffcode" id="staffcode"
                                               class="form-control w-75"
                                               placeholder="პერსონალის კოდი">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('Job.Beautysalon')}}">
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
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">

                                @if(isset($s_staffs))
                                    @if(count($s_staffs))
                                        @foreach($s_staffs as $s_staff)
                                            @if(($s_staff->sal_id) == null)
                                                <table class="table table-hover text-nowrap">
                                                    <thead style="text-align: left; font-size: 80%">
                                                    <tr>
                                                        <th>სახელი</th>
                                                        <th>გვარი</th>
                                                        <th>Staffcode</th>
                                                        <th>ქმედება</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $s_staff->firstname }}</td>
                                                        <td>{{ $s_staff->lastname }}</td>
                                                        <td>{{ $s_staff->staffcode }}</td>
                                                        <td>

                                                            <form
                                                                action="{{ route('Job.SalonStaffCreate', $s_staff->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <input type="text" name="salid" value="96" hidden>
                                                                <button class="btn btn-light" type="submit"
                                                                        title="პერსონალის დამატება">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         width="20"
                                                                         height="20"
                                                                         fill="green"
                                                                         class="bi bi-person-plus-fill"
                                                                         viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                                        <path fill-rule="evenodd"
                                                                              d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    @else
                                                        <div
                                                            class="NotFound bg-warning d-flex justify-content-center pt-3">
                                                            <p class="">პერსონალი უკვე დამატებულია.</p>
                                                        </div>
                                                    @endif
                                                    @endforeach
                                                </table>
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


                <li class="list-group-item">
                    <b>სალონის პერსონალი</b>
                </li>
                <li class="list-group-item">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">

                                <table class="table table-hover text-nowrap">
                                    <thead style="text-align: left; font-size: 80%">
                                    <tr>
                                        <th>სახელი</th>
                                        <th>გვარი</th>
                                        {{--                                                    <th>Staffcode</th>--}}
                                        <th>სტატუსი</th>
                                        <th>ქმედება</th>
                                    </tr>
                                    </thead>
                                    @if(count($staffs))
                                        @foreach($staffs as $staff)
                                            <tbody>
                                            <tr>
                                                <td>{{ $staff->firstname }}</td>
                                                <td>{{ $staff->lastname }}</td>
                                                {{--                                                            <td>{{ $staff->staffcode }}</td>--}}
                                                <td>{{ $staff->staffstatus }}</td>
                                                <td>
                                                    <a href="{{ route('Job.StaffEdit', $staff->id) }}">
                                                        <button class="btn btn-default" title="რედაქტირება">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 width="20" height="20"
                                                                 fill="orange" class="bi bi-pencil-fill"
                                                                 viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                            </svg>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    @endif
                                </table>
                                <div class="PaginBtn mt-3 d-flex justify-content-center">
                                    <label
                                        class="">{{ $staffs->appends(['StaffSearch' => request()->StaffSearch])->links() }}</label>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </li>


                {{--=====  დასახელება =====--}}
                <li class="list-group-item d-flex justify-content-between">
                        <a class="" href="{{route('Salon', $salon->id)}}"><h3>{{ $salon->name }}</h3></a>

                    <button id="myBtn" title="სალონის წაშლა" class="btn btn-default">
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
                                <p><h4>სალონის წაშლა?</h4></p>
                            </div>

                            <div class="popup-footer">
                                <form action="{{ route('Job.BeautysalonDelete') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" title="სალონის წაშლა">
                                        წაშალე
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <form method="post" action="{{route('Job.BeautysalonUpdate', $salon->user_id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <li class="list-group-item">
                        <div class="col-12">
                            <div class="card">
                                {{--=====  დევიზი =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">დევიზი:</label>
                                        <input type="text" class="form-control" name="motto" id="motto"
                                               placeholder="" value="{{ $salon->motto }}">
                                    </div>
                                </div>


                                {{--=====  ტელეფონი =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group">
                                        <label>ტელეფონი:</label><label class="RequiredStar">*</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="phone"
                                                   id="phone"
                                                   value="{{ $salon->phone }}" maxlength="9">
                                        </div>
                                    </div>
                                </div>

                                {{--=====  მისამართი =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="form-group">
                                        <label for="firstname">მისამართი:</label><label
                                            class="RequiredStar">*</label>
                                        <input type="text" class="form-control" name="address"
                                               id="address"
                                               placeholder="" value="{{ $salon->address }}">
                                    </div>
                                </div>

                                {{--=====  ლოკაცია =====--}}
                                <div class="card-body">
                                    <label for="firstname">ლოკაცია:</label>
                                    <select class="form-control" name="location"
                                            id="location">
                                        <option value="{{ $salon->location }}"
                                                class="">{{ $salon->location }}</option>
                                        @foreach($citys as $citi)
                                            <option value="{{$citi->city}}">{{$citi->city}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                {{--=====  Googlemap =====--}}
                                <div class="card-header">
                                    <label for="exampleInputFile">Google კოორდინატები.</label>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="card-body p-0">
                                                <div class="" id="map" style="width: 100%; height: 300px;">
                                                    @if (($salon->latitude == '') || ($salon->longitude == ''))
                                                        <img src="{{asset('img/googlemap.png')}}" alt="რუქა" class=""
                                                             style="width: 96%">
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="" style="font-weight: normal">გრძედი
                                                        (latitude):</label>
                                                    <input class="form-control" type="text" id="latitude"
                                                           name="latitude" value="{{$salon->latitude}}"
                                                           placeholder="xx,xxxxxx">
                                                </div>
                                                <div class="form-group">
                                                    <label class="" style="font-weight: normal">განედი
                                                        (longitude):</label>
                                                    <input class="form-control" type="text" id="longitude"
                                                           name="longitude" value="{{$salon->longitude}}"
                                                           placeholder="xx,xxxxxx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--=====  ფოტო =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="card-body">
                                            <label for="exampleInputFile">ფოტო:</label>
                                            @if($salon->photo != '')
                                                <img class="" src="../../storage/{{$salon->photo}}"
                                                     alt="Salon picture"
                                                     style="width: 100%; height: 300px; border-radius: 6px; object-fit: cover">
                                            @else
                                                <img src="{{asset('img/nophoto1.png')}}" class=""
                                                     style="width: 100%; height: 300px; border-radius: 6px; object-fit: cover" alt="Salon picture">
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputFile">ფოტო:</label>

                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="photo"
                                                               id="photo">
                                                        <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                            ფოტო</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--===== სამუშაო დღეები/საათები =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <label class="">სამუშაო დღეები</label>
                                            <br>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox1" name="monday"
                                                           value="ორშაბათი." @if($checkWD[0] != '') checked @endif>
                                                    <label for="customCheckbox1"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">ორშაბათი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox2" name="tuesday"
                                                           value="სამშაბათი." @if($checkWD[1] != '') checked @endif>
                                                    <label for="customCheckbox2"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">სამშაბათი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox3" name="wednesday"
                                                           value="ოთხშაბათი." @if($checkWD[2] != '') checked @endif>
                                                    <label for="customCheckbox3"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">ოთხშაბათი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox4" name="thursday"
                                                           value="ხუთშაბათი." @if($checkWD[3] != '') checked @endif>
                                                    <label for="customCheckbox4"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">ხუთშაბათი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox5" name="friday"
                                                           value="პარასკევი." @if($checkWD[4] != '') checked @endif>
                                                    <label for="customCheckbox5"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">პარასკევი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox6" name="saturday"
                                                           value="შაბათი ." @if($checkWD[5] != '') checked @endif>
                                                    <label for="customCheckbox6"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">შაბათი</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox"
                                                           id="customCheckbox7" name="sunday" value="კვირა."
                                                           @if($checkWD[6] != '') checked @endif>
                                                    <label for="customCheckbox7"
                                                           class="custom-control-label"
                                                           style="font-weight: normal">კვირა</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <label class="">სამუშაო საათები</label>
                                            <br>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label for="firstname"
                                                           style="font-weight: normal">დაწყება (am)</label>
                                                    <select class="form-control" name="work_sh"
                                                            id="work_sh">
                                                        <option value="{{ $salon->work_sh }}"
                                                                class="">{{ $salon->work_sh }}</option>
                                                        @for($ts2=7; $ts2<=12; $ts2++)
                                                            <option value="{{$ts2}}" class="">{{$ts2}}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="firstname"
                                                           style="font-weight: normal">დამთავრება (pm)</label>
                                                    <select class="form-control" name="work_fh"
                                                            id="work_fh">
                                                        <option value="{{ $salon->work_fh }}"
                                                                class="">{{ $salon->work_fh }}</option>
                                                        @for($tf2=16; $tf2<=22; $tf2++)
                                                            <option value="{{$tf2}}" class="">{{$tf2}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{--===== სერვისი =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                    <div class="row p-4">
                                        <div class="col-md-6">
                                            <label class="">სერვისი</label>
                                            <br>
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                @php
                                                    $services = [
                                                        ['id' => 11, 'label' => 'თმის შეჭრა, შეღებვა, ვარცხნილობა'],
                                                        ['id' => 12, 'label' => 'წვერის გაპარსვა'],
                                                        ['id' => 13, 'label' => 'მაკიაჟი'],
                                                        ['id' => 14, 'label' => 'მანიკური'],
                                                        ['id' => 15, 'label' => 'პედიკური'],
                                                        ['id' => 16, 'label' => 'წარბები და წამწამები'],
                                                        ['id' => 17, 'label' => 'სადღესასწაულო მაკიაჟი, ვარცხნილობა'],
                                                        ['id' => 18, 'label' => 'ტატუირება'],
                                                        ['id' => 19, 'label' => 'სპა'],
                                                        ['id' => 20, 'label' => 'ეპილაცია'],
                                                        ['id' => 21, 'label' => 'სოლარიუმი'],
                                                        ['id' => 22, 'label' => 'კანის მოვლა']
                                                    ];
                                                @endphp

                                                @foreach($services as $key => $service)
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                               id="customCheckbox{{ $service['id'] }}"
                                                               name="{{ $service['id'] }}"
                                                               value="{{ $service['label'] }}"
                                                               @if($checkService[$key] != '') checked @endif>
                                                        <label for="customCheckbox{{ $service['id'] }}"
                                                               class="custom-control-label"
                                                               style="font-weight: normal">{{ $service['label'] }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--=====  ღილაკი "შეცვლა" =====--}}
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <button type="submit" onclick="return confirm('ნამდვილად გნებავს შეცვლა?')"
                                            class="btn btn-outline-primary">შეცვლა
                                    </button>
                                </div>
                                <div class="card-body table-responsive p-0">
                                </div>
                            </div>
                        </div>
                    </li>
                </form>
            </section>



            <section class="col-lg-4">

                {{--============================= Barber Foto Galery =====================================--}}
                <section class="col-lg-12 mx-auto">
                    {{--=====  დასახელება =====--}}
                    <li class="list-group-item">
                        <b>სალონის ფოტოები</b>
                        <br>
                        <a class="" style="font-size: 80%" href="https://www.img2go.com/crop-image" target="_blank">ფოტო
                            რედაქტორი.</a>
                    </li>
                    <form method="post" action="{{ route('Salon.FlipPhotoUpdate', $salon->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <li class="list-group-item">
                            <div class="col-12">
                                <div class="card">

                                    @for($z=1; $z<6; $z++)
                                        <?php
                                        $Photo = 'flipphoto' . $z;
                                        ?>
                                        {{--=====  ფოტოები =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group FotoFrame">
                                                <label for="exampleInputFile">ფოტო №{{$z}}:</label>
                                                <div class="input-group w-100">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="{{$Photo}}"
                                                               id="{{$Photo}}">
                                                        <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                            ფოტო</label>
                                                    </div>
                                                </div>
                                                <br>
                                                @if($salon->$Photo != '')
                                                    <img class="barberworksimg" alt="ფოტო №{{$z}}"
                                                         src="../../storage/{{$salon->$Photo}}">
                                                @else
                                                    <img class="barberworksimg" alt="ფოტო №{{$z}}"
                                                         src="{{asset('img/hsnp.jpg')}}">
                                                @endif
                                            </div>
                                        </div>
                                    @endfor


                                    {{--=====  ღილაკები =====--}}
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                        <div class="card-body d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary">ატვირთე</button>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </form>
                </section>
                {{--            </section>--}}
                @else

                    {{--============================= Salon Create =====================================--}}
                    <section class="col-lg-8 mb-5 mx-auto mt-5">

                        @if($errors->any())
                            <div class="alert alert-danger" style="font-size: 80%">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--=====  დასახელება =====--}}
                        <li class="list-group-item">
                            <b>სალონის შექმნა</b>
                        </li>
                        <form method="post" action="{{ route('Job.BeautysalonCreate') }}"
                              enctype="multipart/form-data">
                            @csrf
                            {{--                                @method('patch')--}}
                            <li class="list-group-item">
                                <div class="col-12">
                                    <div class="card">

                                        {{--=====  დასახელება =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group">
                                                <label for="firstname">სალონის დასახელება:</label><label
                                                    class="RequiredStar">*</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="" value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        {{--=====  დევიზი =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">დევიზი:</label>
                                                <input type="text" class="form-control" name="motto" id="motto"
                                                       placeholder="" value="{{ old('motto') }}">
                                            </div>
                                        </div>

                                        {{--=====  ტელეფონი =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group">
                                                <label>ტელეფონი:</label><label class="RequiredStar">*</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="phone"
                                                           id="phone"
                                                           value="{{ old('phone') }}" maxlength="9">
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>

                                        {{--=====  მისამართი =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group">
                                                <label for="firstname">მისამართი:</label><label
                                                    class="RequiredStar">*</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                       placeholder="" value="{{ old('address') }}">
                                            </div>
                                        </div>

                                        {{--=====  ლოკაცია =====--}}
                                        <div class="card-body">
                                            <label for="firstname">ლოკაცია:</label><label class="RequiredStar">*</label>
                                            <select class="form-control" name="location"
                                                    id="location">
                                                <option value="{{ old('location') }}">{{ old('location') }}</option>
                                                @foreach($citys as $citi)
                                                    <option value="{{$citi->city}}">{{$citi->city}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        {{--=====  Googlemap =====--}}
                                        <div class="card-header">
                                            <label for="exampleInputFile">Google კოორდინატები.</label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label class="" style="font-weight: normal">გრძედი
                                                                (latitude):</label>
                                                            <input class="form-control" type="text" id="latitude"
                                                                   name="latitude" placeholder="xx,xxxxxx"
                                                                   value="{{old('latitude')}}">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label class="" style="font-weight: normal">განედი
                                                                (longitude):</label>
                                                            <input class="form-control" type="text" id="longitude"
                                                                   name="longitude" placeholder="xx,xxxxxx"
                                                                   value="{{old('longitude')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{--=====  ფოტო =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="form-group">
                                                <label for="exampleInputFile">ფოტო:</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="photo"
                                                               id="photo">
                                                        <label class="custom-file-label" for="exampleInputFile">აირჩიე
                                                            ფოტო</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--===== სამუშაო დღეები/საათები =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="row p-4">
                                                <div class="col-lg-6">
                                                    <label class="">სამუშაო დღეები</label>
                                                    <br>
                                                    <div class="col-sm-6">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox1" name="monday"
                                                                       value="ორშაბათი.">
                                                                <label for="customCheckbox1"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">ორშაბათი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox2" name="tuesday"
                                                                       value="სამშაბათი.">
                                                                <label for="customCheckbox2"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">სამშაბათი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox3" name="wednesday"
                                                                       value="ოთხშაბათი.">
                                                                <label for="customCheckbox3"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">ოთხშაბათი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox4" name="thursday"
                                                                       value="ხუთშაბათი.">
                                                                <label for="customCheckbox4"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">ხუთშაბათი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox5" name="friday"
                                                                       value="პარასკევი.">
                                                                <label for="customCheckbox5"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">პარასკევი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox6" name="saturday"
                                                                       value="შაბათი .">
                                                                <label for="customCheckbox6"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">შაბათი</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox7" name="sunday"
                                                                       value="კვირა.">
                                                                <label for="customCheckbox7"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">კვირა</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <label class="">სამუშაო საათები</label>
                                                    <br>
                                                    <div class="row">

                                                        <div class="col-lg-6">
                                                            <label for="firstname"
                                                                   style="font-weight: normal">დაწყება
                                                                (am)</label><label
                                                                class="RequiredStar">*</label>
                                                            <br>

                                                            <select class="form-control" name="work_sh"
                                                                    id="work_sh">
                                                                <option value="{{ old('work_sh') }}"
                                                                        class="">{{ old('work_sh') }}</option>
                                                                @for($ts1=7; $ts1<=12; $ts1++)
                                                                    <option value="{{$ts1}}" class="">{{$ts1}}</option>
                                                                @endfor
                                                            </select>

                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="firstname"
                                                                   style="font-weight: normal">დამთავრება
                                                                (pm)</label><label
                                                                class="RequiredStar">*</label>
                                                            <select class="form-control" name="work_fh"
                                                                    id="work_fh">
                                                                <option value="{{ old('work_fh') }}"
                                                                        class="">{{ old('work_fh') }}</option>
                                                                @for($tf1=16; $tf1<=22; $tf1++)
                                                                    <option value="{{$tf1}}" class="">{{$tf1}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{--===== სერვისი =====--}}
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                            <div class="row p-4">
                                                <div class="col-sm-6">
                                                    <label class="">სერვისი</label>
                                                    <br>
                                                    <!-- checkbox -->


                                                    <div class="form-group">
                                                        @php
                                                            $services = [
                                                                ['id' => 11, 'label' => 'თმის შეჭრა, შეღებვა, ვარცხნილობა'],
                                                                ['id' => 12, 'label' => 'წვერის გაპარსვა'],
                                                                ['id' => 13, 'label' => 'მაკიაჟი'],
                                                                ['id' => 14, 'label' => 'მანიკური'],
                                                                ['id' => 15, 'label' => 'პედიკური'],
                                                                ['id' => 16, 'label' => 'წარბები და წამწამები'],
                                                                ['id' => 17, 'label' => 'სადღესასწაულო მაკიაჟი, ვარცხნილობა'],
                                                                ['id' => 18, 'label' => 'ტატუირება'],
                                                                ['id' => 19, 'label' => 'სპა'],
                                                                ['id' => 20, 'label' => 'ეპილაცია'],
                                                                ['id' => 21, 'label' => 'სოლარიუმი'],
                                                                ['id' => 22, 'label' => 'კანის მოვლა']
                                                            ];
                                                        @endphp

                                                        @foreach($services as $key => $service)
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" type="checkbox"
                                                                       id="customCheckbox{{ $service['id'] }}"
                                                                       name="{{ $service['id'] }}"
                                                                       value="{{ $service['label'] }}">
                                                                <label for="customCheckbox{{ $service['id'] }}"
                                                                       class="custom-control-label"
                                                                       style="font-weight: normal">{{ $service['label'] }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{--=====  ღილაკები =====--}}
                                        <div class="card-body d-flex justify-content-center">
                                            <button type="submit" onclick="return confirm('შევქმნა სალონი?')" class="btn btn-primary">შექმნა</button>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </form>
                    </section>
        @endif
    </div><!-- /.row  -->

    @if(isset($salon->latitude) && isset($salon->longitude))
        <script>
            let map;

            function initMap() {
                var pos = {lat: {{$salon->latitude}}, lng: {{$salon->longitude}} };
                var opt = {
                    center: pos,
                    zoom: 15,
                };
                var myMap = new google.maps.Map(document.getElementById("map"), opt);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: myMap,
                    title: "სალონის დასახელება",
                    // icon: '',
                });
                var info = new google.maps.InfoWindow({
                    content: '<h3>{{$salon->name}}</h3><p>{{$salon->motto}}</p>'
                });
                marker.addListener("click", function () {
                    info.open(myMap, marker);
                });
            }

            window.initMap = initMap;
        </script>
    @endif
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVdkMPL-Jni-AN60M-aZEzzV3H-yzqJbs&callback=initMap&v=weekly"
        defer
    ></script>
@endsection




