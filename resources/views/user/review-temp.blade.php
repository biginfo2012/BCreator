<x-user-layout>
    <div class="wrp_my-box">
        <div class="flex fx-wrp">
            <div class="my-main">
                <div class="wrp_content">
                    <div class="content_tag">
                        <span class="review">復習</span>
                    </div>
                    <div class="title">
                        <a href="#" class="sub">{{$review->curriculum->title}}</a>
                        <span class="main">{{$review->title}}</span>
                    </div>
                    <div class="content_image">
                        <img src="{{ asset($review->thumbnail) }}">
                    </div>
                    <input id="detail" type="hidden" value="{{$review->detail}}">
                    <div id="review_contents" class="table_contents">

                    </div>

                    <div class="return_curriculum">
                        <a href="{{ route('curriculum-temp', $review->curriculum->id) }}">{{$review->curriculum->title}}に戻る<i class="fas fa-angle-right"></i></a>
                        <a href="{{ route('archive-test') }}">このカリキュラムのテストを行う<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="my-side">
                <div class="wrp-cale-box">
                    <div class="side-sec-tit">
                        <span>学習履歴カレンダー</span>
                    </div>
                    <span>カレンダーが入ります。</span>
                </div>
                <div class="wrp-search-box">
                    <div class="side-sec-tit">
                        <span>コンテンツ検索</span>
                    </div>
                    <div class="flex">
                        <input type="search" name="search" placeholder="キーワードを入力">
                        <button type="submit" name="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            let detail = $('#detail').val()
            console.log(detail)
            $('#review_contents').html(detail)
        })

    </script>
</x-user-layout>
