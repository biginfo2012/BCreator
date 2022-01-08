<input type="hidden" id="total_notice_count" value="{{count($notice)}}">
@foreach($notice as $item)
    <div class="item">
        <div class="item-title"><span class="main">{{$item->title}}</span> <span class="time">{{ round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($item->updated_at))/3600,0) }}時間前</span>
        </div>
        <div class="item-content"><span>{{$item->detail}}</span></div>
    </div>
@endforeach
