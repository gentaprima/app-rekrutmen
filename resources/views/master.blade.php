<?php

use Illuminate\Support\Facades\Session;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="{{asset('css_dashboard/plugins/jqvmap/jqvmap.min.css')}}"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css_dashboard/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('css_dashboard/plugins/summernote/summernote-bs4.min.css')}}">
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
    <script src="{{asset('css_dashboard/plugins/jquery/jquery.min.js')}}"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    @if (Session::has('message'))
    <p hidden="true" id="message">{{ Session::get('message') }}</p>
    <p hidden="true" id="icon">{{ Session::get('icon') }}</p>
    @endif
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('logo.png')}}" alt="AdminLTELogo" style="width:150px;height:150px;">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow" style="border-bottom: none !important;height:70px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">PT.XYZ</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link mb-3" style="height: 70px;border:none!important;">
                <img src="{{asset('/logo.png')}}" alt="AdminLTE Logo" class="brand-image bb-2" style="width: 150px;max-height:76px !important;">
                <span class="brand-text font-weight-light" style="color:#343a40">.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-4 pb-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <div id="menu-group">

                        </div>
               <!-- Admin -->
                          <div id="menuAdmin">
                            <li class="nav-item">
                                <a href="/dashboard-admin" class="nav-link {{ Request::is('dashboard-admin') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Data Pelamar
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" onclick="logout()"  class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                            
                            </div>
                            <!-- users -->
                            <div id="menuUser">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Form Lamaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/data-pelamar" id="link-data-pelamar" class="nav-link {{ Request::is('data-pelamar') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Data Lamaran
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" onclick="logout()" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                            </div>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?> <a href="#">PT. XYZ</a>.</strong>
        All rights reserved.
        <!-- <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div> -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('css_dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('css_dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('css_dashboard/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('css_dashboard/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <!-- <script src="{{asset('css_dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('css_dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{asset('css_dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('css_dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('css_dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('css_dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('css_dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="{{asset('css_dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('css_dashboard/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{asset('css_dashboard/dist/js/demo.js')}}"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('css_dashboard/dist/js/pages/dashboard.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // LOAD MENU
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })
        let icon = document.getElementById('icon');
        if (icon != null) {
            let message = document.getElementById('message');
            Toast.fire({
                icon: icon.innerHTML,
                title: message.innerHTML
            });
        }

        function logout(){
            window.localStorage.clear();
            window.localStorage.removeItem('login')
            window.localStorage.removeItem('role')
            window.localStorage.removeItem('id')
            window.localStorage.removeItem('token')
            window.location.replace('/');
        }

        if(localStorage.getItem('role') == 1){
            document.getElementById("menuAdmin").hidden = false
            document.getElementById("menuUser").hidden = true
        }else{
            document.getElementById("menuAdmin").hidden = true
            document.getElementById("menuUser").hidden = false

        }

        // window.localStorage.clear();

        document.getElementById("link-data-pelamar").href = `/data-pelamar/${localStorage.getItem('id')}`;
    </script>


</body>

</html>