<x-app-layout>
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
                <span property="name" class="post post-page current-item">登録完了</span>
                <meta property="url" content="{{ route('login') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box bg_white" id="regist-complete">
        <div class="container">
            <div class="regist-box">
                <div class="title">
                    <a href="{{ url('') }}">
                        <img src="{{ asset('images/logo.png') }}">
                    </a>
                    <div class="regist-flow">
                        <div class="item c1">
                            <span>アカウント情報</span>
                        </div>
                        <div class="item c2">
                            <span>支払方法</span>
                        </div>
                        <div class="item c3 active">
                            <span>登録完了</span>
                        </div>
                    </div>
                </div>
                <div class="wrp-input-box">
                    <div class="content">
                        <span class="con-title">会員登録が完了しました。</span>
                        <div class="member-info">
                            <div class="item">
                                <div class="flex fx-itc">
                                    <div class="name">
                                        <span>お名前</span>
                                    </div>
                                    <div class="data">
                                        <span>山田 太郎</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="flex fx-itc">
                                    <div class="name">
                                        <span>メールアドレス</span>
                                    </div>
                                    <div class="data">
                                        <span>test@hinata.group</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="flex fx-itc">
                                    <div class="name">
                                        <span>パスワード</span>
                                    </div>
                                    <div class="data">
                                        <span>test1103</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span>こちらがアカウント情報になります。大事に保管してください。</span>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="regist-btn">ログイン</a>
                </div>
            </div>
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
                        <a href="https://b-creator.test-h.biz/counseling/">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img
                                        src="https://b-creator.test-h.biz/wordpress/wp-content/themes/bootstrap-basic4-child/assets/images/about.png">
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
                                    <img
                                        src="https://b-creator.test-h.biz/wordpress/wp-content/themes/bootstrap-basic4-child/assets/images/tel.png">
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
                        <a href="https://b-creator.test-h.biz/reserve/">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img
                                        src="https://b-creator.test-h.biz/wordpress/wp-content/themes/bootstrap-basic4-child/assets/images/reserve.png">
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
</x-app-layout>
