@if(count($test) == 0)
    <p>検索条件にマッチする結果が見つかりませんでした。検索条件を変更してください。</p>
@else
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
@endif
