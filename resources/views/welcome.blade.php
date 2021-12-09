<x-app-layout>
    <div class="mv-box">
        <span class="scr">SCROLL</span>
        <div class="wrp-mv-img">
            <span>稼ぐ力を身につける<br>フリーランス養成講座</span>
            <div class="mv-img">
                <img class="sm-hidden" src="{{asset('images/mv.png')}}">
                <img class="pc-hidden" src="{{asset('images/mv_sm.png')}}">
            </div>
        </div>
        <div class="ban-box">
            <ul class="ban-slide">
                <li><a href="{{route('about')}}"> <img src="{{asset('images/ban_kv01.png')}}"> </a></li>
                <li><a href="{{route('counseling')}}"> <img src="{{asset('images/ban_kv03.png')}}"> </a></li>
                <li><a href="{{route('discount')}}"> <img src="{{asset('images/ban_kv02.png')}}"> </a></li>
                <li><a href="{{route('counseling')}}"> <img src="{{asset('images/ban_kv04.png')}}"> </a></li>
            </ul>
        </div>
    </div>
    <div class="wrp-box bg_gray" id="about">
        <div class="container">
            <div class="top-title">
                <span>b-Creatorについて</span>
                <span>人生の必修科目、“稼ぐ”を学ぶ</span>
            </div>
            <div class="fx-bet fx-wrp contents">
                <div class="i-30">
                    <img src="{{asset('images/a01.png')}}">
                    <span>“今”使えるスキルはもちろん<br>変化し続ける世の中で稼ぐための授業を展開</span>
                </div>
                <div class="i-30">
                    <img src="{{asset('images/a02.png')}}">
                    <span>データをもとに日々講座がアップデート<br class="pad-hidden">動画・教材・テストで定着する受講システム</span>
                </div>
                <div class="i-30">
                    <img src="{{asset('images/a03.png')}}">
                    <span>時間と場所に制限されない<br>あなたのペースでスマホでも受講可能</span>
                </div>
            </div>
            <div class="btn-box">
                <a href="{{route('about')}}" class="pub-btn">詳細はこちら<i
                        class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="wrp-box" id="contents">
        <div class="container">
            <div class="top-title">
                <span>b-Creatorの学習内容</span>
                <span>データと実績から捻出されたカリキュラム</span>
            </div>
            <div class="contents">
                <ul class="slide-a">
                    <li>
                        <div class="content-item"><img src="{{asset('images/c01.png')}}">
                            <div class="title"><span>01</span> <span>content</span></div>
                            <div class="content">
                                <span>b-Creatorの学習設計</span>
                                <span>ただひたすらに学習をするのではなく、目標・目的をはっきりとさせ、逆算を行なった上での学習が効率的です。そのために独自の学習設計を学び実践します。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c02.png')}}">
                            <div class="title"><span>02</span> <span>content</span></div>
                            <div class="content">
                                <span>ビジネスの基礎</span>
                                <span>具体論というのは基礎があって初めて身につきます。またスキルの“習得の仕方”を学ぶことで、b-Creatorの外側でも常に役立つノウハウを学んびます。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c03.png')}}">
                            <div class="title"><span>03</span> <span>content</span></div>
                            <div class="content">
                                <span>マーケティング論</span>
                                <span>マーケティングを学ぶか否かでフリーランスの価値は比べられないほど差がつきます。今、絶対的に必要なノウハウをb-Creatorでは講義しています。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c04.png')}}">
                            <div class="title"><span>04</span> <span>content</span></div>
                            <div class="content">
                                <span>SEOライティング</span>
                                <span>今の世の中で必要不可欠な検索エンジン。その中でコンテンツの最適化を行うというスキルは半永久的に役立つものです。また未経験でも始めやすい分野です。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c05.png')}}">
                            <div class="title"><span>05</span> <span>content</span></div>
                            <div class="content">
                                <span>動画編集</span>
                                <span>動画編集のスキルは“センス”という言葉で片付けられることが多い分野です。そこを言語化しより具体的に学ぶことで短期間で高いレベルでのスキルを習得できます。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c06.png')}}">
                            <div class="title"><span>06</span> <span>content</span></div>
                            <div class="content">
                                <span>Web営業</span>
                                <span>スキルはあっても仕事がなければお金は稼げません。Web使った営業を学ぶことで、受講中からお金を生み出せるようにカリキュラムを組んでいます。</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="content-item"><img src="{{asset('images/c07.png')}}">
                            <div class="title"><span>07</span> <span>content</span></div>
                            <div class="content">
                                <span>キャリア戦略</span>
                                <span>フリーランスは自分でキャリアの選択を行い、収入を上げていかなければなりません。その戦略概要を学ぶことでモチベーションと短期間での収入UPを目指します。</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="btn-box">
                <a href="{{route('curriculum')}}" class="pub-btn">詳細はこちら<i
                        class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="wrp-box bg_blue" id="price">
        <div class="container">
            <div class="top-title">
                <span>料金・お支払について</span>
                <span>圧倒的なコストパフォーマンス</span>
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
                    <div class="btn-box">
                        <a href="{{route('price')}}" class="pub-btn">詳細はこちら<i
                                class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="flex fx-bet iner-box fx-wrp">
                <div class="i-50">
                    <a class="ban-btn" href="{{route('discount')}}">
                        <img src="{{asset('images/pb01.png')}}">
                    </a>
                </div>
                <div class="i-50">
                    <a class="ban-btn" href="{{route('counseling')}}">
                        <img src="{{asset('images/pb02.png')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="wrp-box" id="voice">
        <div class="container">
            <div class="top-title">
                <span>お客さまの声</span>
                <span>未経験からプロフェッショナルに</span>
            </div>
            <div class="contents">
                <div class="flex fx-bet fx-wrp">
                    <div class="i-32 v-box">
                        <img src="{{asset('images/v01.png')}}">
                        <div class="title">
                            <div class="flex fx-bet">
                                <div class="item">
                                    <span>40歳会社員が</span>
                                </div>
                                <div class="item">
                                    <span>Web業界で独立</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>通勤時の満員電車にはうんざりしていましたが、コロナ禍でもその体制が変わらない会社には耐えきれませんでした。しかし、そんな状況を変えてくれたのがb-Creatorでした。</span>
                            <span>25歳 前田弘二</span>
                        </div>
                    </div>
                    <div class="i-32 v-box">
                        <img src="{{asset('images/v01.png')}}">
                        <div class="title">
                            <div class="flex fx-bet">
                                <div class="item">
                                    <span>未経験から</span>
                                </div>
                                <div class="item">
                                    <span>副業収入5万円UP!!</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>他のスクールでwebデザインを学びましたが、一切お金を稼ぐということはできませんでした。しかし、ここでは“稼ぐ”から逆算しているので、すぐに目標に辿り着けました。</span>
                            <span>25歳 前田弘二</span>
                        </div>
                    </div>
                    <div class="i-32 v-box">
                        <img src="{{asset('images/v01.png')}}">
                        <div class="title">
                            <div class="flex fx-bet">
                                <div class="item">
                                    <span>新卒から</span>
                                </div>
                                <div class="item">
                                    <span>フリーランスに就職</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>大学の授業にはないビジネスをb-Creatorで学び、受講後もそれを生かしてスキルを磨きました。結果新卒でフリーランスとして働き、やりたいこともやりながら生活しています！</span>
                            <span>25歳 前田弘二</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="{{route('voice')}}" class="pub-btn">詳細はこちら<i
                        class="fas fa-angle-right"></i></a>
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
</x-app-layout>
