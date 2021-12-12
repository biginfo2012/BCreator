<x-user-layout>
    <div class="wrp_my-box archive">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="my-sec">
                    <div class="c-title"><span>タイトルタイトルタイトル</span> <span>コメントコメントコメントコメントコメント</span></div>
                    <div class="wrp-lesson-box">
                        <div class="flex fx-wrp">
                            <div class="lesson-img"><img src="{{ asset('images/com01.png') }}"></div>
                            <div class="lesson-box">
                                <div class="box-title"><span>タイトルタイトルタイトルタイトルタイトル</span> <span>目安時間：30分</span></div>
                                <div class="box-text">
                                    <span>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</span>
                                </div>
                                <div class="box-btn">
                                    <div class="flex fx-ced">
                                        <a href="{{ route('lesson-temp') }}" class="lesson-btn">レッスンを始める</a>
                                        <a href="{{ route('review-temp') }}" class="review-btn">復習する</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrp-lesson-box">
                        <div class="flex fx-wrp">
                            <div class="lesson-img"><img src="{{ asset('images/com01.png') }}"></div>
                            <div class="lesson-box">
                                <div class="box-title"><span>タイトルタイトル</span> <span>目安時間：30分</span></div>
                                <div class="box-text"><span>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</span>
                                </div>
                                <div class="box-btn">
                                    <div class="flex fx-ced">
                                        <a href="{{ route('lesson-temp') }}" class="lesson-btn">レッスンを始める</a>
                                        <a href="{{ route('review-temp') }}" class="review-btn">復習する</a>
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
