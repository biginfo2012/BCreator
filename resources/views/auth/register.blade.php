<x-app-layout>
{{--    <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}
    <style>
        .wrp-input-box .item input[type="text"] {
            padding: 12px 35px 12px 20px !important;
        }
    </style>
    <div class="bread-box bg_white">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト." href="{{ url('') }}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">受講手続き</span>
                <meta property="url" content="{{ route('login') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box bg_white" id="regist">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="regist-box">
                    <div class="title">
                        <a href="{{ url('') }}">
                            <img src="{{ asset('images/logo.png') }}">
                        </a>
                        <div class="regist-flow">
                            <div class="item c1 active">
                                <span>アカウント情報</span>
                            </div>
                            <div class="item c2">
                                <span>支払方法</span>
                            </div>
                            <div class="item c3">
                                <span>登録完了</span>
                            </div>
                        </div>
                    </div>
                    <div class="wrp-input-box">
                        <div class="box name">
                            <input type="text" name="first_name" placeholder="姓" autocomplete="family-name" required>
                            <input type="text" name="last_name" placeholder="名" autocomplete="given-name" required>
                        </div>
                        <div class="item mail">
                            <input type="email" name="email" placeholder="メールアドレス" autocomplete="email" required>
                        </div>
                        <div class="item pass position-relative">
                            <input id="pw" type="password" name="password" placeholder="パスワード(8文字以上)" minlength="8" required style="padding-right: 35px;">
                            <i class="fa fa-eye" id="show_pw" style="position: absolute; font-size: 20px; right: 9px; top: 15px; cursor: pointer;"></i>
                            <i class="fa fa-eye-slash" id="hide_pw" style="position: absolute; font-size: 20px; right: 9px; top: 15px; cursor: pointer; display: none"></i>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                        <div class="item save">
                            <label><input type="checkbox" name="check"><a href="{{route('terms')}}">利用規約</a>に同意する</label>
                        </div>
                    </div>
                    <div class="box">
                        <button type="submit" class="regist-btn border-0" id="btn_register" disabled>登録する</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="cv-box">
        <div class="container">
            <div class="cv-title">
                <span>WEBを学びたいなら受けなきゃ損</span>
                <span>まずは、1時間の無料カウンセリングから!</span>
            </div>
            <div class="content">
                <div class="fx-bet fx-wrp">
                    <div class="i-32">
                        <a href="{{ route('counseling') }}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img src="{{ asset('images/about.png') }}">
                                </div>
                                <div class="content">
                                    <span class="pc-hidden">今すぐ受けたくなる!</span>
                                    <span>無料カウンセリングとは<i class="fas fa-angle-right"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="title">
                            <span>3分でわかる！<br class="pad-block">無料カウンセリング</span>
                            <span>今すぐ受けたくなる<br>無料カウンセリングをカンタン解説</span>
                        </div>
                    </div>
                    <div class="i-32">
                        <a href="tel:000-000-000">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img src="{{ asset('images/tel.png') }}">
                                </div>
                                <div class="content">
                                    <span class="sm-hidden">TEL</span>
                                    <span class="pc-hidden"><span class="sub">平日/休日 9:00~18:00</span><br>TEL：000-000-000</span>
                                </div>
                            </div>
                        </a>
                        <div class="title">
                            <span>000-000-000</span>
                            <span>平日/休日 9:00~18:00<br>(年末年始・祝日を除く)</span>
                        </div>
                    </div>
                    <div class="i-32">
                        <a href="{{ route('reserve') }}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img src="{{ asset('images/reserve.png') }}">
                                </div>
                                <div class="content">
                                    <span class="pc-hidden">30秒でできる！カンタン予約</span>
                                    <span>Web予約はこちら<i class="fas fa-angle-right"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="title">
                            <span>30秒でできる！<br class="pad-block">カンタンWeb予約</span>
                            <span>プロのコンサルタントが<br>無料でカウンセリングをします</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



{{--    <x-register-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}
{{--            <div class="wrp-input-box">--}}
{{--                <div class="box name">--}}
{{--                    <input type="text" name="firstMame" placeholder="姓">--}}
{{--                    <input type="text" name="lastName" placeholder="名">--}}
{{--                </div>--}}
{{--                <div class="item mail">--}}
{{--                    <input type="email" name="email" placeholder="メールアドレス">--}}
{{--                </div>--}}
{{--                <div class="item pass">--}}
{{--                    <input type="password" name="password" placeholder="パスワード">--}}
{{--                </div>--}}
{{--                <div class="item save">--}}
{{--                    <label><input type="checkbox" name="check"><a--}}
{{--                            href="">利用規約</a>に同意する</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="box">--}}
{{--                <button class="regist-btn">登録する</button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </x-register-card>--}}

    <script type="text/javascript">
        $('#show_pw').click(function () {
            $('#pw').clone().attr('type','text').attr('id', 'pw_txt').insertAfter('#pw').prev().remove();
            $(this).hide();
            $(this).next().show();
        })
        $('#hide_pw').click(function () {
            $('#pw_txt').clone().attr('type','password').attr('id', 'pw').insertAfter('#pw_txt').prev().remove();
            $(this).hide();
            $(this).prev().show();
        })
        $('[name=check]').change(function () {
            if($(this).is(":checked")){
                $('#btn_register')[0].disabled = false;
            }
            else{
                $('#btn_register')[0].disabled = true;
            }
        })
    </script>
</x-app-layout>
