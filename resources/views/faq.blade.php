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
    <div class="bread-box bg_white">
        <div class="container">
            <!-- Breadcrumb NavXT 6.6.0 -->
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to b-Creator:21リニューアル_テスト."
                   href="{{url('/')}}" class="home">
                    <span property="name">TOP</span>
                </a>
                <meta property="position" content="1"></span> &gt;
            <span property="itemListElement" typeof="ListItem">
                <span property="name" class="post post-page current-item">よくある質問</span>
                <meta property="url" content="{{route('faq')}}">
                <meta property="position" content="2">
            </span>
        </div>
    </div>
    <div class="fix-box" id="faq-nav">
        <div class="container v2">
            <div class="faq-nav">
                <div class="fx-bet fx-wrp">
                    <div class="tab active">
                        <span>サービス内容について<i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="tab">
                        <span>無料カウンセリングについて<i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="tab">
                        <span>受講生について<i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="tab">
                        <span>料金・割引について<i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="tab">
                        <span>受講期間について<i class="fas fa-angle-down"></i></span>
                    </div>
                    <div class="tab">
                        <span>その他<i class="fas fa-angle-down"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-box bg_white" id="faq-box">
        <div class="container v2">
            <div class="wrp-tab-box tab-item show">
                <div class="title">
                    <span>サービス内容について</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>まったくの未経験者なのですが、講義についていけますか</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorのカリキュラムは未経験の方が結果を出せるよう作られています。実際、受講生の約7割がweb未経験で、独立・キャリアアップなどの夢を叶えられています。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>現在、仕事をしているのですが、働きながら通えますか</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorは隙間時間にスマホでも学習しやすいようにカリキュラム・システムの設計をしております。ですので、通勤中や休憩中をうまく使いながら学習されている受講生も多くおります。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>他のWebスクールとの違いはなんですか</span>
                        </div>
                        <div class="item a">
                            <span>他のスクールでは、Webデザインのスキルのみ、動画編集のスキルのみを教えている場合がほとんどですが、b-Creatorでは“稼ぐ”ために必要なスキルを漏れなく全て教えております。詳しくは<a
                                    href="{{route('curriculum')}}">こちら</a></span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>講義は何度も受けることはできますか</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorは受講時から「時間と場所にとらわれない」を体感していただくべく、テキスト・動画 + テストで作られています。ですので、ライブ講義のように一度しか見られないシステムにはなっておりません。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>どのように学習を進めていくのですか</span>
                        </div>
                        <div class="item a">
                            <span>まずはテキストで主体的なインプットを行い、次に動画で2回目のインプット、そして復習用のテキストでまとめ、穴埋め形式のテストで確実に定着させます。このように他のスクールにはないスキル習得のためのフローが整っているのです。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>ライティングと動画編集の両方を学べるのですか</span>
                        </div>
                        <div class="item a">
                            <span>両方とも基礎から専門的なところまで学べます。ただ未経験の方がいきなり動画編集をするのは正直難しいと考えているので、まずはライティングで稼ぐスキルをつけていただき、その上で動画編集を学んでいただくのが最も効率的だと思います。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>サポート体制はどうなっているのですか</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorの受講期間は3ヶ月間となっています。その間、チャットでの質問は終日し放題ですぐに返答が来る形式となっています。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングを受けず、すぐに受講開始することはできますか</span>
                        </div>
                        <div class="item a">
                            <span>可能です。専用の受講申し込みフォームより手続きいただければ即日受講を開始することができます。専用フォームは<a
                                    href="https://b-creator.test-h.biz/counseling/">こちら</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrp-tab-box tab-item">
                <div class="title">
                    <span>無料カウンセリングについて</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングでは何をしますか</span>
                        </div>
                        <div class="item a">
                            <span>受講の目的や今後の目標についてのヒアリング、目標を最短で達成するための学習計画を提案やb-Creatorの詳細について説明します。詳しくは<a
                                    href="https://b-creator.test-h.biz/counseling/">こちら</a></span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングにお金はかかりますか、またどのくらいの時間がかかりますか</span>
                        </div>
                        <div class="item a">
                            <span>無料となっております。また、カウンセリングは1時間程度となっています。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングはどのような形式で行っていますか</span>
                        </div>
                        <div class="item a">
                            <span>カウンセリングはビデオ通話と音声通話のどちらかをお選びいただくことができます。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングは当日予約でも大丈夫ですか</span>
                        </div>
                        <div class="item a">
                            <span>当日でも空いている枠があれば予約可能です。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>カウンセリングを受けず、すぐに受講開始することはできますか</span>
                        </div>
                        <div class="item a">
                            <span>可能です。専用の受講申し込みフォームより手続きいただければ即日受講を開始することができます。専用フォームは<a
                                    href="https://b-creator.test-h.biz/counseling/">こちら</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrp-tab-box tab-item">
                <div class="title">
                    <span>受講生について</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>パソコンをほとんど使ったことがないのですが大丈夫ですか</span>
                        </div>
                        <div class="item a">
                            <span>普段からスマートフォンで検索したり、アプリを使ったりするなどの経験があれば十分です。また受講自体はスマートフォンのみで可能なので、PCの購入については受講後でも問題はありません。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>仕事が忙しく受講しきれるか不安です、大丈夫ですか</span>
                        </div>
                        <div class="item a">
                            <span>受講期間は3ヶ月間となっておりますが、期間の延長のシステムも取り揃えております。費用はかかりますが、受講料金とは別で安く設定しておりますので、ご相談ください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>これまでどれくらいの受講生がいますか</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorは前進のサービスも含め2021年で4年目となります。受講生の数は1000人を超え、今後もより多くの方が結果を残せるように講座をアップデートしております。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>30歳を超えていても利用することはできますか</span>
                        </div>
                        <div class="item a">
                            <span>はい、可能です。転職の業界においては30歳を超えるとハードルが上がると言われていますが、フリーランスの世界では実力が全てです。しっかりとした教育のもとで学べばすぐに差をつけることができます。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>未成年でも受講することはできますか</span>
                        </div>
                        <div class="item a">
                            <span>受講可能です。ただし、お申し込みをされる際は必ず保護者の方と相談し、受講されるようにしてください。</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrp-tab-box tab-item">
                <div class="title">
                    <span>料金・割引について</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>料金体系をどのようになっていますか</span>
                        </div>
                        <div class="item a">
                            <span>現在は単一のコースでのみサービスを展開しており、受講料は一括支払いで298,000円となっております。詳しくは<a
                                    href="{{route('price')}}">こちら</a>をご参照ください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>支払い方法には何がありますか</span>
                        </div>
                        <div class="item a">
                            <span>お支払い方法は、クレジットカード、銀行振込(一括のみ)の2つを用意しております。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>受講料を分割で支払うことはできますか</span>
                        </div>
                        <div class="item a">
                            <span>クレジットカードでの分割を利用することが可能です。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>受講を始めてから、別料金が発生することはありますか。</span>
                        </div>
                        <div class="item a">
                            <span>基本的にはありません。しかし、受講期間の3ヶ月間をすぎると別料金がかかってきますので、期間を守って受講するようにしてください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>どのような割引制度がありますか</span>
                        </div>
                        <div class="item a">
                            <span>割引については<a href="https://b-creator.test-h.biz/discount/">こちら</a>をご参照ください。</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrp-tab-box tab-item">
                <div class="title">
                    <span>受講期間について</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>学習期間はどれくらいですか</span>
                        </div>
                        <div class="item a">
                            <span>現在は3ヶ月間の受講プランのみの提供となります。ただ3ヶ月を超えての受講も可能ですので、ご希望の方は無料カウンセリング時にお伝えください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>学習期間内に学習が終わらなかった場合、学習期間の延長は可能ですか</span>
                        </div>
                        <div class="item a">
                            <span>学習進捗が遅れてしまった場合、当社が定めた料金のお支払いを続けていただくことにより学習期間の延長が可能です。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>入学の時期は決まっていますか</span>
                        </div>
                        <div class="item a">
                            <span>b-CreatorはいつからでもスタートできるWebスクールになっています。思い立ったが吉日、やる気が湧いたその日から受講を始めることで、一気に成長できますので、ぜひご検討ください。</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrp-tab-box tab-item">
                <div class="title">
                    <span>その他</span>
                </div>
                <div class="inner-faq">
                    <div class="box">
                        <div class="item q">
                            <span>自分がフリーランスに向いているのか不安です</span>
                        </div>
                        <div class="item a">
                            <span>b-Creatorを受講する9割以上の方が、webでの経験や知識がほとんどない未経験の方です。しかし、それでもほとんどの方がwebを使ってお金を稼げるようになっています。未経験の方が結果を出せるようにカリキュラムを組んでおり講師も全力でサポートしていますのでご安心ください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>ソフトを持っていなくても大丈夫ですか</span>
                        </div>
                        <div class="item a">
                            <span>動画編集ソフトに関してはAdobe Premiere Proをおすすめしておりますが、基本的にご自身にあったものをお使いいただいて構いません。ソフトの使い方よりも、センスと言われる部分(例えばカットのコマンドを教えるのではなくカットするタイミングを教えるなど)を講義しております。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>卒業後、就職・転職を目指しているのですが大丈夫ですか</span>
                        </div>
                        <div class="item a">
                            <span>転職斡旋は基本的にしておりませんが、個別にサポートさせていただいております。無料カウンセリング時にご相談ください。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>自宅のインターネット環境構築に関するサポートはありますか</span>
                        </div>
                        <div class="item a">
                            <span>いいえ、ございません。インターネット環境はご自身でのご用意をお願いいたします。またb-Creatorの受講はスマホでも可能ですので、ご自宅の環境構築は受講しながらでも問題ありません。</span>
                        </div>
                    </div>
                    <div class="box">
                        <div class="item q">
                            <span>海外からでも受講は可能でしょうか</span>
                        </div>
                        <div class="item a">
                            <span>はい、可能です。b-Creatorはオンラインでのサービスになりますので、場所・時間を問わず受講することが可能です。</span>
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
