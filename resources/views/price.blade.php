<x-app-layout>
    <div class="kv">
        <div class="kv-img">
            <img class="sm-hidden" src="{{asset('images/kv01.png')}}">
            <img class="pc-hidden" src="{{asset('images/kv01_sm.png')}}">
        </div>
        <div class="wrp-kv-title">
            <div class="kv-title">
                <span>b-Creatorについて</span>
                <span>人生の必修科目、“稼ぐ”を学ぶ</span>
            </div>
        </div>
    </div>
    <div class="fix-nav">
        <div class="container">
            <div class="flex fx-coc">
                <div class="item">
                    <a href="#fix-price" class="f-btn move-link">
                        <span>受講料金</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-compare" class="f-btn move-link">
                        <span>料金比較</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-price-flow" class="f-btn move-link">
                        <span>受講開始までの流れ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bread-box">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト."
                   href="{{url('/')}}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">受講料金</span>
                <meta property="url" content="{{route('price')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box" id="fix-price">
        <div class="container">
            <div class="fix-title">
                <span>PRICE</span>
                <span>受講料金</span>
            </div>
            <div class="gray-box">
                <div class="iner-box">
                    <div class="price-box">
                        <div class="ab-title">
                            <span>Webのことを全部学ぶならb-Creator</span>
                        </div>
                        <div class="title">
                            <span class="sub">業界圧倒的最安値!!</span>
                            <div class="flex fx-coc fx-itc">
                                <div class="p-item">
                                    <span>月々</span>
                                </div>
                                <div class="p-item">
                                    <span>14,800</span>
                                </div>
                                <div class="p-item">
                                    <span>税込</span>
                                    <span>円〜</span>
                                </div>
                            </div>
                        </div>
                        <div class="sub-text">
                            <ul>
                                <li>上記は24回分割を行なった場合の月々の支払い金額です</li>
                                <li>上記金額には入会金無料キャンペーンが適用されています</li>
                                <li>分割回数は、3回から最高24回(2年分)までご用意しています</li>
                            </ul>
                        </div>
                        <div class="p-table">
                            <div class="flex term">
                                <div class="t-item">
                                    <span>受講期間</span>
                                    <span>3ヶ月(12週間)</span>
                                </div>
                                <div class="t-item">
                                    <span>受講料金</span>
                                    <div>
                                        <span>298,000円</span>
                                        <span>(税込327,800円)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>お支払方法</span>
                            </div>
                            <div class="flex fx-coc how">
                                <div class="t-item">
                                    <span>銀行振込</span>
                                    <span>(一括のみ)</span>
                                </div>
                                <div class="t-item">
                                    <span>クレジットカード決済</span>
                                </div>
                            </div>
                        </div>
                        <div class="sub-text">
                            <ul>
                                <li>上記金額はご一括決済の場合の支払い金額です</li>
                                <li>新規のお客さまは、上記受講料以外に入会金33,000円(税込)がかかります</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="split-box">
                    <div class="flag collapse" id="collap-1"></div>
                    <div class="shumi-btn-box">
                        <a class="shumi-btn" data-toggle="collapse" href="#collap-1">分割払いシミュレーション<span></span></a>
                    </div>
                    <div class="collapse" id="collap-1">
                        <div class="shumi-box">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="sm-hidden" rowspan="5">b-Creator<br>支払いサイクル</td>
                                    <td class="sell-bg">分割回数</td>
                                    <td>月々の支払い</td>
                                    <td class="sell-bg">分割払い手数料</td>
                                    <td>実質合計金額</td>
                                </tr>
                                <tr>
                                    <td class="sell-bg">3回</td>
                                    <td>112,200円</td>
                                    <td class="sell-bg">8,800円</td>
                                    <td>336,600円</td>
                                </tr>
                                <tr>
                                    <td class="sell-bg">6回</td>
                                    <td>56,750円</td>
                                    <td class="sell-bg">12,700円</td>
                                    <td>340,500円</td>
                                </tr>
                                <tr>
                                    <td class="sell-bg">12回</td>
                                    <td>28,850円</td>
                                    <td class="sell-bg">18,400円</td>
                                    <td>346,200円</td>
                                </tr>
                                <tr>
                                    <td class="sell-bg">24回</td>
                                    <td>14,800円</td>
                                    <td class="sell-bg">27,400円</td>
                                    <td>355,200円</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white" id="fix-compare">
        <div class="container">
            <div class="fix-title">
                <span>PRICE COMPARISON</span>
                <span>他社との料金比較</span>
                <span>他社サービスに比べ「圧倒的にお得」で<br class="pc-hidden">「稼ぐに特化したスキル」を得られます。</span>
            </div>
            <div class="comp-table">
                <table>
                    <tbody>
                    <tr>
                        <th></th>
                        <th class="blue_cach">b-Creator<br>フリーランス養成講座</th>
                        <th>W社</th>
                        <th>D社</th>
                        <th>I社</th>
                    </tr>
                    <tr>
                        <td>価格</td>
                        <td class="blue_side">29.8万円〜<br><span class="red">業界最安値</span></td>
                        <td>33万円〜</td>
                        <td>60万円〜</td>
                        <td>90万円〜</td>
                    </tr>
                    <tr>
                        <td>期間</td>
                        <td class="blue_side">3ヶ月</td>
                        <td>1ヶ月</td>
                        <td>3ヶ月〜</td>
                        <td>10~12ヶ月</td>
                    </tr>
                    <tr>
                        <td>受講後に個人で<br>稼げる人の割合</td>
                        <td class="blue_side">ほぼ全員</td>
                        <td>少数</td>
                        <td>なし(転職斡旋)</td>
                        <td>少数</td>
                    </tr>
                    <tr>
                        <td>サポート</td>
                        <td class="blue_side">終日対応</td>
                        <td>特定の時間帯のみ</td>
                        <td>特定の時間帯のみ</td>
                        <td>質問回数に制限あり</td>
                    </tr>
                    <tr>
                        <td>学習スタイル</td>
                        <td class="blue_side blue_bottom">
                            <span class="tex-left">テキストと動画でインプット、<br class="pc-hidden">テストでアプトプット、<br class="pc-hidden">その後の実践で確実に定着する<br
                                    class="pc-hidden">仕組みが整っている</span>
                        </td>
                        <td>
                            <span class="tex-left">ライブ動画の受講となる<br class="pc-hidden">ため特定の時間に一回<br class="pc-hidden">しか学習できず、全く<br
                                    class="pc-hidden">身に付かない</span>
                        </td>
                        <td>
                            <span class="tex-left">ツールの利用方法を学ぶ<br class="pc-hidden">のみで、実践的な学習・<br class="pc-hidden">実践の場が一切用意され<br
                                    class="pc-hidden">ていない</span>
                        </td>
                        <td>
                            <span class="tex-left">高額な割に形式化された教<br class="pc-hidden">材がなく、確実なスキル<br class="pc-hidden">が身につけられない</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="fix-box" id="fix-price-flow">
        <div class="container">
            <div class="fix-title">
                <span>FLOW TO START</span>
                <span>受講開始までの流れ</span>
                <span>あなたの挑戦が<br class="pc-hidden">最も結果に繋がるフローとなっています。</span>
            </div>
            <div class="flow-table">
                <div class="flex fx-bet fx-wrp">
                    <div class="box">
                        <div class="box-count first">
                            <span>●</span>
                            <span>STEP</span>
                            <span>01</span>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <span>無料カウンセリング</span>
                            </div>
                            <div class="content">
                                <span>あなたの課題を明確にし今後の学習計画を提案します。</span>
                                <div class="wrp-btn">
                                    <a href="https://b-creator.test-h.biz/counseling/" class="def-btn">予約はこちら</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-count">
                            <span>●</span>
                            <span>STEP</span>
                            <span>02</span>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <span>お申し込み</span>
                            </div>
                            <div class="content">
                                <span>カウンセリングにて、あなたの今後の学習にb-Creatorが必要であれば申し込みのステップに移ります。</span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-count">
                            <span>●</span>
                            <span>STEP</span>
                            <span>03</span>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <span>アカウント発行</span>
                            </div>
                            <div class="content">
                                <span>お申し込みが完了すると即座にアカウントが発行され、マイページから受講が可能となります。</span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-count last">
                            <span>●</span>
                            <span>STEP</span>
                            <span>04</span>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <span>受講開始</span>
                            </div>
                            <div class="content">
                                <span>スマホからいつでも受講することができます。隙間時間を活用した学習も可能で、毎日成長できます。</span>
                            </div>
                        </div>
                    </div>
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
                        <a href="https://b-creator.test-h.biz/reserve/">
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
</x-app-layout>
