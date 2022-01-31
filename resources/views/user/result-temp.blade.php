<x-user-layout>
    <div class="wrp_my-box">
        <div class="container">
            <div class="wrp_content">
                <div class="content_tag">
                    <span class="test">テスト</span>
                </div>
                <div class="title">
                    <a href="{{route('curriculum-temp', $test_result['test']['curriculum']['slack'])}}" class="sub">{{$test_result['test']['curriculum']['title']}}</a>
                    <span class="main">{{$test_result['test']['title']}}</span>
                </div>
                <div class="result_box">
                    <span class="item-title">結果</span>
                    <div class="flex fx-itc fx-wrp">
                        <div class="rate">
                            <span class="sub">正答率</span>
                            <div class="main">
                                <span class="count">{{(int)($test_result['right_cnt']/$test_result['question_cnt'] *100)}}</span>
                                <span class="unit">%</span>
                            </div>
                        </div>
                        <div class="number">
                            <span class="sub">{{$test_result['question_cnt']}}問中</span>
                            <div class="main">
                                <span class="count">{{$test_result['right_cnt']}}問</span>
                                <span class="text">正解</span>
                            </div>
                        </div>
                        <div class="time">
                            <span class="sub">試験時間</span>
                            <span class="main">{{(int)(($test_result['diff_time'])/60)}}分{{$test_result['diff_time']%60}}秒</span>
                        </div>
                    </div>
                </div>
                <div class="wrp_article">
                    @if(count($test_result['test']['dt']) > 0)
                        @foreach($test_result['test']['dt'] as $dt)
                            @if($dt['parent_id'] == 0)
                                <h2 id="h2_{{$dt['id']}}">{{$dt['title']}}</h2>
                                <div class="wrp_text">
                                    <input type="hidden" name="content" value="{{$dt['content']}}">
                                </div>
                                @if(count($dt['question']) > 0)
                                    @foreach($dt['question'] as $question)
                                        <select class="test_select" id="{{str_replace('@', '', $question['question_tag'])}}" style="display: none">
                                            <option value="" disabled selected style="display:none;">選択してください</option>
                                            @php
                                                $qi = $question['qi'];shuffle($qi);
                                            @endphp
                                            @foreach($qi as $qq)
                                                <option value="{{$qq['type'] == 1 ? 1 : 0}}">{{$qq['item']}}</option>
                                            @endforeach
                                        </select>
                                    @endforeach
                                @endif
                                @foreach($test_result['test']['dt'] as $dt_tmp)
                                    @if($dt_tmp['parent_id'] == $dt['id'])
                                        <h3 id="h3_{{$dt_tmp['id']}}">{{$dt_tmp['title']}}</h3>
                                        <div class="wrp_text">
                                            <input type="hidden" name="content" value="{{$dt_tmp['content']}}">
                                        </div>
                                        @if(count($dt_tmp['question']) > 0)
                                            @foreach($dt_tmp['question'] as $question)
                                                <select class="test_select" id="{{str_replace('@', '', $question['question_tag'])}}" style="display: none">
                                                    <option value="" disabled selected style="display:none;">選択してください</option>
                                                    @php
                                                        $qi = $question['qi'];shuffle($qi);
                                                    @endphp
                                                    @foreach($qi as $qq)
                                                        <option value="{{$qq['type'] == 1 ? 1 : 0}}">{{$qq['item']}}</option>
                                                    @endforeach
                                                </select>
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="test_end_box">
                <a class="end_btn" href="{{ route('archive-test') }}">テスト一覧へ<i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</x-user-layout>
