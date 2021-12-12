<x-user-layout>
    <div class="wrp_my-box">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="my-sec">
                    <div class="my-info">
                        <div class="flex fx-coc fx-itc fx-wrp">
                            <div class="item prof">
                                <div class="flex fx-itc fx-wrp">
                                    <img src="{{ asset('images/no_img_head.png') }}">
                                    <span>{{ \Illuminate\Support\Facades\Auth::user()->first_name }}  {{ \Illuminate\Support\Facades\Auth::user()->last_name }}</span>
                                </div>
                            </div>
                            <div class="box lank">
                                <div class="flex fx-itc fx-wrp fx-coc">
                                    <div class="item"></div>
                                    <div class="item-tit"><span>白帯</span></div>
                                    <div class="text"><span>学習ランク</span></div>
                                </div>
                            </div>
                            <div class="box finish">
                                <div class="flex fx-itc fx-wrp fx-coc">
                                    <div class="item"></div>
                                    <div class="finish-count"><span>10</span></div>
                                    <div class="text"><span>修了レッスン数</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                         <div class="my-alert">                             <span>※受講期間終了が近づいています。詳しくは会員ステータスをご確認ください。</span>                         </div> -->
                </div>
                <div class="my-sec">
                    <div class="my-sec-tit">
                        <span>学習中のレッスン</span>
                        <a href="{{ route('archive-curriculum') }}">カリキュラム一覧へ<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="wrp-lesson-block">
                        <div class="still-block"><span>学習中のカリキュラムはありません。カリキュラム一覧は<a href="">こちら</a></span></div>
                        <div class="lesson-block">
                            <div class="flex fx-wrp">
                                <div class="item"><img src="{{ asset('images/com01.png') }}"></div>
                                <div class="box">
                                    <div class="box-title one_sent_hide sp_lift"><span>カリキュラムカリキュラムカリキュラム</span></div>
                                    <div class="box-content">
                                        <div class="flex fx-bet fx-wrp">
                                            <div class="item-title">
                                                <span>タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル</span></div>
                                            <div class="item-btn"><a class="continu-btn">続きからはじめる</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-sec">
                    <div class="my-sec-tit">
                        <span>修了したカリキュラム</span> <a href="{{ route('archive-test') }}">テスト一覧へ<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="wrp-completion-block">
                        <div class="still-block"><span>修了したカリキュラムはありません。復習カリキュラム一覧は<a href="#">こちら</a></span></div>
                        <div class="flex fx-wrp">
                            <div class="wrp-box">
                                <div class="box">
                                    <div class="box-tit"><span class="one_sent_hide sp_lift">タイトルタイトルタイトル</span> <span
                                            class="one_sent_hide sp_lift">カリキュラムカリキュラム</span></div>
                                    <div class="box-img"><img src="{{ asset('images/com01.png') }}"></div>
                                    <div class="box-btn">
                                        <a class="review-btn" href="#">復習する</a>
                                        <a class="test-btn" href="#">テストを受ける</a>
                                    </div>
                                </div>
                            </div>
                            <div class="wrp-box">
                                <div class="box">
                                    <div class="box-tit"><span class="one_sent_hide sp_lift">タイトルタイトルタイトル</span> <span
                                            class="one_sent_hide sp_lift">カリキュラムカリキュラム</span></div>
                                    <div class="box-img"><img src="{{ asset('images/com01.png') }}"></div>
                                    <div class="box-btn">
                                        <a class="review-btn" href="#">復習する</a>
                                        <a class="test-btn" href="#">テストを受ける</a>
                                    </div>
                                </div>
                            </div>
                            <div class="wrp-box">
                                <div class="box">
                                    <div class="box-tit"><span class="one_sent_hide sp_lift">タイトルタイトルタイトル</span> <span
                                            class="one_sent_hide sp_lift">カリキュラムカリキュラム</span></div>
                                    <div class="box-img"><img src="{{ asset('images/com01.png') }}"></div>
                                    <div class="box-btn">
                                        <a class="review-btn" href="#">復習する</a>
                                        <a class="test-btn" href="#">テストを受ける</a>
                                    </div>
                                </div>
                            </div>
                            <div class="wrp-box">
                                <div class="box">
                                    <div class="box-tit"><span class="one_sent_hide sp_lift">タイトルタイトルタイトル</span> <span
                                            class="one_sent_hide sp_lift">カリキュラムカリキュラム</span></div>
                                    <div class="box-img"><img src="{{ asset('images/com01.png') }}"></div>
                                    <div class="box-btn">
                                        <a class="review-btn" href="#">復習する</a>
                                        <a class="test-btn" href="#">テストを受ける</a>
                                    </div>
                                </div>
                            </div>
                            <div class="wrp-box">
                                <div class="box">
                                    <div class="box-tit"><span class="one_sent_hide sp_lift">タイトルタイトルタイトル</span> <span
                                            class="one_sent_hide sp_lift">カリキュラムカリキュラム</span></div>
                                    <div class="box-img"><img src="{{ asset('images/com01.png') }}"></div>
                                    <div class="box-btn">
                                        <a class="review-btn" href="#">復習する</a>
                                        <a class="test-btn" href="#">テストを受ける</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-side">
                <div class="wrp-cale-box">
                    <div class="side-sec-tit"><span>学習履歴カレンダー</span></div>
                    <span>カレンダーが入ります。</span></div>
                <div class="wrp-search-box">
                    <div class="side-sec-tit"><span>コンテンツ検索</span></div>
                    <div class="flex"><input type="search" name="search" placeholder="キーワードを入力">
                        <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
