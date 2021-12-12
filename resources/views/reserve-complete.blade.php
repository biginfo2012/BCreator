<x-app-layout>
    <div class="bread-box bg_white">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト." href="{{ url('') }}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span>
            &gt; <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">予約完了</span>
                <meta property="url" content="{{ route('login') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box bg_white" id="reserve-complete">
        <div class="container">
            <div class="wrp_reserve_input">
                <div class="title">
                    <a href="{{ url('') }}">
                        <img src="{{ asset('images/logo.png') }}">
                    </a>
                    <span class="main">送信が完了しました。<br>ご予約ありがとうございました。</span>
                    <span class="sub">2営業日以内に担当者より<br class="pc-hidden">メールにてご連絡いたします。</span>
                </div>
                <div class="confirm_box">
                    <div class="item">
                        <div class="flex fx-wrp">
                            <div class="name">
                                <span>お名前</span>
                            </div>
                            <div class="content">
                                <span>{{ $data['first_name'] . " " . $data['last_name'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-wrp">
                            <div class="name">
                                <span>メールアドレス</span>
                            </div>
                            <div class="content">
                                <span>{{ $data['email'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-wrp">
                            <div class="name">
                                <span>電話番号</span>
                            </div>
                            <div class="content">
                                <span>{{ $data['number'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="item time">
                        <div class="flex fx-itc fx-wrp">
                            <div class="name">
                                <span>希望日・希望時間<br class="sm-hidden"> (第一希望)</span>
                            </div>
                            <div class="content">
                                <span>{{ date('Y/m/d', strtotime($data['first_date'])) }}  {{ $data['first_time'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="item time">
                        <div class="flex fx-itc fx-wrp">
                            <div class="name">
                                <span>希望日・希望時間<br class="sm-hidden"> (第二希望)</span>
                            </div>
                            <div class="content">
                                <span>{{ date('Y/m/d', strtotime($data['second_date'])) }}  {{ $data['second_time'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text">
                    <span>ご予約いただくと同時に確認の自動返信メールを送らさせていただいております。<br class="sm-hidden">メールが送れられてこない場合は迷惑メールを確認いただくか、メールアドレスが間違っている場合がございます。そのような場合や送信内容が間違っていた場合には再度ご予約をお願いいたします。</span>
                </div>
                <div class="return_btn-box">
                    <a onclick="window.history.back();" class="return_btn">予約フォームへ戻る</a>
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
</x-app-layout>
