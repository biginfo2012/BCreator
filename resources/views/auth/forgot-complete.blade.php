<x-guest-layout>
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
    <div class="fix-box bg_white" id="iforgot-complete">
        <div class="container">
            <div class="regist-box" style="padding: 40px 50px 50px;">
                <div class="title">
                    <a href="{{ url('') }}"> <img src="{{ asset('images/logo.png') }}"> </a>
                </div>
                <div class="sub_title">
                    <span>パスワード再発行</span>
                </div>
                <div class="sub_text">
                    <span>パスワードを更新しました。<br>以下より再度ログインしてください。</span>
                </div>
                <div class="box">
                    <a href="{{route('login')}}" class="regist-btn">ログイン</a>
                </div>
                <div class="back_page">
                    <a href="{{route('home')}}">← トップへ戻る</a>
                </div>
            </div>
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
</x-guest-layout>
