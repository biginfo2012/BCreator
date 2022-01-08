<x-user-layout>
    <div class="wrp_my-box archive">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="my-sec">
                    <div class="c-title"><span>{{$curriculum->title}}</span> <span>{{$curriculum->detail}}</span></div>
                    @foreach($lessons as $item)
                        <div class="wrp-lesson-box">
                            <div class="flex fx-wrp">
                                <div class="lesson-img"><img style="height: 100%" src="{{ asset($item->thumbnail) }}"></div>
                                <div class="lesson-box">
                                    <div class="box-title"><span>{{$curriculum->title}}</span> <span>目安時間：{{$item->time}}分</span></div>
                                    <div class="box-text">
                                        <span>{{$item->title}}</span>
                                    </div>
                                    <div class="box-btn">
                                        <div class="flex fx-ced">
                                            <a href="{{ route('lesson-temp', $item->id) }}" class="lesson-btn">レッスンを始める</a>
                                            <a {{ isset($item->review) && $item->review->public_status == 1 ? 'href=' . route('review-temp', $item->review->id) : '' }} class="review-btn {{ isset($item->review) && $item->review->public_status == 1 ? '' : 'review-disabled' }}">復習する</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="my-sec" id="finish_part" style="{{$finish == 1 ? 'display: none;' : ''}}">
                    <div class="curriculum-summary">
                        <div class="item_title">
                            <span>学習を完了したら、完了ボタンをクリックしてください。</span>
                        </div>
                        <div class="end_box text-center mt-4">
                            <a class="end_btn" data-id="{{$curriculum->id}}">完了</a>
                        </div>
                    </div>
                </div>
                <div class="my-sec" id="review_part" style="{{$finish == 0 ? 'display: none;' : ''}}">
                    <div class="curriculum-summary">
                        <div class="item_title">
                            <span>カリキュラムの総復習/テスト</span>
                        </div>
                        <div class="flex fx-wrp fx-bet">
                            <a class="review-btn {{count($curriculum->review) && $curriculum->review[0]->public_status == 1 ? '' : 'review-disabled'}}" {{ count($curriculum->review) && $curriculum->review[0]->public_status == 1 ? 'href=' . route('review-temp', $curriculum->review[0]->id) : '' }}>復習する</a>
                            <a class="test-btn {{count($curriculum->test) && $curriculum->test[0]->public_status == 1 ? '' : 'test-disabled'}}" {{ count($curriculum->test) && $curriculum->test[0]->public_status == 1 ? 'href=' . route('test-temp', $curriculum->test[0]->id) : '' }}>テストを受ける</a>
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
    <script>
        let curriculum_finish = '{{route('curriculum-finish')}}';
        $(document).ready(function () {
            $('.end_btn').click(function () {
                let id = $(this).data('id');
                actionIdWithout(id, curriculum_finish, '完了しました。')
                $('#finish_part').hide();
                $('#review_part').show();
            })

            $('.review-disabled').click(function () {
                $.growl.warning({
                    title: "警告",
                    message: '該当する復習が登録されていません。'
                });

            })
            $('.test-disabled').click(function () {
                $.growl.warning({
                    title: "警告",
                    message: '該当するテストが登録されていません。'
                });

            })
        })

    </script>
</x-user-layout>
