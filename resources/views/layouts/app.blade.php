<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rehan's Website">
    <meta name="author" content="Rayhan Yulanda">
    <!-- Favicon -->
    <link href="{{ $config['DEVELOPER_FAVICON'] }}" rel="icon" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title id="title">{{ config('app.name', '') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/nunito.css')}}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
{{--
<link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet">

<link href="{{ asset("assets/pack/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet" >
<link href="{{ asset("assets/pack/font-awesome/css/fontawesome.min.css")}}" rel="stylesheet" >
<link href="{{ asset("assets/pack/font-awesome/css/all.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/datatables/datatables.net-bs4/css/jquery.dataTables.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/css/buttons.dataTables.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/datatables/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/datatables/datatables.net-select-bs4/css/select.bootstrap4.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/coreui-2.1.16/dist/css/coreui.min.css")}}" rel="stylesheet" />
<link href="{{ asset("assets/pack/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css")}}" rel="stylesheet" />
--}}

    <!-- Custom -->
    @yield('css')
    @yield('styles')
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
@include('layouts.sidebar')
<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
            {{--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>--}}
            <!-- Topbar Title -->
                {{--<h1 class="h3 text-gray-800 text-uppercase">{{Request::segment(2)}}</h1>--}}
                <h1 class="h3 text-gray-800 text-uppercase">{{config('app.name')}}</h1>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                {{--<li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>--}}

                <!-- Nav Item - Messages -->
                    {{--<li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 ">{{ Auth::user()->full_name }}</span>
                            <img class="img-profile rounded-circle" width="60px" height="60px" src="{{route('admin.image', ['path' => 'avatar', 'filename'=>Auth::user()->getImageAttribute()])}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            {{--<a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Settings') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Activity Log') }}
                            </a>--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>{{$config['DEVELOPER_COPYRIGHT']}}</span><br>
                    <a href='{{$config['DEVELOPER_SOCMED_WA']}}'  class='btn btn-success btn-circle btn-sm'><i class='fab fa-whatsapp'></i></a>
                    <a href='{{$config['DEVELOPER_SOCMED_PLAYSTORE']}}'  class='btn btn-info btn-circle btn-sm'><i class='fab fa-google-play'></i></a>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
{{--
<script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset("assets/pack/datatables/datatables.net-bs4/js/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/js/dataTables.buttons.min.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/js/buttons.colVis.min.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/js/buttons.print.min.js")}}"></script>

<script src="{{ asset("assets/pack/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{ asset("assets/pack/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{ asset("assets/pack/datatables/datatables.net-buttons-bs4/js/buttons.html5.min.js")}}"></script>

<script src="{{ asset("assets/pack/jquery/jquery.min.js")}}"></script>
<script src="{{ asset("assets/pack/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{ asset("assets/pack/coreui-2.1.16/dist/js/coreui.min.js")}}"></script>

<script src="{{ asset("assets/pack/select2/js/select2.full.min.js")}}"></script>
<script src="{{ asset("assets/pack/moment/min/moment.min.js")}}">untuk waktu berdasarkan jam indo</script>
<script src="{{ asset("assets/pack/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset("assets/pack/datatables/datatables.net-select-bs4/js/select.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/pack/dropzone/dropzone.min.js")}}"></script>
<script src="{{ asset("assets/pack/popperjs/popper.min.js")}}"></script>--}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/notify/bootstrap-notify.js') }}"></script>
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        ///////Show success and error from form//////
        @if ($errors->any())
        {{--@foreach ($errors->all() as $error)--}}
        showErrorMessage("{{ $errors->first() }}");
        {{--@endforeach--}}
        @endif

        @if ($message = Session::get('success'))
        showSuccessMessage("{{ $message }}");
        @endif
        ///////End Show success and error from form//////

        ///////Topbar title get from nav-item active//////
        /*var currentMenu = $(".nav-item.active").find("span")[0].innerHTML;
        $("#topbarTitle").text(currentMenu);
        $("#title").text(currentMenu);*/

        //Sweet Alert Logout
        $("#logout-alert").on('click', function(event){

        });

        //Hide menu if mobile device
        if (isMobileDevice()){
            $("#accordionSidebar").addClass("toggled");
        }
    });
</script>
@stack('scripts')
</body>
</html>
