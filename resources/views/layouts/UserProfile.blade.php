<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png+xml" href="{{asset('img/Logo.png')}}"/>
    <title>Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset(('dist/css/adminlte.min.css'))}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    {{--  Font Avesome  --}}
    <link rel="stylesheet" href="https://kit.fontawesome.com/d2c442d876.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d2c442d876.js" crossorigin="anonymous"></script>

    {{--  TinyMCE  --}}
    <script src="https://cdn.tiny.cloud/1/31d5dwwep5hnlxz7uqb156p2jbb3u7jx4ed2nlm16mfmgys6/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/Loader.gif')}}" alt="AdminLTELogo" height="186"
             width="300">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark fixed-top" style="background-color: #213e4b">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{'/'}}" class="nav-link">მთავარი</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="" class="nav-link">ჩვენს შესახებ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="" class="nav-link">კონტაქტი</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('გასვლა') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

        <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #213e4b">
        <!-- Brand Logo -->
        <a href="{{'/'}}" class="brand-link">


            <span class="brand-text font-weight-light">Myhair.ge</span>
        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{route('UserProfile')}}" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="true">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    @can('view', auth()->user())
                        <li class="nav-item menu">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt" style="color:springgreen"></i>
                                <p>
                                    ადმინისტრირება
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel')}}" class="nav-link">
                                        {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                        <p>ადმინ-პანელი</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel.Users')}}" class="nav-link">
                                        <p>მომხმარებლები</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel.Salons')}}" class="nav-link">
                                        <p>სალონები</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel.Staffs')}}" class="nav-link">
                                        <p>პერსონალი</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel.Categories')}}" class="nav-link">
                                        <p>სპეციალობები</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('AdminPanel.Citylist')}}" class="nav-link">
                                        <p>ქალაქები</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan


                    <li class="nav-item menu">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-user pr-2"></i>
                            <p>
                                პროფილი
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('UserProfile')}}" class="nav-link">
                                    {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                    <p>ინფორმაცია</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Reservations')}}" class="nav-link">
                                    {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                    <p>ჯავშნები</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item menu">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-scissors pr-2"></i>
                            <p>
                                სალონი
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            @if(Auth::user()->phone == '')
                                <li class="nav-item">
                                    <a href="{{route('UserProfile.edit', Auth::user()->id)}}" class="nav-link">
                                        <p>სალონის გასახსნელად შეავსეთ პირადი ინფორმაცია</p>
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->phone != '')
                                <li class="nav-item">
                                    <a href="{{route('Job')}}" class="nav-link">
                                        {{--                                    <i class="far fa-circle nav-icon"></i>--}}
                                        <p>სტატუსი</p>
                                    </a>
                                </li>
                            @endif

                            @if((Auth::user()->access == 'Manager' || Auth::user()->access == 'Admin') && Auth::user()->phone != '')
                                <li class="nav-item">
                                    <a href="{{route('Job.Beautysalon')}}" class="nav-link">
                                        <p>სილამაზის სალონი</p>
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->access == 'Staff' || Auth::user()->access == 'Manager' || Auth::user()->access == 'Admin')
                                <li class="nav-item">
                                    <a href="{{route('Staff')}}" class="nav-link">
                                        <p>პერსონალი</p>
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->access == 'Staff' || Auth::user()->access == 'Manager' || Auth::user()->access == 'Admin')
                                <li class="nav-item">
                                    <a href="{{route('Events')}}" class="nav-link">
                                        <p>დაჯავშნული ვიზიტები</p>
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->staffstatus == 'Manager')
                                <li class="nav-item">
                                    <a href="{{route('Manager', [Auth::user()->id])}}" class="nav-link">
                                        <p>მენეჯერი</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="nav-item menu">
                        <a href="{{route('Manual')}}" class="nav-link">
                            <i class="fa-solid fa-book-open pr-2"></i>
                            <p>
                                სახელმძღვანელო
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu">
                        <a href="#" class="nav-link">
                            <i class="fa-regular fa-calendar-days pr-2"></i>
                            <p>
                                კალენდარი
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                {{--  კალენდარი   --}}
                                <div class="card bg-gradient-primary" hidden>
                                    <div class="card-footer bg-transparent">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <div id="sparkline-1"></div>
                                                <div class="text-white">Visitors</div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-4 text-center">
                                                <div id="sparkline-2"></div>
                                                <div class="text-white">Online</div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-4 text-center">
                                                <div id="sparkline-3"></div>
                                                <div class="text-white">Sales</div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>

                                <div class="card bg-gradient-navy">
                                    <div class="card-header border-0">
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0">
                                        <!--The calendar -->
                                        <div id="calendar" style="width: 100%"></div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{--  /კალენდარი   --}}
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5">

    {{-- კონტენტი --}}
    <!-- Content Header (Page header) -->
    @yield('header')

    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


            @yield('body')


            <!-- /.Left col -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Davitius</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            {{--        <b>Version</b> 3.2.0--}}
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>


<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

<script>
    let popup = document.getElementById('mypopup'),
        popupToggle = document.getElementById('myBtn');
    popupClose = document.querySelector('.close');

    popupToggle.onclick = function () {
        popup.style.display = "block";
    }

    popupClose.onclick = function () {
        popup.style.display = "none";
    }

    window.onclick = function (e) {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    }
</script>

{{-- TinyMCE --}}
<script>
    tinymce.init({
        selector: '.tiny',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>



