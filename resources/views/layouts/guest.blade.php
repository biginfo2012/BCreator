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

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="page-template page-template-page-login page-template-page-login-php page page-id-92 logged-in wp-embed-responsive">
        <main role="main">
            {{ $slot }}
        </main>
    </body>
</html>
