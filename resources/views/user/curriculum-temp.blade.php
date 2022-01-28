<x-user-layout>
    <div class="wrp_my-box archive">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="my-sec">
                    <div class="c-title"><span>{{$curriculum->title}}</span> <span>{{$curriculum->detail}}</span></div>
                    <div id="dataArea">
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
                                                <a href="{{ route('lesson-temp', $item->slack) }}" class="lesson-btn">レッスンを始める</a>
                                                <a {{ isset($item->review) && $item->review->public_status == 1 ? 'href=' . route('review-temp', $item->review->slack) : '' }} class="review-btn {{ isset($item->review) && $item->review->public_status == 1 ? '' : 'review-disabled d-none' }}">復習する</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
                            <a class="review-btn {{count($curriculum->review) && $curriculum->review[0]->public_status == 1 ? '' : 'review-disabled d-none'}}" {{ count($curriculum->review) && $curriculum->review[0]->public_status == 1 ? 'href=' . route('review-temp', $curriculum->review[0]->slack) : '' }}>復習する</a>
                            <a class="test-btn {{count($curriculum->test) && $curriculum->test[0]->public_status == 1 ? '' : 'test-disabled d-none'}}" {{ count($curriculum->test) && $curriculum->test[0]->public_status == 1 ? 'href=' . route('test-temp', $curriculum->test[0]->slack) : '' }}>テストを受ける</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-side">
                <div class="side-sec-tit">
                    <div class="cal1"></div>
                </div>
                <div class="wrp-search-box">
                    <div class="side-sec-tit"><span>コンテンツ検索</span></div>
                    <div class="flex">
                        <input type="search" name="search" id="keyword" placeholder="キーワードを入力">
                        <button type="submit" name="submit" id="search_btn" data-id="{{$curriculum->id}}" onclick="searchData('lesson')"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let curriculum_finish = '{{route('curriculum-finish')}}';
        $(document).ready(function () {
            getCalendarData('lesson');
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
        $(document).keydown(function (e) {
            // Left arrow
            if (e.keyCode == 37) {
                calendars.clndr1.back();
            }

            // Right arrow
            if (e.keyCode == 39) {
                calendars.clndr1.forward();
            }
        });

    </script>
</x-user-layout>
