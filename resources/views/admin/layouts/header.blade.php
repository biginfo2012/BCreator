<!-- Navbar-->
<header class="app-header header">

    <!-- Sidebar toggle button-->
    <!-- Navbar Right Menu-->
    <div class="container-fluid">
        <div class="d-flex">
            <a class="header-brand" href="{{url('/')}}">
                <img alt="vobilet logo" class="header-brand-img" src="{{asset('images/logo.png')}}">
            </a>

            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
            <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                    <a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#">
                        <span class="avatar avatar-md brround" style="background-image: url(assets/images/faces/female/25.jpg)"></span>
                        <span class="ml-2 d-none d-lg-block">
											<span class="text-white">平沢 岳史</span>
										</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{ route('master.profile') }}"><i class="dropdown-icon mdi mdi-account-outline"></i> プロフィール</a>
                        <a class="dropdown-item" href="{{ route('master.options') }}"><i class="dropdown-icon mdi mdi-settings"></i> 設定</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('master.faq') }}"><i class="dropdown-icon mdi mdi-compass-outline"></i> ヘルプ</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="dropdown-icon mdi mdi-logout-variant"></i> ログアウト
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
