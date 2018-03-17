<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/images/favicon.png')}}">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
     <!-- DataTable CSS -->
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Selectize -->
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylehsset">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@if (Auth::guest())
<style>
    body {
          background-image: url({{asset ('bg.jpg') }});
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;

         }
    </style>
@endif
</head>
@if (Auth::check())
<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="{{asset('/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                
                         <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>

                                <ul class="nav-item dropdown-menu" role="menu">
                                    <li><a href="{{ url('settings/password') }}"><i class="fa fa-btn fa-lock"></i> Ubah Password</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @if (Auth::check())
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    @role('admin')
                        <li>
                            <a href={{ url('/home') }} class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/members') }}" class="waves-effect"><i class="fa fa-user-circle  m-r-10" aria-hidden="true"></i>Karyawan</a>
                        </li>
                        <li>
                            <a href="{{ url('/karyawan/transaksibelis') }}" class="waves-effect"><i class="fa fa-handshake-o   m-r-10" aria-hidden="true"></i>Transaksi Beli</a>
                        </li>
                       
                      

                @endrole
                @role('member')
                        <li>
                            <a href={{ url('/home') }} class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/karyawan/motors') }}" class="waves-effect"><i class="fa fa-motorcycle  m-r-10" aria-hidden="true"></i>Motor</a>
                        </li>
                         <li>
                            <a href="{{ url('/karyawan/kategoris') }}" class="waves-effect"><i class="fa fa-motorcycle  m-r-10" aria-hidden="true"></i>Kategori</a>
                        </li>
                        <li>
                            <a href="{{ url('/karyawan/merks') }}" class="waves-effect"><i class="fa fa-motorcycle  m-r-10" aria-hidden="true"></i>Merk</a>
                        </li>
                       

                @endrole
                       
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        @endif
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">@yield('title')</h3>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
               <!--  <div class="row"> -->
                    <!-- Column -->
                    <!-- <div class="col-sm-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Daily Sales</h4>
                                <div class="text-right">
                                    <h2 class="font-light m-b-0"><i class="ti-arrow-up text-success"></i> $120</h2>
                                    <span class="text-muted">Todays Income</span>
                                </div>
                                <span class="text-success">80%</span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Column -->
               <!--  </div> --> 
                @include('layouts._flash')

                @yield('content')
                <!-- Row -->
               

               
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2018 Laramotor by Rahmat Hidayat
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('/assets/plugins/bootstrap/js/tether.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="{{asset('/assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/flot-data.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- DataTable JS -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/selectize.min.js') }}"></script>
                    @yield('scripts')
</body>

</html>
