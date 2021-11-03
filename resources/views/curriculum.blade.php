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
                    <a href="#fix-earn" class="f-btn move-link">
                        <span>お金を稼ぐとは</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-contents" class="f-btn move-link">
                        <span>学習内容 + α</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="f-btn move-link">
                        <span>学習の流れ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bread-box">
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
                <span property="name" class="post post-page current-item">学習内容</span>
                <meta property="url" content="{{route('curriculum')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box" id="fix-earn">
        <div class="container v3">
            <div class="title">
                <span>そもそもお金を稼ぐとは!?</span>
                <br>
                <span>一般的な仕事の流れ</span>
            </div>
            <div class="fx-ex fx-wrp">
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">01</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc01.png')}}">
                        </div>
                        <div class="item">
                            <span>営業</span>
                            <span>まずはお仕事を獲得するために、取引先となるような会社を調査し提案を行います。</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">02</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc02.png')}}">
                        </div>
                        <div class="item">
                            <span>見積り・契約</span>
                            <span>提案時に予算感を伺うことが多いので、それを元に見積もりをし、全て通れば契約をします。</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">03</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc03.png')}}">
                        </div>
                        <div class="item">
                            <span>業務</span>
                            <span>己のスキルを活かし、業務を実行します。取引先と密にやり取りをしながら制作物を完成まで近づけます。</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">04</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc04.png')}}">
                        </div>
                        <div class="item">
                            <span>納品</span>
                            <span>修正と確認を繰り返しながら、完成したものを指定の形式で納品して初めて業務完了となります。</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">05</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc05.png')}}">
                        </div>
                        <div class="item">
                            <span>請求</span>
                            <span>業務によっては工数の増減が発生することもあるため、見積りとは多少異なる請求となる場合もあります。</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="wrp-box-title">
                        <div class="box-title">
                            <span class="count">06</span>
                            <span class="ab">STEP</span>
                        </div>
                    </div>
                    <div class="fx-bet">
                        <div class="item">
                            <img src="{{asset('images/fc06.png')}}">
                        </div>
                        <div class="item">
                            <span>継続・再契約</span>
                            <span>取引先が業務や結果に満足した場合、再度仕事をもらえたり契約をしてもらえることがあります。</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-box bg_blue fix-triangle" id="fix-contents">
        <div class="triangle white"></div>
        <div class="container v3">
            <div class="title">
                <div class="flex fx-coc fx-wrp">
                    <div class="item-title">
                        <span>仕事に必要なすべてのスキルを網羅</span>
                        <span>b-Creatorの学習コンテンツ</span>
                    </div>
                    <div class="item">
                        <span>むやみやたらな学習を防ぐため、学習の方法から講義</span>
                        <span>業務に必要なスキルだけでなく、営業から全てを教える</span>
                        <span>未経験でもコミュニケーションができるよう入念に基礎を固める</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>01</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico13.png')}}">
                                <div>
                                    <span>b-Creatorの学習設計</span>
                                    <span>学習設計の方法、検索能力について .etc</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>まずは、学習の仕方・スキルの習得方法を学びます。どんなスキルも自分で習得ができる自走力が身につきます。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>02</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico14.png')}}">
                                <div>
                                    <span>ビジネスの基礎</span>
                                    <span>時間と行動、PDCAサイクルについて .etc</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>結果を出すためにはWebスキルがあるだけではいけません。ビジネスの基礎から漏れなく学習します。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>03</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico15.png')}}">
                                <div>
                                    <span>マーケティング論</span>
                                    <span>リサーチ・顧客理解、マーケ手法 .etc</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>Webライティングも動画編集も全てマーケティングの上に成り立っています。これを学ばないことには次に進めません。</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detail">
                <span>未経験の方が成功するための<br class="pc-hidden">徹底した基礎学習</span>
                <span>本来学習とは目的があって成り立つものです。そしてWebスクールを受講する多くの人の目的はお金を稼ぐこと。そして、それを叶えるためにはビジネスの基礎は必要不可欠です。b-Creatorはまず常識を武器とできるような学習を始めます。</span>
            </div>
        </div>
    </div>
    <div class="fix-box fix-triangle" id="fix-a">
        <div class="triangle blue"></div>
        <div class="container v3">
            <div class="title">
                <span>さらにb-Creatorでしか学べない</span>
                <span>特別カリキュラム + α</span>
            </div>
            <div class="box">
                <div class="fx-bet fx-wrp">
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>04</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico16.png')}}">
                                <div>
                                    <span>Web営業</span>
                                    <span>ポジショニング論、ポートフォリオ .etc</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>お仕事を獲得しなければお金を稼ぐことはできません。営業の基礎からプラットフォーム攻略などを講義しています。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>05</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico17.png')}}">
                                <div>
                                    <span>Webライティング・動画編集</span>
                                    <span>*それぞれカリキュラムがあります</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>未経験の方でも馴染み深いライティング、そしてその倍の情報量を持つ動画、これらのコンテンツ作りの方法を学習します。</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-count">
                            <div class="flex fx-coc fx-itc">
                                <span>カリキュラム</span>
                                <span>06</span>
                            </div>
                        </div>
                        <div class="item-title">
                            <div class="flex fx-itc">
                                <img src="{{asset('images/ico18.png')}}">
                                <div>
                                    <span>キャリア戦略</span>
                                    <span>経験と意思決定、キャリア設計 .etc</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <span>フリーランスはキャリアを自分で積み、己で歩まなければなりません。そのシナリオ作りを学習します。</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detail">
                <span>b-Creatorのコンテンツは<br class="pc-hidden">これだけではない！！</span>
                <span>b-Creatorのコンテンツは1カリキュラムに対して、3以上のサブテーマから構成されています。また、動画とテキストを組み合わせていたり、カリキュラムごとに復習のための教材・テストがあったりするなど必ず満足のいく内容となっております。</span>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white" id="fix-flow">
        <div class="container v2">
            <div class="fix-title">
                <span>PROCESS</span>
                <span>受講・学習の流れ</span>
            </div>
            <div class="flow-box">
                <div class="flow-item">
                    <div class="item-title">
                        <span class="count">01</span>
                        <span class="ab">PROCESS</span>
                    </div>
                    <div class="fx-ex fx-wrp content">
                        <div>
                            <img src="{{asset('images/fl01.png')}}">
                        </div>
                        <div class="item">
                            <span>テキストで主体的なインプット</span>
                            <span>まずは文字を読むという習慣をつけるためにもテキストで学習します。自ら声を出しながらインプットすることで定着を促します。</span>
                        </div>
                    </div>
                </div>
                <div class="flow-item">
                    <div class="item-title">
                        <span class="count">02</span>
                        <span class="ab">PROCESS</span>
                    </div>
                    <div class="fx-ex fx-wrp content">
                        <div>
                            <img src="{{asset('images/fl02.png')}}">
                        </div>
                        <div class="item">
                            <span>動画で復習を兼ねた2回目のインプット</span>
                            <span>テキストの次に動画での学習を行うことで内容の理解を深め、即実践に移れるような状態にします。</span>
                        </div>
                    </div>
                </div>
                <div class="flow-item">
                    <div class="item-title">
                        <span class="count">03</span>
                        <span class="ab">PROCESS</span>
                    </div>
                    <div class="fx-ex fx-wrp content">
                        <div>
                            <img src="{{asset('images/fl03.png')}}">
                        </div>
                        <div class="item">
                            <span>復習用テキストでのまとめ、穴埋め形式のテスト</span>
                            <span>3回目のインプットとして復習用テキストで頭の中の整理を行い、穴埋めテストで確実に定着させます。己への自信にも繋がります。</span>
                        </div>
                    </div>
                </div>
                <div class="flow-item">
                    <div class="item-title">
                        <span class="count">04</span>
                        <span class="ab">PROCESS</span>
                    </div>
                    <div class="fx-ex fx-wrp content">
                        <div>
                            <img src="{{asset('images/fl04.png')}}">
                        </div>
                        <div class="item">
                            <span>学習したことを実際に行動しもう一歩先の学習へ</span>
                            <span>学んだことをそのまま現実世界で試して初めて本当のスタートとも言えます。実際に行うことでもう一歩先の学習にも繋がります。</span>
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
