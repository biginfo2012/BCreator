<x-app-layout>
    <div class="bread-box">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト." href="{{url('')}}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">支払い登録</span>
                <meta property="url" content="https://b-creator.test-h.biz/login/">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box" id="c-what">
        <div class="container">
            <div class="title page_reserve">
                <span class="main">1時間のカウンセリングで<br class="pc-hidden">あなたの<span class="red">目標・目的</span>に寄り添い<br>コンサルタントが<span class="red">最適な提案</span>をします。</span>
                <span class="hosoku">*b-Creatorそのものがお客様にあっているかを検診しますので<br class="pc-hidden">無理な勧誘は一切しません。</span>
            </div>
            <a class="pc-hidden collapsed col_re_btn" href="#collap-reserve" data-toggle="collapse">カウンセリングの流れ</a>
            <div class="box collapse" id="collap-reserve">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="item-title">
                            <span>STEP</span>
                            <span>01</span>
                            <span>ヒアリング</span>
                        </div>
                        <div class="content">
                            <img src="{{asset('images/co01.png')}}">
                            <span>b-Creator受講の目的や、受講後どうなりたいか詳しく伺い、今後の課題や目指すべき姿などを明確にします。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <span>STEP</span>
                            <span>02</span>
                            <span>b-Creatorについての説明</span>
                        </div>
                        <div class="content">
                            <img src="{{asset('images/co02.png')}}">
                            <span>ヒヤリングした目標や目的に対し、<br class="pad-hidden">b-Creatorはどのくらい役に立つか否かを含め、より詳しく解説いたします。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <span>STEP</span>
                            <span>03</span>
                            <span>学習計画の提案</span>
                        </div>
                        <div class="content">
                            <img src="{{asset('images/co03.png')}}">
                            <span>目標を最短で達成するためには、あなたが今後どのような学習計画を実行すれば良いのかを提案させていただきます。</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white" id="reserve">
        <form method="POST" action="{{ route('save-reserve') }}">
            @csrf
            <div class="wrp_reserve_input">
                <div class="box">
                    <div class="flex fx-bet fx-itc fx-wrp">
                        <div class="name">
                            <div class="flex">
                                <span class="require">必須</span>
                                <span>お名前</span>
                            </div>
                        </div>
                        <div class="reserve_input double">
                            <input type="text" name="first_name" placeholder="姓" autocomplete="family-name" required>
                            <input type="text" name="last_name" placeholder="名" autocomplete="given-name" required>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex fx-bet fx-itc fx-wrp">
                        <div class="name">
                            <div class="flex">
                                <span class="require">必須</span>
                                <span>メールアドレス</span>
                            </div>
                        </div>
                        <div class="reserve_input">
                            <input type="email" name="email" placeholder="メールアドレス" autocomplete="email" required>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex fx-bet fx-itc fx-wrp">
                        <div class="name">
                            <div class="flex">
                                <span class="require">必須</span>
                                <span>電話番号</span>
                            </div>
                        </div>
                        <div class="reserve_input">
                            <input type="text" name="number" placeholder="08012345678" autocomplete="tel" required>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex fx-bet fx-itc fx-wrp">
                        <div class="name">
                            <div class="flex">
                                <span class="require">必須</span>
                                <span>希望日・希望時間<br class="sm-hidden"> (第一希望)</span>
                            </div>
                        </div>
                        <div class="reserve_input double">
                            <input type="text" id="datepicker" name="first_date" placeholder="希望日" required>
                            <div class="wrp_select">
                                <select class="is-empty" name="first_time" required>
                                    <option disabled selected style="display:none;" value="">希望時間</option>
                                    <option value="11:00~12:00">11:00~12:00</option>
                                    <option value="13:00~14:00">13:00~14:00</option>
                                    <option value="14:00~15:00">14:00~15:00</option>
                                    <option value="15:00~16:00">15:00~16:00</option>
                                    <option value="16:00~17:00">16:00~17:00</option>
                                    <option value="17:00~18:00">17:00~18:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex fx-bet fx-itc fx-wrp">
                        <div class="name">
                            <div class="flex">
                                <span class="require">必須</span>
                                <span>希望日・希望時間<br class="sm-hidden"> (第二希望)</span>
                            </div>
                        </div>
                        <div class="reserve_input double">
                            <input type="text" id="datepicker2" placeholder="希望日" name="second_date" required>
                            <div class="wrp_select">
                                <select class="is-empty" name="second_time" required>
                                    <option disabled selected style="display:none;" value="">希望時間</option>
                                    <option value="11:00~12:00">11:00~12:00</option>
                                    <option value="13:00~14:00">13:00~14:00</option>
                                    <option value="14:00~15:00">14:00~15:00</option>
                                    <option value="15:00~16:00">15:00~16:00</option>
                                    <option value="16:00~17:00">16:00~17:00</option>
                                    <option value="17:00~18:00">17:00~18:00</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_btn">
                    <span><input type="checkbox" name="check"><a href="#">個人情報の取り扱いについて</a>にご同意頂いた上で、<br class="pc-hidden">下記ボタンよりお申し込みを完了ください</span>
                    <button class="send_btn border-0" id="btn_save_reserve" disabled>送信する</button>
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
                        <a href="{{route('counseling')}}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img src="{{asset('images/about.png')}}">
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
                                    <img src="{{asset('images/tel.png')}}">
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
                        <a href="{{route('reserve')}}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp">
                                    <img src="{{asset('images/reserve.png')}}">
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
            $('[name=check]').change(function () {
                if($(this).is(":checked")){
                    $('#btn_save_reserve')[0].disabled = false;
                }
                else{
                    $('#btn_save_reserve')[0].disabled = true;
                }
            })
        })
        $('#datepicker').datepicker();
        $('#datepicker2').datepicker();
    </script>
</x-app-layout>
