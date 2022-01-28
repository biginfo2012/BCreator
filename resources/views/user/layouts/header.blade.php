<header class="" id="my_header">
    <div class="my_head_inner">
        <div class="fx-bet fx-itc">
            <div class="my_head-item">
                <div class="flex">
                    <a class="logo_a" href="{{ url('') }}" title="b-Creator:21リニューアル_テスト" rel="home">
                        <img class="logo" src="{{ asset('images/logo.png') }}">
                    </a>
                    <nav class="off-base navbar-offcanvas-right anime navbar-offcanvas offcanvas-collapse"
                         role="navigation" id="sm-offcanvas">
                        <div class="pc-hidden">
                            <div class="sm_my_head_set">
                                <div class="flex fx-coc fx-itc">
                                    <div class="item"><img src="{{ asset('images/no_img_head.png') }}"></div>
                                    <div class="item">
                                        <span>{{ \Illuminate\Support\Facades\Auth::user()->first_name }}  {{ \Illuminate\Support\Facades\Auth::user()->last_name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role == 3 || Auth::user()->role == 1)
                            <ul id="menu-member_nav" class="ul-hnav navbar-nav">
                                <li id="menu-item-96"
                                    class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-94 current_page_item menu-item-96 nav-item active">
                                    <a href="{{ route('mypage') }}"
                                       class="nav-link  menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-94 current_page_item">ダッシュボード</a>
                                </li>
                                <li id="menu-item-103"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103 nav-item">
                                    <a href="{{ route('archive-curriculum') }}"
                                       class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">カリキュラム一覧</a>
                                </li>
                                <li id="menu-item-106"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-106 nav-item">
                                    <a href="{{ route('archive-test') }}"
                                       class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">テスト一覧</a>
                                </li>
                                <li id="menu-item-110"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110 nav-item">
                                    <a href="{{ route('myfaq') }}"
                                       class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">ヘルプ</a>
                                </li>
                            </ul>
                        @endif

                        <div class="pc-hidden">
                            <div class="sm_my_head_ab">
                                <a href="{{ route('mypage') }}">ダッシュボード</a>
                                <a href="{{ route('setup') }}">アカウント設定</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        ログアウト
                                    </a>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <button type="button" class="m-toggle pc-hidden offcanvas-toggle anime" data-toggle="offcanvas" data-target="#sm-offcanvas">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="my_head_btn flex fx-itc">
                <div class="wrp_my_head_set">
                    <div class="my_head_set">
                        <div class="flex fx-itc">
                            <div class="item"><img src="{{ asset('images/no_img_head.png') }}"></div>
                            <div class="item">
                                <span>{{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->first_name . ' ' . Auth::user()->last_name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="my_head_ab" style="z-index: 1">
                        <a href="{{ route('mypage') }}">ダッシュボード</a>
                        <a href="{{ route('setup') }}">アカウント設定</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                ログアウト
                            </a>
                        </form>
                    </div>
                </div>
                <div class="wrp_head_notice_box"><a class="notice_bell" id="notice_bell"><i class="far fa-bell"></i></a>
                    <div class="head_notice_box" style="z-index: 1;">
                        <div class="title"><span>お知らせ</span></div>
                        <div class="box" id="notice">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
