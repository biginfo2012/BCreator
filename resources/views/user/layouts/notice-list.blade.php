<input type="hidden" id="total_notice_count" value="{{$cnt}}">
<input type="hidden" id="notice_ids" value="{{$notice_ids}}">
@foreach($notice as $item)
    <div class="item {{$item->noticeuser_count == 0 ? 'active' : ''}}">
        <div class="item-title"><span class="main">{{$item->title}}</span> <span class="time">{{ $item->date_txt }}</span>
        </div>
        <div class="item-content"><span>{{$item->detail}}</span></div>
    </div>
@endforeach
