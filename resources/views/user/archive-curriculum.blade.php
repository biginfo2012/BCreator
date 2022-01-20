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
                    <div class="my-sec-tit"><span>カリキュラム一覧</span></div>
                    <div class="wrp-curriculum">
                        <div class="fx-bet fx-wrp">
                            @foreach($curriculum as $item)
                                <div class="c-block">
                                    <div class="flex fx-wrp">
                                        <div class="item"><img src="{{ asset($item->thumbnail) }}"></div>
                                        <div class="box">
                                            <div class="box-title"><span class="one_sent_hide sp_lift"></span>
                                                <span class="one_sent_hide sp_lift">{{$item->title}}</span></div>
                                            <div class="box-btn">
                                                <a href="{{ route('curriculum-temp', $item->id) }}" class="continu-btn">受講をはじめる</a>
                                            </div>
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
                    <div class="side-sec-tit"><span>学習履歴カレンダー</span></div>
                    <span>カレンダーが入ります。</span></div>
                <div class="wrp-search-box">
                    <div class="side-sec-tit"><span>コンテンツ検索</span></div>
                    <div class="flex">
                        <input type="search" name="search" placeholder="キーワードを入力">
                        <button type="submit" name="submit" id="search_btn" data-url=""><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#search_btn').click(function () {


            })
        })
    </script>
</x-user-layout>
