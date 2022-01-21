<x-user-layout>
    <div class="wrp_my-box archive">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="my-sec">
                    <div class="search_sp">
                        <div class="flex"><input type="search" name="search" placeholder="キーワードを入力">
                            <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="my-sec-tit"><span>テスト一覧</span></div>
                    <div class="wrp-curriculum">
                        <div class="fx-bet fx-wrp" id="dataArea">
                            @foreach($test as $item)
                                <div class="c-block">
                                    <div class="flex fx-wrp">
                                        <div class="item"><img src="{{ asset($item['thumbnail']) }}"></div>
                                        <div class="box">
                                            <div class="box-title"><span class="one_sent_hide sp_lift">{{ $item['curriculum']['title'] . (isset($item['lesson']) ? ('-' . $item['lesson']['title']) : '') }}</span>
                                                <span class="one_sent_hide sp_lift">{{ $item['title'] }}</span></div>
                                            <div class="box-btn"><a href="{{ route('test-temp', $item['slack']) }}" class="test-btn">テストをはじめる</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                        <button type="submit" name="submit" id="search_btn" onclick="searchData('test')"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            getCalendarData('test');
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
