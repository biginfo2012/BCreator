<header class="" id="header">
    <div class="head_inner">
        <div class="fx-bet fx-itc">
            <div class="head_logo">
                <a class="logo_a" href="{{url('/')}}" title="b-Creator:21リニューアル_テスト" rel="home">
                    <img class="logo" src="{{asset('images/logo.png')}}">
                </a>
                <span class="sm-sub">稼ぐ力を身につける<br>フリーランス養成講座</span>
            </div>
            <div class="head_item">
                <nav class="off-base navbar-offcanvas-right anime navbar-offcanvas offcanvas-collapse" role="navigation"
                     id="sm-offcanvas">
                    <ul id="menu-main_nav" class="ul-hnav navbar-nav">
                        <li id="menu-item-82"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-82 nav-item"><a
                                href="{{route('about')}}"
                                class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">b-Creatorについて</a>
                        </li>
                        <li id="menu-item-86"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86 nav-item"><a
                                href="{{route('curriculum')}}"
                                class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">学習内容</a></li>
                        <li id="menu-item-83"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83 nav-item"><a
                                href="{{route('faq')}}"
                                class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">よくある質問</a>
                        </li>
                        <li id="menu-item-84"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-84 nav-item"><a
                                href="{{route('price')}}"
                                class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">受講料金</a></li>
                        <li id="menu-item-85"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85 nav-item"><a
                                href="{{route('voice')}}"
                                class="nav-link  menu-item menu-item-type-post_type menu-item-object-page">受講生の声</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <button type="button" class="m-toggle pc-hidden offcanvas-toggle anime" data-toggle="offcanvas"
                    data-target="#sm-offcanvas">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="wrp-head_btn flex fx-itc">
                @if(!isset(\Illuminate\Support\Facades\Auth::user()->email))
                    <a href="{{route('login')}}" class="head_btn1">ログイン</a>
                @elseif(Auth::user()->role == 1)
                    <a href="{{route('master.dashboard')}}" class="head_btn1">ログイン</a>
                @elseif(Auth::user()->role == 3)
                    <a href="{{route('mypage')}}" class="head_btn1">ログイン</a>
                @else
                    <a href="{{route('setup')}}" class="head_btn1">ログイン</a>
                @endif
                <a href="{{ route('reserve') }}" class="head_btn2">
                    <span>無料カウンセリング</span>
                    <span>Webで予約する<i class="fas fa-angle-right"></i></span>
                    <span class="h-fix-btn">無料カウンセリングを予約する</span>
                </a>
            </div>
        </div>
    </div>
</header>
