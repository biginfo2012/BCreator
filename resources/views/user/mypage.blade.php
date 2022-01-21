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
                                    <div class="item-tit"><span>{{$grade}}</span></div>
                                    <div class="text"><span>学習ランク</span></div>
                                </div>
                            </div>
                            <div class="box finish">
                                <div class="flex fx-itc fx-wrp fx-coc">
                                    <div class="item"></div>
                                    <div class="finish-count"><span>{{$cnt_lesson}}</span></div>
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
                    @if(count($lessons) == 0)
                        <div class="wrp-lesson-block">
                            <div class="text-center"><span>学習中のカリキュラムはありません。カリキュラム一覧は<a
                                        href="{{ route('archive-curriculum') }}">こちら</a></span></div>
                        </div>
                    @else
                        @foreach($lessons as $item)
                            <div class="wrp-lesson-block mb-4">
                                <div class="lesson-block">
                                    <div class="flex fx-wrp">
                                        <div class="item"><img src="{{ asset($item->thumbnail) }}"
                                                               style="width: 100%; height: 100%"></div>
                                        <div class="box">
                                            <div class="box-title one_sent_hide sp_lift">
                                                <span>{{$item->curriculum->title}}</span></div>
                                            <div class="box-content">
                                                <div class="flex fx-bet fx-wrp">
                                                    <div class="item-title">
                                                        <span>{{$item->title}}</span></div>
                                                    <div class="item-btn"><a class="continu-btn"
                                                                             href="{{ route('lesson-temp', $item->slack) }}">続きからはじめる</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
                <div class="my-sec">
                    <div class="my-sec-tit">
                        <span>修了したカリキュラム</span> <a href="{{ route('archive-test') }}">テスト一覧へ<i
                                class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="wrp-completion-block">
                        @if(count($curriculum) == 0)
                            <div class="text-center"><span>修了したカリキュラムはありません。復習カリキュラム一覧は<a
                                        href="{{ route('archive-curriculum') }}">こちら</a></span></div>
                        @endif
                        <div class="flex fx-wrp">
                            @foreach($curriculum as $item)
                                <div class="wrp-box">
                                    <div class="box">
                                        <div class="box-tit"><span class="one_sent_hide sp_lift">{{$item->title}}</span>
                                            <span
                                                class="one_sent_hide sp_lift">{{$item->detail}}</span></div>
                                        <div class="box-img"><img src="{{ asset($item->thumbnail) }}"></div>
                                        <div class="box-btn">
                                            <a class="review-btn {{count($item->review) ? '' : 'review-disabled'}}" {{ count($item->review) ? 'href=' . route('review-temp', $item->review[0]->slack) : '' }}>復習する</a>
                                            <a class="test-btn {{count($item->test) ? '' : 'test-disabled'}}" {{ count($item->test) ? 'href=' . route('review-temp', $item->test[0]->slack) : '' }}>テストを受ける</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-side">
                <div class="wrp-cale-box">
                    <div class="side-sec-tit">
                        <div class="cal1"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function () {
                getCalendarData('all');
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
            // Bind all clndrs to the left and right arrow keys
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
