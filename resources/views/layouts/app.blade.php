<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700&family=Noto+Serif+JP:wght@200;300;400;500;600;700;900&display=swap"
              rel="stylesheet">    <!--wordpress head--> <title>b-Creator:21リニューアル_テスト</title>
        <meta name='robots' content='noindex, nofollow'/>
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
        <link rel='dns-prefetch' href='//s.w.org'/>
        <style type="text/css"> img.wp-smiley, img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            } </style>
        <link rel='stylesheet' id='wp-block-library-css' href="{{ asset('css/dist-block-library-style.min.css') }}" type='text/css'
              media='all'/>
        <style id='wp-block-library-theme-inline-css' type='text/css'>
            #start-resizable-editor-section {
                display: none
            }

            .wp-block-audio figcaption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .wp-block-audio figcaption {
                color: hsla(0, 0%, 100%, .65)
            }

            .wp-block-code {
                font-family: Menlo, Consolas, monaco, monospace;
                color: #1e1e1e;
                padding: .8em 1em;
                border: 1px solid #ddd;
                border-radius: 4px
            }

            .wp-block-embed figcaption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .wp-block-embed figcaption {
                color: hsla(0, 0%, 100%, .65)
            }

            .blocks-gallery-caption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .blocks-gallery-caption {
                color: hsla(0, 0%, 100%, .65)
            }

            .wp-block-image figcaption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .wp-block-image figcaption {
                color: hsla(0, 0%, 100%, .65)
            }

            .wp-block-pullquote {
                border-top: 4px solid;
                border-bottom: 4px solid;
                margin-bottom: 1.75em;
                color: currentColor
            }

            .wp-block-pullquote__citation, .wp-block-pullquote cite, .wp-block-pullquote footer {
                color: currentColor;
                text-transform: uppercase;
                font-size: .8125em;
                font-style: normal
            }

            .wp-block-quote {
                border-left: .25em solid;
                margin: 0 0 1.75em;
                padding-left: 1em
            }

            .wp-block-quote cite, .wp-block-quote footer {
                color: currentColor;
                font-size: .8125em;
                position: relative;
                font-style: normal
            }

            .wp-block-quote.has-text-align-right {
                border-left: none;
                border-right: .25em solid;
                padding-left: 0;
                padding-right: 1em
            }

            .wp-block-quote.has-text-align-center {
                border: none;
                padding-left: 0
            }

            .wp-block-quote.is-large, .wp-block-quote.is-style-large {
                border: none
            }

            .wp-block-search .wp-block-search__label {
                font-weight: 700
            }

            .wp-block-group.has-background {
                padding: 1.25em 2.375em;
                margin-top: 0;
                margin-bottom: 0
            }

            .wp-block-separator {
                border: none;
                border-bottom: 2px solid;
                margin-left: auto;
                margin-right: auto;
                opacity: .4
            }

            .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
                width: 100px
            }

            .wp-block-separator.has-background:not(.is-style-dots) {
                border-bottom: none;
                height: 1px
            }

            .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
                height: 2px
            }

            .wp-block-table thead {
                border-bottom: 3px solid
            }

            .wp-block-table tfoot {
                border-top: 3px solid
            }

            .wp-block-table td, .wp-block-table th {
                padding: .5em;
                border: 1px solid;
                word-break: normal
            }

            .wp-block-table figcaption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .wp-block-table figcaption {
                color: hsla(0, 0%, 100%, .65)
            }

            .wp-block-video figcaption {
                color: #555;
                font-size: 13px;
                text-align: center
            }

            .is-dark-theme .wp-block-video figcaption {
                color: hsla(0, 0%, 100%, .65)
            }

            .wp-block-template-part.has-background {
                padding: 1.25em 2.375em;
                margin-top: 0;
                margin-bottom: 0
            }

            #end-resizable-editor-section {
                display: none
            }
        </style>
        <link rel='stylesheet' id='style-css' href='{{ asset('css/bootstrap-basic4-style.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' id='slick-css' href='{{ asset('css/themes-bootstrap-basic4-child-assets-plugin-slick-slick.css') }}'
              type='text/css' media='all'/>
        <link rel='stylesheet' id='slicktheme-css'
              href='{{ asset('css/themes-bootstrap-basic4-child-assets-plugin-slick-slick-theme.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' id='offcanvas-style-css'
              href='{{ asset('css/themes-bootstrap-basic4-child-assets-css-bootstrap.offcanvas.min.css') }}' type='text/css'
              media='all'/>
        <link rel='stylesheet' id='bootstrap-basic4-main-css' href='{{ asset('css/bootstrap-basic4-assets-css-main.css') }}'
              type='text/css' media='all'/>
        <link rel='stylesheet' id='bootstrap4-css' href='{{ asset('css/bootstrap-basic4-assets-css-bootstrap.min.css') }}'
              type='text/css' media='all'/>
        <link rel='stylesheet' id='bootstrap-basic4-font-awesome5-css'
              href='{{ asset('css/bootstrap-basic4-assets-fontawesome-css-all.min.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' id='mycommon-css' href='{{ asset('css/themes-bootstrap-basic4-child-assets-css-common.css') }}'
              type='text/css' media='all'/>
        <link rel='stylesheet' id='bootstrap-basic4-wp-main-css' href='{{ asset('css/themes-bootstrap-basic4-child-style.css') }}'
              type='text/css' media='all'/>
        <link rel='stylesheet' id='member-css' href='{{ asset('css/member.css') }}' type='text/css'
              media='all'/>
        <!--カレンダー用プラグイン-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
        <link rel='stylesheet' id='style-css' href='{{ asset('css/common.css') }}' type='text/css' media='all'/>

        <!-- Scripts -->
        <script type='text/javascript' src='{{asset('js/jquery-3.6.0.min.js')}}' id='jquery-core-js'></script>
        <script type='text/javascript' src='{{asset('js/jquery.validate.min.js')}}'></script>
        <script type='text/javascript' src='{{asset('js/jquery-jquery-migrate.min.js')}}' id='jquery-migrate-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-plugin-slick-slick.min.js')}}'
                id='slick-js-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-js-bootstrap.offcanvas.min.js')}}'
                id='offcanvas-js-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-plugin-velocity-velocity.min.js')}}'
                id='velocity-js-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-plugin-velocity-velocity.ui.min.js')}}'
                id='velocity_ui-js-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-js-my.js')}}' id='my-js-js'></script>
        <script type='text/javascript' src='{{asset('js/themes-bootstrap-basic4-child-assets-js-anime.js')}}'
                id='anime-js-js'></script>
        <!--カレンダー用プラグイン-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
        <style type="text/css">
            .recentcomments a {
                display: inline !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        </style>
    </head>
    <body class="home page-template page-template-page-{{\Request::route()->getName()}} page-template-page-{{\Request::route()->getName()}}-php page page-id-{{isset($id) ? $id : ''}} logged-in wp-embed-responsive">
        <!-- Page Heading -->
        @include('layouts.header')

        <!-- Page Content -->
        <main role="main">
            {{ $slot }}
        </main>

        <!-- Page Ending -->
        @include('layouts.footer')
        <!--WordPress footer-->
        <script type='text/javascript' src='{{asset('js/7hg-comment-reply.min.js')}}' id='comment-reply-js'></script>
        <script type='text/javascript' src='{{asset('js/bootstrap-basic4-assets-js-bootstrap.bundle.min.js')}}'
                id='bootstrap4-bundle-js'></script>
        <script type='text/javascript' src='{{asset('js/bootstrap-basic4-assets-js-main.js')}}' id='bootstrap-basic4-main-js'></script>
        <script type='text/javascript' src='{{ asset('js/0ca-wp-embed.min.js') }}' id='wp-embed-js'></script><!--end WordPress footer-->


    </body>
</html>
