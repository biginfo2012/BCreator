<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="msapplication-TileColor" content="#0061da">
    <meta name="theme-color" content="#1643a3">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

    <!-- Title -->
    <title>b-Creator_master</title>
    <link rel="stylesheet" href="{{ asset('fonts/fonts/font-awesome.min.css') }}">

    <!-- Font Family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <!-- Dashboard Css -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}assets/" rel="stylesheet" />


    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

    <!-- Morris.js Charts Plugin -->
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="{{ asset('plugins/toggle-sidebar/css/sidemenu.css') }}" rel="stylesheet">

    <!---Font icons-->
    <link href="{{ asset('plugins/iconfonts/plugin.css') }}" rel="stylesheet" />
</head>
<body class="app sidebar-mini rtl">
<div id="global-loader" ></div>
<div class="page">
    <div class="page-main">
        <!-- Navbar-->
        @include('admin.layouts.header')

        <!-- Sidebar menu-->
        @include('admin.layouts.navbar')
        <div class="app-content my-3 my-md-5">
            {{ $slot }}

            <!--footer-->
            @include('admin.layouts.footer')
            <!-- End Footer-->
        </div>
    </div>
</div>

<!-- Back to top -->
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

<!-- Dashboard Core -->
<script src="{{ asset('js/vendors/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/vendors/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('js/vendors/selectize.min.js') }}"></script>
<script src="{{ asset('js/vendors/jquery.tablesorter.min.js') }}"></script>
<script src="{{ asset('js/vendors/circle-progress.min.js') }}"></script>
<script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>
<!-- Fullside-menu Js-->
<script src="{{ asset('plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

<!-- Charts Plugin -->
<script src="{{ asset('plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('plugins/chart/utils.js') }}"></script>

<!-- Input Mask Plugin -->
<script src="{{ asset('plugins/input-mask/jquery.mask.min.js') }}"></script>

<script src="{{ asset('js/index1.js') }}"></script>

<!-- Custom scroll bar Js-->
<script src="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Custom Js-->
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
