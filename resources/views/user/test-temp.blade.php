<x-user-layout>
    <div class="wrp_my-box" id="test_part">
        <div class="container">
            <form id="test-result" method="post" action="{{route('result-temp')}}">
                @csrf
                <div class="wrp_content">
                    <div class="content_tag">
                        <span class="test">テスト</span>
                    </div>
                    <div class="title">
                        <a href="{{route('curriculum-temp', $test['curriculum']['slack'])}}" class="sub">{{$test['curriculum']['title']}}</a>
                        <span class="main">{{$test['title']}}</span>
                    </div>
                    <input type="hidden" name="question_cnt" id="question_cnt" value="{{$question_cnt}}">
                    <input type="hidden" name="test_id" value="{{$test['id']}}">
                    <input type="hidden" name="diff_time" id="diff_time">
                    <input type="hidden" name="right_cnt" id="right_cnt">
                    <input type="hidden" name="right_question" id="right_question">
                    <div class="wrp_article">
                        @if(count($test['dt']) > 0)
                            @foreach($test['dt'] as $dt)
                                @if($dt['parent_id'] == 0)
                                    <h2 id="h2_{{$dt['id']}}">{{$dt['title']}}</h2>
                                    <div class="wrp_text">
                                        <input type="hidden" name="content" value="{{$dt['content']}}">
                                    </div>
                                    @if(count($dt['question']) > 0)
                                        @foreach($dt['question'] as $question)
                                            <select class="test_select" id="{{str_replace(['/', '@'], '', $question['question_tag'])}}" style="display: none">
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
                                    @foreach($test['dt'] as $dt_tmp)
                                        @if($dt_tmp['parent_id'] == $dt['id'])
                                            <h3 id="h3_{{$dt_tmp['id']}}">{{$dt_tmp['title']}}</h3>
                                            <div class="wrp_text">
                                                <input type="hidden" name="content" value="{{$dt_tmp['content']}}">
                                            </div>
                                            @if(count($dt_tmp['question']) > 0)
                                                @foreach($dt_tmp['question'] as $question)
                                                    <select class="test_select" id="{{str_replace(['/', '@'], '', $question['question_tag'])}}" style="display: none">
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
                    <button class="end_btn border-0 test_result">テストを終了して結果を見る<i class="fas fa-angle-right"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="wrp_my-box" id="result-temp" style="display:none;">
        <div class="container">
            <div class="wrp_content">
                <div class="content_tag">
                    <span class="test">テスト</span>
                </div>
                <div class="title">
                    <a href="{{route('curriculum-temp', $test['curriculum']['slack'])}}" class="sub">{{$test['curriculum']['title']}}</a>
                    <span class="main">{{$test['title']}}</span>
                </div>
                <div class="result_box">
                    <span class="item-title">結果</span>
                    <div class="flex fx-itc fx-wrp">
                        <div class="rate">
                            <span class="sub">正答率</span>
                            <div class="main">
                                <span class="count" id="count"></span>
                                <span class="unit">%</span>
                            </div>
                        </div>
                        <div class="number">
                            <span class="sub" id="question_cnt_span">問中</span>
                            <div class="main">
                                <span class="count" id="right_cnt_span">問</span>
                                <span class="text">正解</span>
                            </div>
                        </div>
                        <div class="time">
                            <span class="sub">試験時間</span>
                            <span class="main" id="diff_time_span">分秒</span>
                        </div>
                    </div>
                </div>
                <div class="wrp_article">
                    @if(count($test['dt']) > 0)
                        @foreach($test['dt'] as $dt)
                            @if($dt['parent_id'] == 0)
                                <h2 id="h2_{{$dt['id']}}">{{$dt['title']}}</h2>
                                <div class="wrp_text">
                                    <input type="hidden" name="content" value="{{$dt['content']}}">
                                </div>
                                @foreach($test['dt'] as $dt_tmp)
                                    @if($dt_tmp['parent_id'] == $dt['id'])
                                        <h3 id="h3_{{$dt_tmp['id']}}">{{$dt_tmp['title']}}</h3>
                                        <div class="wrp_text">
                                            <input type="hidden" name="content" value="{{$dt_tmp['content']}}">
                                        </div>
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
    <script>
        $(document).ready(function () {
            var start_time = new Date($.now());
            $('.test_result').click(function (e) {
                e.preventDefault();
                var end_time = new Date($.now());
                var diff_time = parseInt((end_time.getTime() - start_time.getTime()) / 1000);
                var right_cnt = 0;
                var right_question = [];
                $('.test_select').each(function () {
                    let val = $(this).find(":selected").val();
                    if(val == 1){
                        let question_tag = '/@' + $(this).attr('id') + '/';
                        right_question.push(question_tag);
                        right_cnt = right_cnt + 1;
                    }
                })
                $('#right_question').val(JSON.stringify(right_question));
                $('#right_cnt').val(right_cnt)
                $('#diff_time').val(diff_time);
                let question_cnt = $('#question_cnt').val();
                let count = parseInt(right_cnt/question_cnt*100)
                $('#count').text(count);
                let question_cnt_span = question_cnt + '問中';
                $('#question_cnt_span').text(question_cnt_span);
                let right_cnt_span = right_cnt + '問'
                $('#right_cnt_span').text(right_cnt_span);
                let diff_time_span = parseInt(diff_time/60) + '分' + (diff_time%60) + '秒';
                $('#diff_time_span').text(diff_time_span);

                $('#result-temp').find('[name=content]').each(function () {
                    let content = $(this).val();
                    let str_arr = content.split('/');
                    var test_content = '';
                    for(let i = 0; i < str_arr.length; i++){
                        let str = str_arr[i];
                        if(str != ''){
                            if(str.includes('question')){
                                str = str.replace('@', '');
                                let tag = '#' + str + '_show';
                                var val = $(tag).find(":selected").val();
                                var txt = $(tag).find(":selected").text();
                                if(val == 0){
                                    test_content = test_content + '<span class="miss">' + txt + '</span>'
                                }
                                else{
                                    test_content =  test_content + '<span class="correct">' + txt + '</span>'
                                }
                            }
                            else{
                                test_content = test_content + '<span>' + str + '</span>'
                            }
                        }
                    }
                    $(this).after(test_content);
                })
                $('#test_part').hide();
                $('#result-temp').show();
                let result_temp = '{{route('result-temp')}}';
                saveForm('test-result', result_temp)
                //$('#test-result').submit();
            })
            $('#test_part').find('[name=content]').each(function () {
                let content = $(this).val();
                let str_arr = content.split('/');
                var test_content = '';
                for(let i = 0; i < str_arr.length; i++){
                    let str = str_arr[i];
                    if(str != ''){
                        if(str.includes('question')){
                            str = str.replace('@', '');
                            let tag = '#' + str;
                            console.log(str);
                            test_content = test_content + $(tag)[0].outerHTML.replace('display: none', '').replace(str, str + "_show")
                        }
                        else{
                            test_content = test_content + '<span>' + str + '</span>'
                        }
                    }
                }
                $(this).after(test_content);
            })
        })
    </script>
</x-user-layout>
