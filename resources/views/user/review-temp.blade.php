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
                        <span class="review">復習</span>
                    </div>
                    <div class="title">
                        <a href="{{route('curriculum-temp', $review->curriculum->slack)}}" class="sub">{{$review->curriculum->title}}</a>
                        <span class="main">{{$review->title}}</span>
                    </div>
                    <div class="content_image">
                        <img src="{{ asset($review->thumbnail) }}">
                    </div>
                    <input id="detail" type="hidden" value="{{$review->detail}}">
                    <div class="table_contents">
                        <div class="item-title">
                            <span>目次</span>
                        </div>
                        <div class="wrp_item">
                            @if(count($review->det) > 0)
                                @foreach($review->det as $item)
                                    @if($item->parent_id == 0)
                                        <div class="item">
                                            <a class="h2 move-link" href="#h2_{{$item->id}}">{{$item->title}}</a>
                                            @php
                                                $exist = false;
                                            @endphp
                                            @foreach($review->det as $item_tmp)
                                                @php
                                                    if($item_tmp->parent_id == $item->id){
                                                        $exist = true;
                                                    }
                                                @endphp
                                            @endforeach
                                            @if($exist == 1)
                                                <ol>
                                                    @foreach($review->det as $item_tmp)
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
                        @if(count($review->det) > 0)
                            @foreach($review->det as $item)
                                @if($item->parent_id == 0)
                                    <h2 id="h2_{{$item->id}}">{{$item->title}}</h2>
                                    <input type="hidden" name="content" value="{{$item->content}}">
                                    @foreach($review->det as $item_tmp)
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
                        <a href="{{ route('curriculum-temp', $review->curriculum->slack) }}">{{$review->curriculum->title}}に戻る<i class="fas fa-angle-right"></i></a>
                        <a href="{{ route('archive-test') }}">このカリキュラムのテストを行う<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('[name=content]').each(function () {
                let content = '<div class="cont">' + $(this).val() + '</div>'
                $(this).after(content);
            })
        })

    </script>
</x-user-layout>
