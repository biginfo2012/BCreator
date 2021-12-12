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
                <span property="name" class="post post-page current-item">支払い登録</span>
                <meta property="url" content="{{ route('login') }}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box bg_white" id="checkout">
        <form method="POST" action="{{ route('checkout') }}" id="checkout_form">
            @csrf
            <div class="container">
                <input type="hidden" name="user_id" value="{{$user_id}}">
                <input type="hidden" name="password" value="{{ $password }}">
                <div class="regist-box">
                    <div class="title">
                        <a href="{{ url('') }}">
                            <img src="{{ asset('images/logo.png') }}">
                        </a>
                        <div class="regist-flow">
                            <div class="item c1">
                                <span>アカウント情報</span>
                            </div>
                            <div class="item c2 active">
                                <span>支払方法</span>
                            </div>
                            <div class="item c3">
                                <span>登録完了</span>
                            </div>
                        </div>
                    </div>
                    <div class="wrp-input-box">
                        <div class="in_box">
                            <div class="title">
                                <div class="flex fx-bet">
                                    <div>
                                        <input type="radio" name="pay_setting" id="credit" value="1" checked="checked">クレジットカード
                                    </div>
                                    <div class="cre_image">
                                    </div>
                                </div>
                            </div>
                            <div class="content-ch how01">
                                <div class="item cre-name">
                                    <input type="text" name="card_name" placeholder="カード名義人">
                                </div>
                                <div class="item cre-num">
                                    <input type="text" name="card_number" placeholder="カード番号">
                                </div>
                                <div class="box cre-code">
                                    <input type="text" name="card_date" placeholder="有効期限 月/年">
                                    <input type="text" name="card_cvc" placeholder="セキュリティコード">
                                </div>
                            </div>
                        </div>
                        <div class="in_box">
                            <div class="title">
                                <div class="flex fx-bet">
                                    <div>
                                        <input type="radio" name="pay_setting" id="bank" value="2">銀行振込
                                    </div>
                                </div>
                            </div>
                            <div class="content-ch how02">
                                <span>銀行名：ゆうちょ銀行<br>店名：〇九八支店　預金種目：普通預金<br>口座番号：1847411<br>振込先：ヒナタ (ド<br><br>こちらをメモいただき、ご入金をお願いいたします。<br>ご入金の確認後、2営業日以内にメールにてサービスへの招待をいたします。</span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <button class="regist-btn border-0" id="checkout">申し込む</button>
                    </div>
                </div>
            </div>
        </form>

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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkout').click(function (e) {
                e.preventDefault();
                if($('[name=pay_setting]:checked').val() == 1){
                    if($('[name=card_name]').val() == ""){
                        $(document).find('input[name=card_name]').css('border-color', 'red');
                        return;
                    }
                    $(document).find('input[name=card_name]').css('border-color', '#ccc');
                    if($('[name=card_number]').val() == ""){
                        $(document).find('input[name=card_number]').css('border-color', 'red');
                        return;
                    }
                    $(document).find('input[name=card_number]').css('border-color', '#ccc');
                    if($('[name=card_date]').val() == ""){
                        $(document).find('input[name=card_date]').css('border-color', 'red');
                        return;
                    }
                    $(document).find('input[name=card_date]').css('border-color', '#ccc');
                    if($('[name=card_cvc]').val() == ""){
                        $(document).find('input[name=card_cvc]').css('border-color', 'red');
                        return;
                    }
                    $(document).find('input[name=card_cvc]').css('border-color', '#ccc');
                    $( "#checkout_form" ).submit();
                }
                else{
                    $( "#checkout_form" ).submit();
                }


            })

        })
    </script>
</x-app-layout>
