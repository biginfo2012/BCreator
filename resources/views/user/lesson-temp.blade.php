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
                <div class="end_box text-center mt-4" style="{{$finish == 1 ? 'display: none;' : ''}}">
                    <a class="end_btn" data-id="{{$lesson->id}}">完了</a>
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

            })
        })

    </script>
</x-user-layout>
