<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="{{ asset('js/wp-emoji-release.min.js') }}" type="text/javascript"
                defer=""></script>
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.offcanvas.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/member.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flexvideo.css') }}">
{{--        <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/jquery-migrate.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/slick.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/bootstrap.offcanvas.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/velocity.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/velocity.ui.min.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/my.js') }}" type="text/javascript"
                defer=""></script>
        <script src="{{ asset('js/anime.js') }}" type="text/javascript"
                defer=""></script>
{{--        <script src="{{ asset('js/app.js') }}" defer></script>--}}
        <style type="text/css">
            .recentcomments a {
                display: inline !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        </style>
    </head>
    <body class="page-template page-template-page-about page-template-page-about-php page page-id-70 logged-in wp-embed-responsive">
        <!-- Page Heading -->
        @include('layouts.header')

        <!-- Page Content -->
        <main role="main">
            {{ $slot }}
        </main>

        <!-- Page Ending -->
        @include('layouts.footer')
    </body>
</html>
