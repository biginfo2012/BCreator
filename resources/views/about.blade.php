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
                    <a href="#fix-about" class="f-btn move-link">
                        <span>b-Creatorについて</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-feature" class="f-btn move-link">
                        <span>b-Creatorの特徴</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-reason" class="f-btn move-link">
                        <span>なぜ結果が出るのか</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bread-box bg_white">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage"
                   title="Go to b-Creator:21リニューアル_テスト."
                   href="{{url('/')}}"
                   class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1">
            </span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">b-Creatorについて</span>
                <meta property="url" content="{{route('about')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="cach-box bg_white">
        <div class="container">
            <span>“個人で稼ぐ力を身につける”</span>
        </div>
    </div>
    <div class="fix-box bg_white">
        <div class="container v3">
            <div class="about-box" id="fix-about">
                <div class="flex fx-coc fx-wrp-rev fx-itc about-item">
                    <div class="item">
                        <img src="{{asset('images/fa01.png')}}">
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <span>About</span>
                            <span>b-Creatorについて</span>
                        </div>
                        <div class="content">
                            <span>スキルを身につけた先にどうしたいのか、<br>そこまで考え抜かれて作られたのがb-Creatorです。</span>
                        </div>
                    </div>
                </div>
                <div class="about-contents">
                    <div class="fx-bet fx-wrp">
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico01.png')}}">
                                    <span>稼ぐためのWebスキルを学べる</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>WEBマーケティングを軸に、“稼ぐ”に特化したb-Creator独自の講義を行なっています。詳しい学習内容は<a
                                        href="{{route('curriculum')}}">こちら</a></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico02.png')}}">
                                    <span>起業・独立・副業の一歩目</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>Webスキルをつけるためでなく、起業・独立・副業をしっかりと始められるようにカリキュラムを組んでいます。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico03.png')}}">
                                    <span>時間、場所にとらわれない受講スタイル</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>学ぶ時から場所・時間に縛られないよう、動画とテキストを使いながらスマホでも受講しやすくなっています。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico04.png')}}">
                                    <span>短期間で結果が出る学習形態</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>テキストで主体的なインプット、動画で受動的インプット、テストで復習・アウトプットすることで確実に定着します。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-box" id="fix-feature">
                <div class="flex fx-coc fx-wrp-rev fx-itc about-item">
                    <div class="item">
                        <img src="{{asset('images/fa02.png')}}">
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <span>Feature</span>
                            <span>b-Creatorの特徴</span>
                        </div>
                        <div class="content">
                            <span>コスト・コンテンツ・クオリティ<br>どれを取っても業界No.1のWebスクールです。</span>
                        </div>
                    </div>
                </div>
                <div class="about-contents">
                    <div class="fx-bet fx-wrp">
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico05.png')}}">
                                    <span>未経験に特化したカリキュラム</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>講義では必ず、そのスキルや論理を学ぶ“意味・目的”から教えるなど、スムーズなインプットを促すための工夫をしています。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico06.png')}}">
                                    <span>インプット・アウトプットの仕組みが整っている</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>インプットだけのWebスクールが大半ですが、b-Creatorはテキスト・動画・復習・テストのフローが体系化されています。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico07.png')}}">
                                    <span>圧倒的なコストパフォーマンス</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>豊富なコンテンツを取り揃えているのに対し受講費は業界最安値。詳しい受講料金については<a
                                        href="https://b-creator.test-h.biz/price/">こちら</a></span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico08.png')}}">
                                    <span>講師に質問し放題</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>b-Creatorでは受講期間中の疑問・質問は講師に聞き放題!! わからないことはその場で解決できます。</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-box" id="fix-reason">
                <div class="flex fx-coc fx-wrp-rev fx-itc about-item">
                    <div class="item">
                        <img src="{{asset('images/fa03.png')}}">
                    </div>
                    <div class="item">
                        <div class="item-title">
                            <span>Reason</span>
                            <span>なぜ結果が出るのか</span>
                        </div>
                        <div class="content">
                            <span>他のWebスクールで失敗し<br>b-Creatorで再挑戦する方も増えています。</span>
                        </div>
                    </div>
                </div>
                <div class="about-contents">
                    <div class="fx-bet fx-wrp">
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico09.png')}}">
                                    <span>受講生の学習データをもとに常にアップデート</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>b-Creatorの教材は常に更新されます。変化する時代に不変的なコンテンツでは対応はできません。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico10.png')}}">
                                    <span>現役のWebマーケターがカリキュラムを制作</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>今のトレンド、これからのトレンドを盛り込みながら、即実践できるカリキュラムを制作しています。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico12.png')}}">
                                    <span>“稼ぐ”ことを目的としている</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>他のスクールではスキルを習得することが目的になってしまい、結果がでないことがよくあります。</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-title">
                                <div class="flex fx-itc">
                                    <img src="{{asset('images/ico11.png')}}">
                                    <span>一人ひとりの力を引き出すコンテンツ</span>
                                </div>
                            </div>
                            <div class="content">
                                <span>b-Creatorはビジネスの基礎から固めるため、あなたのやりたいことに必ず繋がるようなコンテンツになっています。</span>
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
