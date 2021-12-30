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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" />

    <!-- Data table css -->
    <link href="{{ asset('plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Notifications  Css -->
    <link href="{{ asset('plugins/notify/css/jquery.growl.css') }}" rel="stylesheet" />

    <!-- c3.js Charts Plugin -->
    <link href="{{ asset('plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

    <link href="{{ asset('plugins/gallery/gallery.css') }}" rel="stylesheet">

    <!-- select2 Plugin -->
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- Time picker Plugin -->
    <link href="{{ asset('plugins/time-picker/jquery.timepicker.css') }}" rel="stylesheet" />

    <!-- Date Picker Plugin -->
    <link href="{{ asset('plugins/date-picker/spectrum.css') }}" rel="stylesheet" />

    <!-- Morris.js Charts Plugin -->
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

    <!-- WYSIWYG Editor css -->
    <link href="{{ asset('plugins/wysiwyag/richtext.css') }}" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="{{ asset('plugins/toggle-sidebar/css/sidemenu.css') }}" rel="stylesheet">

    <!-- file Uploads -->
    <link href="{{ asset('plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <!---Font icons-->
    <link href="{{ asset('plugins/iconfonts/plugin.css') }}" rel="stylesheet" />

    <!-- Dashboard Core -->
    <script src="{{ asset('js/vendors/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendors/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/vendors/selectize.min.js') }}"></script>
    <script src="{{ asset('js/vendors/jquery.tablesorter.min.js') }}"></script>
    <script src="{{ asset('js/vendors/circle-progress.min.js') }}"></script>
    <script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
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

<!-- Notifications js -->
<script src="{{ asset('plugins/notify/js/rainbow.js') }}"></script>
{{--<script src="{{ asset('plugins/notify/js/sample.js') }}"></script>--}}
<script src="{{ asset('plugins/notify/js/jquery.growl.js') }}"></script>
<!-- Fullside-menu Js-->
<script src="{{ asset('plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

<!-- Charts Plugin -->
<script src="{{ asset('plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ asset('plugins/chart/utils.js') }}"></script>

<!-- Input Mask Plugin -->
<script src="{{ asset('plugins/input-mask/jquery.mask.min.js') }}"></script>

<script src="{{ asset('js/index.js') }}"></script>
<!-- Data tables -->
<script src="{{ asset('plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>


<!--Select2 js -->
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

<!-- Timepicker js -->
<script src="{{ asset('plugins/time-picker/jquery.timepicker.js') }}"></script>
<script src="{{ asset('plugins/time-picker/toggles.min.js') }}"></script>

<!-- Datepicker js -->
<script src="{{ asset('plugins/date-picker/spectrum.js') }}"></script>
<script src="{{ asset('plugins/date-picker/jquery-ui.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.maskedinput.js') }}"></script>

<!-- file uploads js -->
<script src="{{ asset('plugins/fileuploads/js/dropify.min.js') }}"></script>

<!-- Inline js -->
<script src="{{ asset('js/select2.js') }}"></script>

<!-- WYSIWYG Editor js -->
<script src="{{ asset('plugins/wysiwyag/jquery.richtext.js') }}"></script>

<!-- Gallery js -->
<script src="{{ asset('plugins/gallery/picturefill.js') }}"></script>
<script src="{{ asset('plugins/gallery/lightgallery.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-pager.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-autoplay.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-fullscreen.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-zoom.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-hash.js') }}"></script>
<script src="{{ asset('plugins/gallery/lg-share.js') }}"></script>

<!-- Custom scroll bar Js-->
<script src="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!-- Custom Js-->
<script src="{{ asset('js/custom.js') }}"></script>
<!-- common Js-->
<script src="{{ asset('js/common.js') }}"></script>
<!-- WYSIWYG Editor js -->
<script>
    let token = '{{csrf_token()}}';
    let save_curriculum = '{{route('master.save-curriculum')}}';
    let delete_curriculum = '{{route('master.delete-curriculum')}}';
    let restore_curriculum = '{{route('master.restore-curriculum')}}';
    let complete_delete_curriculum = '{{route('master.complete-delete-curriculum')}}';
    let empty_trash_curriculum = '{{route('master.empty-trash-curriculum')}}';

    let save_lesson = '{{route('master.save-lesson')}}';
    let delete_lesson = '{{route('master.delete-lesson')}}';
    let restore_lesson = '{{route('master.restore-lesson')}}';
    let complete_delete_lesson = '{{route('master.complete-delete-lesson')}}';
    let empty_trash_lesson = '{{route('master.empty-trash-lesson')}}';

    let save_review = '{{route('master.save-review')}}';
    let delete_review = '{{route('master.delete-review')}}';
    let restore_review = '{{route('master.restore-review')}}';
    let complete_delete_review = '{{route('master.complete-delete-review')}}';
    let empty_trash_review = '{{route('master.empty-trash-review')}}';

    let save_test = '{{route('master.save-test')}}';
    let delete_test = '{{route('master.delete-test')}}';
    let restore_test = '{{route('master.restore-test')}}';
    let complete_delete_test = '{{route('master.complete-delete-test')}}';
    let empty_trash_test = '{{route('master.empty-trash-test')}}';

    let save_notice = '{{route('master.save-notice')}}';
    let delete_notice = '{{route('master.delete-notice')}}';
    let restore_notice = '{{route('master.restore-notice')}}';
    let complete_delete_notice = '{{route('master.complete-delete-notice')}}';
    let empty_trash_notice = '{{route('master.empty-trash-notice')}}';

    lightGallery(document.getElementById('lightgallery'));
    $(function(e) {
        $('.content').richText();
    });
</script>
</body>
</html>
