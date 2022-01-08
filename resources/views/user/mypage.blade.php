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
                            <div class="text-center"><span>学習中のカリキュラムはありません。カリキュラム一覧は<a href="{{ route('archive-curriculum') }}">こちら</a></span></div>
                        </div>
                    @else
                        @foreach($lessons as $item)
                            <div class="wrp-lesson-block mb-4">
                                <div class="lesson-block">
                                    <div class="flex fx-wrp">
                                        <div class="item"><img src="{{ asset($item->thumbnail) }}" style="height: 100%"></div>
                                        <div class="box">
                                            <div class="box-title one_sent_hide sp_lift"><span>{{$item->curriculum->title}}</span></div>
                                            <div class="box-content">
                                                <div class="flex fx-bet fx-wrp">
                                                    <div class="item-title">
                                                        <span>{{$item->title}}</span></div>
                                                    <div class="item-btn"><a class="continu-btn" href="{{ route('lesson-temp', $item->id) }}">続きからはじめる</a></div>
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
                        <span>修了したカリキュラム</span> <a href="{{ route('archive-test') }}">テスト一覧へ<i class="fas fa-angle-right"></i></a>
                    </div>
                    <div class="wrp-completion-block">
                        @if(count($curriculum) == 0)
                            <div class="text-center"><span>修了したカリキュラムはありません。復習カリキュラム一覧は<a href="{{ route('archive-curriculum') }}">こちら</a></span></div>
                        @endif
                        <div class="flex fx-wrp">
                            @foreach($curriculum as $item)
                                <div class="wrp-box">
                                    <div class="box">
                                        <div class="box-tit"><span class="one_sent_hide sp_lift">{{$item->title}}</span> <span
                                                class="one_sent_hide sp_lift">{{$item->detail}}</span></div>
                                        <div class="box-img"><img src="{{ asset($item->thumbnail) }}"></div>
                                        <div class="box-btn">
                                            <a class="review-btn {{count($item->review) ? '' : 'review-disabled'}}" {{ count($item->review) ? 'href=' . route('review-temp', $item->review[0]->id) : '' }}>復習する</a>
                                            <a class="test-btn {{count($item->test) ? '' : 'test-disabled'}}" {{ count($item->test) ? 'href=' . route('review-temp', $item->test[0]->id) : '' }}>テストを受ける</a>
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
        var calendars = {};
        $(document).ready(function () {
            var thisMonth = moment().format('YYYY-MM');
            // Events to load into calendar
            var eventArray = [
                {
                    date: thisMonth + '-27',
                    title: 'Single Day Event'
                }
            ];

            console.log(eventArray);
            // The order of the click handlers is predictable. Direct click action
            // callbacks come first: click, nextMonth, previousMonth, nextYear,
            // previousYear, nextInterval, previousInterval, or today. Then
            // onMonthChange (if the month changed), inIntervalChange if the interval
            // has changed, and finally onYearChange (if the year changed).
            calendars.clndr1 = $('.cal1').clndr({
                events: eventArray,
                clickEvents: {
                    click: function (target) {
                        console.log('Cal-1 clicked: ', target);
                    },
                    today: function () {
                        console.log('Cal-1 today');
                    },
                    nextMonth: function () {
                        console.log('Cal-1 next month');
                    },
                    previousMonth: function () {
                        console.log('Cal-1 previous month');
                    },
                    onMonthChange: function () {
                        console.log('Cal-1 month changed');
                    },
                    nextYear: function () {
                        console.log('Cal-1 next year');
                    },
                    previousYear: function () {
                        console.log('Cal-1 previous year');
                    },
                    onYearChange: function () {
                        console.log('Cal-1 year changed');
                    },
                    nextInterval: function () {
                        console.log('Cal-1 next interval');
                    },
                    previousInterval: function () {
                        console.log('Cal-1 previous interval');
                    },
                    onIntervalChange: function () {
                        console.log('Cal-1 interval changed');
                    }
                },
                multiDayEvents: {
                    singleDay: 'date',
                    endDate: 'endDate',
                    startDate: 'startDate'
                },
                showAdjacentMonths: true,
                adjacentDaysChangeMonth: false
            });

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
        $(document).keydown( function(e) {
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
