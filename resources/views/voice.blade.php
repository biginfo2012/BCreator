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
                    <a href="#fix-voice" class="f-btn move-link">
                        <span>受講生のbefre→after</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#fix-review" class="f-btn move-link">
                        <span>カスタマーレビュー</span>
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
                <meta property="position" content="1"></span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">受講生の声</span>
                <meta property="url" content="{{route('voice')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box" id="fix-voice">
        <div class="container v2">
            <div class="fix-title">
                <span>REAL VOICE</span>
                <span>受講生のbefre→after</span>
            </div>
            <div class="voice-slick-box">
                <div class="sli-nav flex">
                    <div class="s-n-item"><span>会社員→Webマーケター</span></div>
                    <div class="s-n-item"><span>未経験→副業収入5万円UP</span></div>
                    <div class="s-n-item"><span>新卒→フリーランス</span></div>
                </div>
                <ul class="voice-slider">
                    <li class="sli-item">
                        <img class="sm-hidden" src="{{asset('images/fv01.png')}}">
                        <img class="pc-hidden" src="{{asset('images/fv01_sm.png')}}">
                        <span class="img-tit">人生100年時代、老後2000万円問題...<br>40歳を超える普通の会社員を変えてくれたのがb-Creatorでした。</span>
                        <div class="fx-bet fx-wrp">
                            <div class="item"><span>会社員時代</span> <span>満員電車に残業はもう当たり前でしたが、コロナ禍でも変わらない会社の体制には本当に耐えきれなくなっていました。</span>
                            </div>
                            <div class="item"><span>b-Creatorでの学習</span> <span>未経験の方がフリーランスとして成功できるように基礎の基礎から固めてくれるので、学習の度に安心できました。</span>
                            </div>
                            <div class="item"><span>フリーランスになって</span> <span>時間と場所に縛られず生活できるのが一番の喜びです。あの頃には考えられないほど生活に自由が増えました。</span>
                            </div>
                        </div>
                    </li>
                    <li class="sli-item">
                        <img class="sm-hidden" src="{{asset('images/fv01.png')}}">
                        <img class="pc-hidden" src="{{asset('images/fv01_sm.png')}}">
                        <span class="img-tit">僕にとっての副業収入はスタートに過ぎません。<br>b-Creatorはまだまだその先まで見せてくれるwebスクールです。</span>
                        <div class="fx-bet fx-wrp">
                            <div class="item"><span>なぜ受講したのか</span> <span>会社で副業解禁されたのがきっかけですが、webスクールは二つ目です。“稼ぐ”をテーマとしているところに惹かれました。</span>
                            </div>
                            <div class="item"><span>b-Creatorでの学習</span> <span>学習の方法・時間の使い方から学習できるため、効率が高まることはもちろん、直後の結果に直結する学びを得られます。</span>
                            </div>
                            <div class="item"><span>今後の展望</span> <span>本業から副業に転換するため時間配分を変えていくのと、自分が時間を使わなくても良いように仕組み化を進めています。</span>
                            </div>
                        </div>
                    </li>
                    <li class="sli-item">
                        <img class="sm-hidden" src="{{asset('images/fv01.png')}}">
                        <img class="pc-hidden" src="{{asset('images/fv01_sm.png')}}">
                        <span class="img-tit">普通の就職にもう未来は無いと考えていました。<br>新卒フリーランス、それを実現できるのがb-Creatorです。</span>
                        <div class="fx-bet fx-wrp">
                            <div class="item"><span>受講への不安</span> <span>正直不安はありました。しかし、カウンセリングを受けてコンテンツの質・サポートの充実を確信し受講に至りました。</span>
                            </div>
                            <div class="item"><span>b-Creatorでの学習</span> <span>受講後、即実践できるのは驚きでした。いつか役に立つ大学の講義と違い、実践的な学習が自分を大きく成長させました。</span>
                            </div>
                            <div class="item"><span>フリーランスの生活</span> <span>仕事の数をコントロールできるため、収入源を増やしたり、時間を作ってスキルUPに当てたりして自由に過ごしています。</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white scr_tg" id="fix-review">
        <div class="container">
            <div class="fix-title">
                <span>REVIEW</span>
                <span>カスタマーレビュー</span>
            </div>
            <div class="content">
                <div class="fx-bet fx-itc fx-wrp">
                    <div class="item">
                        <span>b-Creatorは、<br class="pad-block">受講生の多くから<br class="pad-hidden">素晴らしい評価をいただいております</span>
                        <span>2020年8月以降の受講生の中でご了承いただけた方のみ掲載</span>
                    </div>
                    <div class="box">
                        <span class="box-title">総合評価</span>
                        <div class="flex fx-coc fx-itc avg">
                            <span>4.59</span>
                            <span>(87件)</span>
                            <img src="{{asset('images/score.png')}}">
                        </div>
                        <div class="wrp-graph">
                            <div class="flex fx-coc graph-item">
                                <span>5つ</span>
                                <span><img src="{{asset('images/bou01.png')}}"></span>
                                <span>68%</span>
                            </div>
                            <div class="flex fx-coc graph-item">
                                <span>4つ</span>
                                <span><img src="{{asset('images/bou02.png')}}"></span>
                                <span>27%</span>
                            </div>
                            <div class="flex fx-coc graph-item">
                                <span>3つ</span>
                                <span><img src="{{asset('images/bou03.png')}}"></span>
                                <span>3%</span>
                            </div>
                            <div class="flex fx-coc graph-item">
                                <span>2つ</span>
                                <span><img src="{{asset('images/bou04.png')}}"></span>
                                <span>1%</span>
                            </div>
                            <div class="flex fx-coc graph-item">
                                <span>1つ</span>
                                <span><img src="{{asset('images/bou04.png')}}"></span>
                                <span>1%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-box">
                <div class="tab-area flex">
                    <div class="tab active">
                        <span>★5 <br class="pc-hidden">レビュー</span>
                    </div>
                    <div class="tab">
                        <span>★4 <br class="pc-hidden">レビュー</span>
                    </div>
                    <div class="tab">
                        <span>★3 <br class="pc-hidden">レビュー</span>
                    </div>
                    <div class="tab">
                        <span>★2 <br class="pc-hidden">レビュー</span>
                    </div>
                    <div class="tab">
                        <span>★1 <br class="pc-hidden">レビュー</span>
                    </div>
                </div>
                <div class="tab-item-area">
                    <div class="tab-item show">
                        <div class="wrp-review">
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>5.0</span>
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="word">
                                            <span>b-Creatorに出会えてよかった！<br>迷ってる時間がもったいなかったです。</span>
                                        </div>
                                        <div class="name">
                                            <span>G.Oさん</span>
                                            <span>男性|30代|会社員|21年7月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>私は受講に至るまで1ヶ月も迷っていました。しかし、今ではその時間を受講に当てればよかったと後悔しています。それくらい質が高い講座となっています。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>5.0</span>
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="word">
                                            <span>退職を考えているときに出会い、<br>無事フリーランスに転職できました！</span>
                                        </div>
                                        <div class="name">
                                            <span>M.Mさん</span>
                                            <span>女性|20代|元広告代理店勤務|21年5月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>コロナによって会社の売り上げが落ちたことがきっかけで受講しました。仕事と学習を両立できたので、退職後安心してフリーランスになることができました。サポートくださった講師の方にはとても感謝しています。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>5.0</span>
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="word">
                                            <span>自己管理能力を上げてくれるカリキュラムとサポートの充実性に驚きました</span>
                                        </div>
                                        <div class="name">
                                            <span>F.Sさん</span>
                                            <span>男性|30代|不動産会社勤務|21年5月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>今まで自分の人生を考えさせられるほど、根本を変えてくれる講義ばかりでした。時間管理・学習設計から学ぶことができるので、しっかりと目標までたどり着くための学習ができました。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>5.0</span>
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="word">
                                            <span>大学に数百万円支払って学びにいっている意味が正直わからなくなりました(笑)</span>
                                        </div>
                                        <div class="name">
                                            <span>H.Tさん</span>
                                            <span>男性|20代|大学生|21年4月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>SEOライティング・動画編集のスキルを高いレベルで身につけられたのはもちろん、受講しながら実践すれば受講費を払いながら学習できるので、コスパは最強です。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>5.0</span>
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="word">
                                            <span>家事をしながら学習ができて、<br>副収入にも繋がったので非常に満足です。</span>
                                        </div>
                                        <div class="name">
                                            <span>O.Yさん</span>
                                            <span>女性|30代|主婦|21年4月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>スマホを使って家事をしながら学習できたのが一番の満足ポイントです。PCに面と向かって学習しなければならないwebスクールばかりですが、b-Creatorは学習体系がしっかりしているので、スマホでもしっかり身につきました！</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp-review">
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>4.0</span>
                                            <span>★★★★☆</span>
                                        </div>
                                        <div class="word">
                                            <span>他のスクールで失敗している自分を<br class="sm-hidden">きっちり結果に導いてくれました！</span>
                                        </div>
                                        <div class="name">
                                            <span>K.Kさん</span>
                                            <span>男性|30代|フリーランス|21年5月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>私は一度他のスクールで失敗しているため、他の誰よりも不安が大きかったと思います。しかし、受講前から講師の方が優しく寄り添ってくれたため結果に繋がったと思います。コンテンツのクオリティは別格です。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>4.0</span>
                                            <span>★★★★☆</span>
                                        </div>
                                        <div class="word">
                                            <span>“稼ぐ”を学習できるのは<br class="pc-hidden">b-Creatorだけだと思います！</span>
                                        </div>
                                        <div class="name">
                                            <span>H.Kさん</span>
                                            <span>男性|20代|大学生|21年5月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>なぜ、この教材が学校教育で使われないのか疑問になるほど全員に必要な学習内容だと思いました。学習に迷ってる方がいるならその時間が無駄だと思います。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>4.0</span>
                                            <span>★★★★☆</span>
                                        </div>
                                        <div class="word">
                                            <span>間違いなくビジネス力は上がります。失敗するのはちゃんと受講しなかった人だけ。</span>
                                        </div>
                                        <div class="name">
                                            <span>S.Tさん</span>
                                            <span>女性|40代|主婦|21年3月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>webの世界を学ぶきっかけとなり、現状の課題・やるべきことが明確になりました。それなりに金額がかかるので、本気でwebのスキルを身につけたい・フリーランスになりたいと思う方に勧めたいと思います。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>4.0</span>
                                            <span>★★★★☆</span>
                                        </div>
                                        <div class="word">
                                            <span>受講後も続けられるように学習設計の仕方から教えてくれます。</span>
                                        </div>
                                        <div class="name">
                                            <span>F.Kさん</span>
                                            <span>男性|30代|会社員|21年1月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>復習までちゃんとできなかったことを反省しています。スキルはもちろんですが、ここで学んだ自己管理を今後も続けて成長し続けられるよう頑張ります。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>4.0</span>
                                            <span>★★★★☆</span>
                                        </div>
                                        <div class="word">
                                            <span>私の性格に寄り添ってサポートしていただけました。</span>
                                        </div>
                                        <div class="name">
                                            <span>I.Mさん</span>
                                            <span>女性|20代|大学生|20年12月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>私のネガティブな部分を理解していただき、優しく、そしてときには結果に繋がるよう理論的に指導してくださいました。本当にありがとうございました。</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp-review">
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>3.0</span>
                                            <span>★★★☆☆</span>
                                        </div>
                                        <div class="word">
                                            <span>目標の約7割の達成だったため星3つとさせていただきました。</span>
                                        </div>
                                        <div class="name">
                                            <span>T.Nさん</span>
                                            <span>男性|20代|フリーランス|21年3月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>3ヶ月の受講期間で毎月15万円以上稼ぐことを目標としていましたが、達成できなかったため星3としました。まだまだ伸び代はあると思うのでこのまま続ければ大丈夫かと思います。今までありがとうございました。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>3.0</span>
                                            <span>★★★☆☆</span>
                                        </div>
                                        <div class="word">
                                            <span>もう少し安ければ他の人にお勧めできる</span>
                                        </div>
                                        <div class="name">
                                            <span>Y.Kさん</span>
                                            <span>女性|20代|大学生|20年11月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>大学生の私にとっては少し金額が高いと感じました。でも、コンテンツは素晴らしいので、もう少し金額を下げてくれれば多くの人にお勧めできると感じました。</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>3.0</span>
                                            <span>★★★☆☆</span>
                                        </div>
                                        <div class="word">
                                            <span>可もなく不可もなく普通だと思います。</span>
                                        </div>
                                        <div class="name">
                                            <span>N.Dさん</span>
                                            <span>男性|30代|会社員|20年9月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>理由は特にありません。ありがとうございました。</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp-review">
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>2.0</span>
                                            <span>★★☆☆☆</span>
                                        </div>
                                        <div class="word">
                                            <span>私には受講期間があっていなかった。3ヶ月では足りない。</span>
                                        </div>
                                        <div class="name">
                                            <span>E.Sさん</span>
                                            <span>男性|40代|会社員|20年8月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>コンテンツのボリュームが非常に多く、全てを学び切ることができませんでした。</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-item">
                        <div class="wrp-review">
                            <div class="item">
                                <div class="item-title">
                                    <div class="flex fx-itc">
                                        <div class="star">
                                            <span>1.0</span>
                                            <span>★☆☆☆☆</span>
                                        </div>
                                        <div class="word">
                                            <span>理解はできるが行動に移すことができなかった。</span>
                                        </div>
                                        <div class="name">
                                            <span>K.Kさん</span>
                                            <span>男性|30代|会社員|20年9月修了</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <span>自分の力不足もあると思うが、理解にとても時間がかかった。本業に力を注いだ方が効率が良いことに気がついた。</span>
                                </div>
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
