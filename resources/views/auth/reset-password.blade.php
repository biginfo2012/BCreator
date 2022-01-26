<x-guest-layout>
    <style>
        .has-error{
            border: 1px red solid !important;
        }
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
                <span property="name" class="post post-page current-item">パスワード再発行</span>
                <meta property="url" content="{{ route('password.request') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box bg_white" id="iforgot-pass">
        <div class="container">
            <form method="POST" action="{{ route('password.update') }}" id="modify">
                @csrf
                <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <x-input type="hidden" name="email" :value="old('email', $request->email)"/>
                <div class="regist-box" style="padding: 40px 50px 50px;">
                    <div class="title">
                        <a href="{{ url('') }}"> <img src="{{ asset('images/logo.png') }}"></a>
                    </div>
                    <div class="sub_title">
                        <span>パスワード再発行</span>
                    </div>
                    <div class="sub_text">
                        <span>新しいパスワードを入力して「変更」ボタンを押してください。</span>
                    </div>
                    <div class="wrp-input-box">
                        <x-auth-validation-errors class="mb-1" :errors="$errors" />
                        <div class="item pass">
                            <input type="password" id="password" name="password" placeholder="新しいパスワード(8文字以上)" required minlength="8">
                        </div>
                        <div class="item pass">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="新しいパスワード(確認用)" required minlength="8">
                        </div>
                    </div>
                    <div class="box">
                        <button type="submit" id="modify_btn" class="regist-btn border-0">変更</button>
                    </div>
                </div>
            </form>

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

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <!-- Password Reset Token -->--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
    <script>
        $('#modify_btn').click(function(){
            event.preventDefault();
            if($('#modify').valid()){

                let pw = $('[name=password]').val();
                let con_pw = $('[name=password_confirmation]').val();
                if(pw !== ''){
                    if(con_pw === ''){
                        $('[name=password_confirmation]').addClass('has-error');
                        return;
                    }
                    else{
                        if(pw !== con_pw){
                            $('[name=password_confirmation]').addClass('has-error');
                            return
                        }
                    }
                }
                $('[name=password_confirmation]').parent().removeClass('has-error');

                $('#modify').submit();
            }
        })
    </script>
</x-guest-layout>
