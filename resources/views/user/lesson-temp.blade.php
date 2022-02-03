<x-user-layout>
    <style>
        .wrp_article .cont {
            margin-bottom: 40px;
            line-height: 1.7;
        }
    </style>
    <div class="wrp_my-box">
        <div class="flex fx-wrp">
            <div class="my-main" style="width: 100%">
                <div class="wrp_content">
                    <div class="content_tag">
                        <span class="lesson">レッスン</span>
                    </div>
                    <div class="title">
                        <a href="{{route('curriculum-temp', $lesson->curriculum->slack)}}" class="sub">{{$lesson->curriculum->title}}</a>
                        <span class="main">{{$lesson->title}}</span>
                    </div>
                    <div class="content_image">
                        <img src="{{ asset($lesson->thumbnail) }}">
                    </div>
                    <input id="detail" type="hidden" value="{{$lesson->detail}}">
                    <div class="table_contents">
                        <div class="item-title">
                            <span>目次</span>
                        </div>
                        <div class="wrp_item">
                            @if(count($lesson->det) > 0)
                                @foreach($lesson->det as $item)
                                    @if($item->parent_id == 0)
                                        <div class="item">
                                            <a class="h2 move-link" href="#h2_{{$item->id}}">{{$item->title}}</a>
                                            @php
                                                $exist = false;
                                            @endphp
                                            @foreach($lesson->det as $item_tmp)
                                                @php
                                                    if($item_tmp->parent_id == $item->id){
                                                        $exist = true;
                                                    }
                                                @endphp
                                            @endforeach
                                            @if($exist == 1)
                                                <ol>
                                                    @foreach($lesson->det as $item_tmp)
                                                        @if($item_tmp->parent_id == $item->id)
                                                            <li>
                                                                <a class="move-link"
                                                                   href="#h3_{{$item_tmp->id}}">{{$item_tmp->title}}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="wrp_article">
                        @if(count($lesson->det) > 0)
                            @foreach($lesson->det as $item)
                                @if($item->parent_id == 0)
                                    <h2 id="h2_{{$item->id}}">{{$item->title}}</h2>
                                    <input type="hidden" name="content" value="{{$item->content}}">
                                    @foreach($lesson->det as $item_tmp)
                                        @if($item_tmp->parent_id == $item->id)
                                            <h3 id="h3_{{$item_tmp->id}}">{{$item_tmp->title}}</h3>
                                            <input type="hidden" name="content" value="{{$item_tmp->content}}">
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="return_curriculum">
                        <a href="{{ route('curriculum-temp', $lesson->curriculum->slack) }}">{{$lesson->curriculum->title}}
                            に戻る<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
                <div id="finish_part" class="end_box text-center mt-4" style="{{$finish == 1 ? 'display: none;' : ''}}">
                    <a class="end_btn" data-id="{{$lesson->id}}">完了</a>
                </div>
                @if((isset($lesson->review) && $lesson->review->public_status == 1) || (isset($lesson->test) && $lesson->test->public_status == 1))
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
                @endif
            </div>

        </div>
    </div>
    <script>
        let lesson_finish = '{{route('lesson-finish')}}';
        $(document).ready(function () {

            $('[name=content]').each(function () {
                let content = '<div class="cont">' + $(this).val() + '</div>'
                $(this).after(content);
            })
            $('.end_btn').click(function () {
                let id = $(this).data('id');
                actionIdWithout(id, lesson_finish, '完了しました。')
                $('#finish_part').hide();
                $('#review_part').show();
            })
        })

    </script>
</x-user-layout>
