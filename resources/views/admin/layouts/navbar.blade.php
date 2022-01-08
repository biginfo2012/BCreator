<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar ">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <a class="nav-link p-0 leading-none d-flex" data-toggle="dropdown" href="#">
                <span class="avatar avatar-md brround"
                      style="background-image: url({{ asset('images/faces/male/25.jpg')}})"></span>
                <span class="ml-2 "><span class="text-dark app-sidebar__user-name font-weight-semibold">平沢 岳史</span><br>
									<span class="text-muted app-sidebar__user-name text-sm"> hinata合同会社</span>
								</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="{{ route('master.profile') }}"><i class="dropdown-icon mdi mdi-account-outline"></i>
                    プロフィール</a>
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
{{--                <a class="dropdown-item" href="{{ route('master.options') }}login.html"><i class="dropdown-icon mdi mdi-logout-variant"></i>--}}
{{--                    ログアウト</a>--}}
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item {{ str_contains(\Request::route()->getName(), 'dashboard') ? 'active' : '' }}"
               href="{{route('master.dashboard')}}"><i class="side-menu__icon fa fa-window-restore"></i><span
                    class="side-menu__label">ダッシュボード</span></a>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'curriculum') ? 'is-expanded' : '' }}">
            <a class="side-menu__item "
               data-toggle="slide" href="#">
                <i class="side-menu__icon fa fa-folder"></i>
                <span class="side-menu__label">カリキュラム</span>
                <i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-curriculum') }}" class="slide-item">カリキュラム一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-curriculum') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'lesson') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i
                    class="side-menu__icon fa fa-pencil-square"></i><span class="side-menu__label">レッスン</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-lesson') }}" class="slide-item">レッスン一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-lesson') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'review') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i
                    class="side-menu__icon fa fa-file-text-o"></i><span class="side-menu__label">復習</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-review') }}" class="slide-item">復習一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-review') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'test') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-files-o"></i><span
                    class="side-menu__label">テスト</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-test') }}" class="slide-item">テスト一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-test') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'gallery') || str_contains(\Request::route()->getName(), 'media-new') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-photo"></i><span
                    class="side-menu__label">メディア</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.gallery') }}" class="slide-item">ライブラリ</a>
                </li>
                <li>
                    <a href="{{ route('master.media-new') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'user') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span
                    class="side-menu__label">ユーザー</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-user') }}" class="slide-item">ユーザー一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-user') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="side-menu__item {{ str_contains(\Request::route()->getName(), 'payments') ? 'active' : '' }}" href="{{ route('master.payments') }}">
                <i class="side-menu__icon fa fa-credit-card"></i><span
                    class="side-menu__label">支払い管理</span></a>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'reserve') || str_contains(\Request::route()->getName(), 'contact') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i
                    class="side-menu__icon mdi mdi-account-location"></i><span class="side-menu__label">お問合せ</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.reserve') }}" class="slide-item">カウンセリング予約</a>
                </li>
                <li>
                    <a href="{{ route('master.contact') }}" class="slide-item">ユーザー問合せ</a>
                </li>
            </ul>
        </li>
        <li class="slide {{ str_contains(\Request::route()->getName(), 'notice') ? 'is-expanded' : '' }}">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-bell-o"></i><span
                    class="side-menu__label">運営からの通知</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{ route('master.edit-notice') }}" class="slide-item">お知らせ一覧</a>
                </li>
                <li>
                    <a href="{{ route('master.post-notice') }}" class="slide-item">新規追加</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="side-menu__item {{ str_contains(\Request::route()->getName(), 'options') ? 'active' : '' }}"
               href="{{ route('master.options') }}"><i class="side-menu__icon mdi mdi-settings"></i><span
                    class="side-menu__label">設定</span></a>
        </li>
        <li>
            <a class="side-menu__item {{ str_contains(\Request::route()->getName(), 'faq') ? 'active' : '' }}" href="{{ route('master.faq') }}"><i class="side-menu__icon mdi mdi-compass-outline"></i><span
                    class="side-menu__label">ヘルプ</span></a>
        </li>
    </ul>
</aside>
