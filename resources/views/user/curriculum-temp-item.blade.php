@if(count($lesson) == 0)
    <p>検索条件にマッチする結果が見つかりませんでした。検索条件を変更してください。</p>
@else
    @foreach($lesson as $item)
        <div class="wrp-lesson-box">
            <div class="flex fx-wrp">
                <div class="lesson-img"><img style="height: 100%" src="{{ asset($item->thumbnail) }}"></div>
                <div class="lesson-box">
                    <div class="box-title"><span>{{$item->title}}</span> <span>目安時間：{{$item->time}}分</span></div>
                    <div class="box-text">
                        <span>{{$item->comment}}</span>
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
@endif
