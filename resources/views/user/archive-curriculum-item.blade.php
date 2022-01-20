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
