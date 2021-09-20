<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="SmartHR - Payslips Generator">
        <meta name="author" content="Dan Mlayah">
        <meta name="robots" content="noindex, nofollow">
       <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SmartHR - HRMS admin</title>

        
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css')}}">   

    <!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    @stack('header_scripts')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Loader -->
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>
        <!-- /Loader -->

        <!-- Header -->
        @include('includes.header')
        <!-- /Header -->

        <!-- Sidebar -->
       @include('includes.menus')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
           @yield('content')
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" data-reff=""></div>

    <!-- jQuery -->  
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Select2 JS -->
	<script src="{{ asset('assets/js/select2.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/app.js')}}"></script>

    @stack('footer_scripts')

</body>

</html>
