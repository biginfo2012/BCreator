<x-app-layout>
    <div class="kv">
        <div class="kv-img">
            <img class="sm-hidden" src="{{asset('images/kv01.png')}}">
            <img class="pc-hidden" src="{{asset('images/kv01_sm.png')}}"></div>
        <div class="wrp-kv-title">
            <div class="kv-title"><span>b-Creatorについて</span> <span>人生の必修科目、“稼ぐ”を学ぶ</span></div>
        </div>
    </div>
    <div class="bread-box bg_white">
        <div class="container">             <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト."
                   href="{{url('')}}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">割引一覧</span>
                <meta property="url" content="{{route('discount')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-nav_dis">
        <div class="container v2">
            <div class="title"><span>あなたの新しい一歩を応援する<br class="pc-hidden"><span class="red">お得な割引</span>を用意しております。</span>
            </div>
            <div class="fx-bet fx-wrp">
                <div class="item"><a href="#dis-friend"> <span><i class="fas fa-user-friends"></i>お友達割引<i
                                class="fas fa-angle-down"></i></span> </a></div>
                <div class="item"><a href="#dis-start"> <span><i class="fas fa-meteor"></i>即スタート割引<i
                                class="fas fa-angle-down"></i></span> </a></div>
                <div class="item"><a href="#dis-student"> <span><i class="fas fa-school"></i>学生割引<i
                                class="fas fa-angle-down"></i></span> </a></div>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white" id="dis-friend">
        <div class="container">
            <div class="dis-title"><span><i class="fas fa-user-friends"></i>お友達割</span>
                <span>受講生・卒業生からの紹介、お友達と二人での入会で<br class="pad-block">受講料3万円OFF！</span></div>
            <div class="dis-content">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/request.png')}}"></div>
                                    <div><span>申込方法</span></div>
                                </div>
                            </div>
                            <div class="text"><span>申し込みの際に、紹介してくれた受講生の名前、一緒に入会されるお友達の名前をご入力ください。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/limit.png')}}"></div>
                                    <div><span>申込期限</span></div>
                                </div>
                            </div>
                            <div class="text"><span>2021年8月2日(月) 〜 12月31日(金)</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/ico07.png')}}"></div>
                                    <div><span>特典内容</span></div>
                                </div>
                            </div>
                            <div class="text"><span>受講料を3万円割引します。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/attention.png')}}"></div>
                                    <div><span>注意事項</span></div>
                                </div>
                            </div>
                            <div class="text"><span>・他の割引と併用できません。<br>・お申し込み後の遡り適用はできません。<br>・新規入会の方限定の割引となります。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="induce-box"><a href="#" class="btn-def">まずは無料カウンセリング<i class="fas fa-angle-right"></i></a></div>
        </div>
    </div>
    <div class="fix-box" id="dis-start">
        <div class="container">
            <div class="dis-title"><span><i class="fas fa-meteor"></i>即スタート割引</span> <span>無料カウンセリング当日に受講申し込みいただいたら、<br
                        class="pad-block">受講料3万円OFF！</span></div>
            <div class="dis-content">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/request.png')}}"></div>
                                    <div><span>申込方法</span></div>
                                </div>
                            </div>
                            <div class="text"><span>無料カウンセリングを受けられた当日に受講申し込みください。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/limit.png')}}"></div>
                                    <div><span>申込期限</span></div>
                                </div>
                            </div>
                            <div class="text"><span>2021年8月1日(月) 〜 10月29日(土)</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/ico07.png')}}"></div>
                                    <div><span>特典内容</span></div>
                                </div>
                            </div>
                            <div class="text"><span>受講料を3万円割引します。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/attention.png')}}"></div>
                                    <div><span>注意事項</span></div>
                                </div>
                            </div>
                            <div class="text"><span>・他の割引と併用できません。<br>・お申し込み後の遡り適用はできません。<br>・新規入会の方限定の割引となります。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="induce-box"><a href="#" class="btn-def">まずは無料カウンセリング<i class="fas fa-angle-right"></i></a></div>
        </div>
    </div>
    <div class="fix-box bg_white" id="dis-student">
        <div class="container">
            <div class="dis-title"><span><i class="fas fa-school"></i>学生割引</span> <span>学生の方は、受講料3万円OFF！</span></div>
            <div class="dis-content">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/request.png')}}"></div>
                                    <div><span>申込方法</span></div>
                                </div>
                            </div>
                            <div class="text"><span>学割希望の方は無料カウンセリング時に<br>学割ご利用の旨をお伝えください。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/limit.png')}}"></div>
                                    <div><span>申込期限</span></div>
                                </div>
                            </div>
                            <div class="text"><span>2021年8月2日(月) 〜 12月31日(金)</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/ico07.png')}}"></div>
                                    <div><span>特典内容</span></div>
                                </div>
                            </div>
                            <div class="text"><span>受講料を3万円割引します。</span></div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="flex fx-itc fx-wrp">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <div><img src="{{asset('images/attention.png')}}"></div>
                                    <div><span>注意事項</span></div>
                                </div>
                            </div>
                            <div class="text"><span>・他の割引と併用できません。<br>・お申し込み後の遡り適用はできません。<br>・新規入会の方限定の割引となります。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="induce-box"><a href="#" class="btn-def">まずは無料カウンセリング<i class="fas fa-angle-right"></i></a></div>
        </div>
    </div>
    <div class="cv-box">
        <div class="container">
            <div class="cv-title"><span>WEBを学びたいなら受けなきゃ損</span> <span>まずは、1時間の無料カウンセリングから!</span></div>
            <div class="content">
                <div class="fx-bet fx-wrp">
                    <div class="i-32"><a href="{{route('counseling')}}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{asset('images/about.png')}}"></div>
                                <div class="content"><span class="pc-hidden">今すぐ受けたくなる!</span> <span>無料カウンセリングとは<i
                                            class="fas fa-angle-right"></i></span></div>
                            </div>
                        </a>
                        <div class="title"><span>3分でわかる！<br class="pad-block">無料カウンセリング</span> <span>今すぐ受けたくなる<br>無料カウンセリングをカンタン解説</span>
                        </div>
                    </div>
                    <div class="i-32"><a href="tel:000-000-000">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{asset('images/tel.png')}}"></div>
                                <div class="content"><span class="sm-hidden">TEL</span> <span class="pc-hidden"><span
                                            class="sub">平日/休日 9:00~18:00</span><br>TEL：000-000-000</span></div>
                            </div>
                        </a>
                        <div class="title"><span>000-000-000</span> <span>平日/休日 9:00~18:00<br>(年末年始・祝日を除く)</span></div>
                    </div>
                    <div class="i-32"><a href="{{route('reserve')}}">
                            <div class="wrp-cv-item-title">
                                <div class="wrp"><img src="{{asset('images/reserve.png')}}"></div>
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
</x-app-layout>
