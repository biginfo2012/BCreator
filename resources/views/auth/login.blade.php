<x-app-layout>
    <style>

    </style>
    <div class="bread-box bg_white">
        <div class="container">             <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト."
                   href="{{ url('') }}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">ログイン</span>
                <meta property="url" content="{{ route('login') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>

    <div class="fix-box bg_white" id="login">
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-box">
                    <div class="title"><a href="{{ url('') }}"> <img src="{{ asset('images/logo.png') }}"> </a>
                        <span>ログイン</span></div>
                    <div class="wrp-input-box">
                        <x-auth-validation-errors class="mb-1" :errors="$errors" />
                        <div class="item mail"><input type="text" name="email" placeholder="メールアドレス(ユーザー名)" required></div>
                        <div class="item pass"><input type="password" name="password" placeholder="パスワード(8文字以上)" minlength="8" required></div>
                        <div class="item save"><label><input id="remember_me" type="checkbox" name="remember">ログイン情報を保存する</label></div>
                    </div>
                    <div class="box"><button class="login-btn border-0">ログイン</button> <span class="forgot">パスワードを忘れた場合は<a
                                href="{{ route('password.request') }}">こちら</a></span></div>
                </div>
            </form>

            <div class="wrp-new-class"><a href="{{ route('register') }}">b-Creator新規受講はこちら</a></div>
        </div>
    </div>
    <div class="cv-box">
        <div class="container">
            <div class="cv-title"><span>WEBを学びたいなら受けなきゃ損</span> <span>まずは、1時間の無料カウンセリングから!</span></div>
            <div class="content">
                <div class="fx-bet fx-wrp">
                    <div class="i-32"><a href="{{ route('counseling') }}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{ asset('images/about.png') }}"></div>
                                <div class="content"><span class="pc-hidden">今すぐ受けたくなる!</span> <span>無料カウンセリングとは<i
                                            class="fas fa-angle-right"></i></span></div>
                            </div>
                        </a>
                        <div class="title"><span>3分でわかる！<br class="pad-block">無料カウンセリング</span> <span>今すぐ受けたくなる<br>無料カウンセリングをカンタン解説</span>
                        </div>
                    </div>
                    <div class="i-32"><a href="tel:000-000-000">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{ asset('images/tel.png') }}"></div>
                                <div class="content"><span class="sm-hidden">TEL</span> <span class="pc-hidden"><span
                                            class="sub">平日/休日 9:00~18:00</span><br>TEL：000-000-000</span></div>
                            </div>
                        </a>
                        <div class="title"><span>000-000-000</span> <span>平日/休日 9:00~18:00<br>(年末年始・祝日を除く)</span></div>
                    </div>
                    <div class="i-32"><a href="{{ route('reserve') }}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{ asset('images/reserve.png') }}"></div>
                                <div class="content"><span class="pc-hidden">30秒でできる！カンタン予約</span> <span>Web予約はこちら<i
                                            class="fas fa-angle-right"></i></span></div>
                            </div>
                        </a>
                        <div class="title"><span>30秒でできる！<br class="pad-block">カンタンWeb予約</span> <span>プロのコンサルタントが<br>無料でカウンセリングをします</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Session Status -->--}}
{{--        <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}
{{--            <div class="wrp-input-box">--}}
{{--                <!-- Email Address -->--}}
{{--                <div class="item mail">--}}
{{--                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="メールアドレス"/>--}}
{{--                </div>--}}
{{--                <!-- Password -->--}}
{{--                <div class="item pass">--}}
{{--                    <x-input id="password" class="block mt-1 w-full"--}}
{{--                             type="password"--}}
{{--                             name="password"--}}
{{--                             required autocomplete="current-password" placeholder="パスワード"/>--}}
{{--                </div>--}}
{{--                <!-- Remember Me -->--}}
{{--                <div class="item save">--}}
{{--                    <label for="remember_me" class="inline-flex items-center">--}}
{{--                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                        ログイン情報を保存する--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="box">--}}
{{--                <button class="login-btn">ログイン</button>--}}
{{--                <span class="forgot">パスワードを忘れた場合は<a href="{{ route('password.request') }}">こちら</a></span>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
</x-app-layout>
