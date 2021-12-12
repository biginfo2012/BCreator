<x-user-layout>
    <div class="wrp_my-box">
        <div class="container">
            <div class="wrp_set-box">
                <div class="set-nav">
                    <div class="fx-bet fx-wrp">
                        <div class="tab active"><span>プロフィール</span></div>
                        <div class="tab"><span>お支払い情報</span></div>
                        <div class="tab"><span>学習履歴</span></div>
                    </div>
                </div>
                <div class="wrp_set-con">
                    <div class="tab-item show">
                        <div class="wrp_prof-info">
                            <div class="img"><a href="#"> <img src="{{ asset('images/no_img_head.png') }}"> </a></div>
                            <div class="name input"><span>ユーザー名</span> <input type="text"></div>
                            <div class="mail input"><span>メールアドレス</span> <input type="text"></div>
                            <div class="pass input"><span>パスワード</span> <input type="text"></div>
                            <div class="wrp_gen-btn"><a class="gen-btn" href="#">更新</a></div>
                            <div class="wrp_deact"><a class="deact" href="#">退会手続きはこちら</a></div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp_prof_pay">
                            <div class="pay_howto">
                                <div class="title"><span>お支払い方法</span></div>
                                <div class="content" id="pay_credit">
                                    <div class="flex fx-itc fx-wrp">
                                        <div class="icon"><img src="{{ asset('images/jcb.png') }}"></div>
                                        <div class="number"><span>末尾 0000</span></div>
                                        <div class="expiry"><span>有効期限：05/25</span></div>
                                        <div class="edit"><a href="#">編集</a></div>
                                    </div>
                                </div>
                                <!--                                     <div class="content" id="pay_bank">                                         <span class="bank"><i class="fas fa-university"></i>銀行振り込み</span>                                     </div> -->
                            </div>
                            <div class="pay_log">
                                <div class="title">
                                    <div class="flex fx-bet fx-end"><span>お支払い内容</span> <span
                                            class="sub">分割回数：24回</span></div>
                                </div>
                                <div class="content">
                                    <div class="box">
                                        <div class="name">
                                            <div class="flex"><span class="day">お支払日</span> <span
                                                    class="how">お支払方法</span> <span class="price">お支払料金</span></div>
                                        </div>
                                        <div class="item">
                                            <div class="flex"><span class="day">2021/11/22</span> <span class="how">カード自動引落</span>
                                                <span class="price">112,200円</span></div>
                                        </div>
                                        <div class="item">
                                            <div class="flex"><span class="day">2021/12/22</span> <span class="how">カード自動引落</span>
                                                <span class="price">112,200円</span></div>
                                        </div>
                                        <div class="item">
                                            <div class="flex"><span class="day">2022/01/22</span> <span class="how">カード自動引落</span>
                                                <span class="price">112,200円</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp_prof_log">
                            <div class="box">
                                <div class="flex fx-itc fx-wrp">
                                    <div class="day"><span>2021.08.12<br class="sm-hidden">17:50</span></div>
                                    <div class="tag"><span class="lesson">レッスン</span></div>
                                    <div class="title">
                                        <span class="main">タイトルタイトルタイトル</span>
                                        <span class="sub">ディスクリプションディスクリプションディスクリプションディスクリプションディスクリプション</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="flex fx-itc fx-wrp">
                                    <div class="day"><span>2021.08.12<br class="sm-hidden">17:50</span></div>
                                    <div class="tag"><span class="review">復習</span></div>
                                    <div class="title">
                                        <span class="main">タイトルタイトルタイトル</span>
                                        <span class="sub">ディスクリプションディスクリプションディスクリプションディスクリプションディスクリプション</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="flex fx-itc fx-wrp">
                                    <div class="day"><span>2021.08.12<br class="sm-hidden">17:50</span></div>
                                    <div class="tag"><span class="test">テスト</span></div>
                                    <div class="title">
                                        <span class="main">タイトルタイトルタイトル</span>
                                        <span class="sub">ディスクリプションディスクリプションディスクリプションディスクリプションディスクリプション</span>
                                    </div>
                                </div>
                            </div>
                            <div class="last_box"><span>過去30件を表示</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
