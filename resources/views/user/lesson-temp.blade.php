<x-user-layout>

    <div class="wrp_my-box">
        <div class="flex fx-wrp">
            <div class="my-main" style="width: 100%">
                <div class="wrp_content">
                    <div class="content_tag">
                        <span class="lesson">レッスン</span>
                    </div>
                    <div class="title">
                        <a href="#" class="sub">{{$lesson->curriculum->title}}</a>
                        <span class="main">{{$lesson->title}}</span>
                    </div>
                    <div class="content_image">
                        <img src="{{ asset($lesson->thumbnail) }}">
                    </div>
                    <input id="detail" type="hidden" value="{{$lesson->detail}}">
                    <div id="lesson_contents" class="table_contents">

                    </div>
                    <div class="return_curriculum">
                        <a href="{{ route('curriculum-temp', $lesson->curriculum->slack) }}">{{$lesson->curriculum->title}}に戻る<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <div id="finish_part" class="end_box text-center mt-4" style="{{$finish == 1 ? 'display: none;' : ''}}">
                    <a class="end_btn" data-id="{{$lesson->id}}">完了</a>
                </div>
                <div class="my-sec" id="review_part" style="{{$finish == 0 ? 'display: none;' : ''}}">
                    <div class="curriculum-summary">
                        <div class="item_title">
                            <span>レッスン復習/テスト</span>
                        </div>
                        <div class="flex fx-wrp fx-bet">
                            <a class="review-btn {{isset($lesson->review) && $lesson->review->public_status == 1 ? '' : 'review-disabled d-none'}}" {{ isset($lesson->review) && $lesson->review->public_status == 1 ? 'href=' . route('review-temp', $lesson->review->slack) : '' }}>復習する</a>
                            <a class="test-btn {{isset($lesson->test) && $lesson->test->public_status == 1 ? '' : 'test-disabled d-none'}}" {{ isset($lesson->test) && $lesson->test->public_status == 1 ? 'href=' . route('test-temp', $lesson->test->slack) : '' }}>テストを受ける</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        let lesson_finish = '{{route('lesson-finish')}}';
        $(document).ready(function () {
            let detail = $('#detail').val()
            console.log(detail)
            $('#lesson_contents').html(detail)
            $('.end_btn').click(function () {
                let id = $(this).data('id');
                actionIdWithout(id, lesson_finish, '完了しました。')
                $('#finish_part').hide();
                $('#review_part').show();
            })
        })

    </script>
</x-user-layout>
