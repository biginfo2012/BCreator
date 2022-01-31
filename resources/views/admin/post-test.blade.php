<x-admin-layout>
    <style>
        .content-part {

        }

        .paragraph {
            padding: 15px 15px 0;
            border: 1px solid;
            border-radius: 10px;
            position: relative;
            margin-bottom: 15px;
        }

        .h2-part {
            border-bottom: 1px dashed;
        }

        .h3-part {
            margin: 15px;
        }

        .h3-item {
            border: 1px dotted;
            padding: 15px;
            border-radius: 10px;
            position: relative;
            margin-bottom: 10px;
        }

        .h3-remove {
            position: absolute;
            top: 5px;
            right: 1px;
            font-size: 20px;
        }

        .h2-remove {
            position: absolute;
            top: 5px;
            right: 1px;
            font-size: 20px;
        }

        .h3-add {
            font-size: 30px;
        }

        .question-add {
            font-size: 15px;
        }

        .question-item-add {
            font-size: 20px;
        }

        #h2-add {
            font-size: 40px;
        }

        .question-item {
            padding: 10px;
            border: 1px dashed;
            border-radius: 15px;
            position: relative;
            margin-bottom: 10px;
        }

        .error-part {
            border-left: 1px solid;
        }

        @media (max-width: 992px) {
            .error-part {
                border-left: 0;
            }
        }

        .question-error-item-remove {
            position: absolute;
            top: 9px;
            right: 15px;
            font-size: 20px;
        }

        .question-item-remove {
            position: absolute;
            top: 6px;
            right: 4px;
            font-size: 20px;
            z-index: 1;
        }

    </style>
    <div class="side-app dash_min-hei" id="post-test">
        <div class="page-header">
            <h4 class="page-title">{{ isset($test) ? '編集' : '新規追加' }}：テスト</h4>
        </div>
        <form id="test" class="data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($test) ? $test->id : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label class="form-label">タイトル</label>
                        <input type="text" class="form-control" placeholder="タイトル" name="title"
                               value="{{ isset($test) ? $test->title : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">親カリキュラム-レッスンの選択</label>
                        <select class="form-control select2-show-search" name="lesson_id" data-placeholder="カリキュラム-レッスン"
                                required>
                            <option label="Choose one">
                            </option>
                            @foreach($curricula as $item)
                                <optgroup label="{{$item->title}}">
                                    <option value="{{$item->id}}-" {{isset($test) && !isset($test->lesson_id) && $test->curriculum_id == $item->id ? 'selected' : ''}} {{!(isset($test) && !isset($test->lesson_id) && $test->curriculum_id == $item->id) && count($item->test) != 0 ? 'disabled' : ''}}>カリキュラム-{{$item->title}}</option>
                                    @foreach($lesson as $les)
                                        @if($item->id == $les->curriculum_id)
                                            <option value="{{$item->id}}-{{ $les->id }}" {{ isset($test) && isset($test->lesson_id) && $test->lesson_id == $les->id ? 'selected' : '' }} {{!(isset($test) && isset($test->lesson_id) && $test->lesson_id == $les->id) && isset($les->test) ? 'disabled' : ''}}>レッスン-{{ $les->title }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <label class="form-label">親カリキュラム-レッスンの選択</label>--}}
                    {{--                        <select class="form-control select2-show-search" data-placeholder="カリキュラム-レッスン" name="lesson_id" required>--}}
                    {{--                            <option label="Choose one">--}}
                    {{--                            </option>--}}
                    {{--                            @foreach($curriculum as $cur)--}}
                    {{--                                <optgroup label="{{$cur->curriculum->title}}">--}}
                    {{--                                    @foreach($lesson as $les)--}}
                    {{--                                        @if($cur->curriculum_id == $les->curriculum_id)--}}
                    {{--                                            <option value="{{ $les->id }}" {{ isset($test) && $test->lesson_id == $les->id ? 'selected' : '' }}>{{ $les->title }}</option>--}}
                    {{--                                        @endif--}}
                    {{--                                    @endforeach--}}
                    {{--                                </optgroup>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                        @if(!isset($test))
                            <input type="file" class="dropify" name="file" data-height="150" required>
                        @else
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset($test->thumbnail) }}" style="height: 160px;">
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <input type="file" class="dropify" name="file" data-height="150">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">コンテンツ</label>
                        <input type="hidden" name="detail" id="detail">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-part">
                                    <input type="hidden" id="h2_cnt" value="{{isset($h2_cnt) ? $h2_cnt : 1}}">
                                    <input type="hidden" id="question_cnt" value="{{isset($question_cnt) ? $question_cnt : 0}}">
                                    @if(isset($test))
                                        @if(count($test->dt) > 0)
                                            @foreach($test->dt as $dt)
                                                @if($dt->parent_id == 0)
                                                    <div class="paragraph" data-id="{{$dt->id}}">
                                                        <div class="h2-part">
                                                            <div class="form-group">
                                                                <label class="form-label">h2タイトル</label>
                                                                <input class="form-control h2_title" type="text" name="h2_title_{{$dt->id}}" required value="{{$dt->title}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">h2内容</label>
                                                                <textarea class="form-control h2_content" name="h2_content_{{$dt->id}}" required rows="3">{{$dt->content}}</textarea>
                                                            </div>
                                                            <div class="form-group question_part">
                                                                @if(count($dt->question) > 0)
                                                                    @foreach($dt->question as $question)
                                                                        <div class="question-item" data-id="{{$question->id}}">
                                                                            <i class="fa fa-remove question-item-remove"></i>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p class="question_tag">{{$question->question_tag}}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-lg-4 mb-2">
                                                                                    <label class="form-label">正答</label>
                                                                                    @foreach($question->qi as $qi)
                                                                                        @if($qi->type == 1)
                                                                                            <input class="form-control question_right" required value="{{$qi->item}}"
                                                                                                   name="question_right_{{$question->id}}" type="text">
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="col-md-12 col-lg-8 error-part">
                                                                                    <label class="form-label">誤答</label>
                                                                                    <div class="row">
                                                                                        @foreach($question->qi as $qi)
                                                                                            @if($qi->type == 0)
                                                                                                <div class="col-md-12 col-lg-6 mb-2" data-id="{{$qi->id}}">
                                                                                                    <input class="form-control question_error" value="{{$qi->item}}"
                                                                                                           required type="text" name="question_error_{{$question->id}}_{{$qi->id}}">
                                                                                                </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        <div class="col-md-12 col-lg-6 text-center">
                                                                                            <i class="fe fe-plus-circle question-item-add mt-2"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                                <div class="text-center mt-3">
                                                                    <button class="btn btn-success question-add">問題を追加
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="h3-part">
                                                            @foreach($test->dt as $dt_tmp)
                                                                @if($dt_tmp->parent_id == $dt->id)
                                                                    <div class="h3-item" data-id="{{$dt_tmp->id}}">
                                                                        <div class="form-group">
                                                                            <label class="form-label">h3タイトル</label>
                                                                            <input class="form-control h3_title" name="h3_title_{{$dt->id}}_{{$dt_tmp->id}}" type="text" required value="{{$dt_tmp->title}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label">h3内容</label>
                                                                            <textarea class="form-control h3_content" name="h3_content_{{$dt->id}}_{{$dt_tmp->id}}"
                                                                                      required rows="3">{{$dt_tmp->content}}</textarea>
                                                                        </div>
                                                                        <div class="form-group question_part mb-0">
                                                                            @if(count($dt_tmp->question) > 0)
                                                                                @foreach($dt_tmp->question as $question)
                                                                                    <div class="question-item" data-id="{{$question->id}}">
                                                                                        <i class="fa fa-remove question-item-remove"></i>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p class="question_tag">{{$question->question_tag}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12 col-lg-4 mb-2">
                                                                                                <label class="form-label">正答</label>
                                                                                                @foreach($question->qi as $qi)
                                                                                                    @if($qi->type == 1)
                                                                                                        <input class="form-control question_right" required value="{{$qi->item}}"
                                                                                                               name="question_right_{{$question->id}}" type="text">
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </div>
                                                                                            <div class="col-md-12 col-lg-8 error-part">
                                                                                                <label class="form-label">誤答</label>
                                                                                                <div class="row">
                                                                                                    @foreach($question->qi as $qi)
                                                                                                        @if($qi->type == 0)
                                                                                                            <div class="col-md-12 col-lg-6 mb-2" data-id="{{$qi->id}}">
                                                                                                                <input class="form-control question_error" value="{{$qi->item}}"
                                                                                                                       required type="text" name="question_error_{{$question->id}}_{{$qi->id}}">
                                                                                                            </div>
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <div class="col-md-12 col-lg-6 text-center">
                                                                                                        <i class="fe fe-plus-circle question-item-add mt-2"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                            <div class="text-center mt-3">
                                                                                <button class="btn btn-success question-add">
                                                                                    問題を追加
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <i class="fa fa-remove h3-remove"></i>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="text-center mt-3">
                                                                <i class="fe fe-plus-circle h3-add"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="paragraph" data-id="1">
                                                <div class="h2-part">
                                                    <div class="form-group">
                                                        <label class="form-label">h2タイトル</label>
                                                        <input class="form-control h2_title" type="text"
                                                               name="h2_title_1"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">h2内容</label>
                                                        <textarea class="form-control h2_content" name="h2_content_1"
                                                                  required rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group question_part">
                                                        <div class="text-center mt-3">
                                                            <button class="btn btn-success question-add">問題を追加</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="h3-part">
                                                    <div class="text-center mt-3">
                                                        <i class="fe fe-plus-circle h3-add"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="paragraph" data-id="1">
                                            <div class="h2-part">
                                                <div class="form-group">
                                                    <label class="form-label">h2タイトル</label>
                                                    <input class="form-control h2_title" type="text" name="h2_title_1"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">h2内容</label>
                                                    <textarea class="form-control h2_content" name="h2_content_1"
                                                              required rows="3"></textarea>
                                                </div>
                                                <div class="form-group question_part">
                                                    <div class="text-center mt-3">
                                                        <button class="btn btn-success question-add">問題を追加</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="h3-part">
                                                <div class="text-center mt-3">
                                                    <i class="fe fe-plus-circle h3-add"></i>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="text-center mt-3">
                                        <i class="fe fe-plus-circle" id="h2-add"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">スラッグ</label>
                        <input type="text" class="form-control" placeholder="スラッグ" name="slack"
                               value="{{ isset($test) ? $test->slack : '' }}" required>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="status_btn flex fx-bet fx-wrp">
                                <button type="submit" class="btn btn-secondary btn_submit">下書き保存</button>
                                <input type="hidden" name="preview">
                                <a class="text-white btn btn-secondary btn_preview">プレビュー</a>
                            </div>
                            <div class="status">
                                <div class="item">
                                    <label class="form-label">優先順位</label>
                                    <input type="number" class="form-control" placeholder="なし" name="order"
                                           value="{{ isset($test) ? $test->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option
                                                value="0" {{ isset($test) && $test->public_status == 0 ? 'selected' : '' }}>
                                                下書き
                                            </option>
                                            <option
                                                value="1" {{ isset($test) && $test->public_status == 1 ? 'selected' : '' }}>
                                                公開
                                            </option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary btn_submit">OK</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <button type="submit"
                                            class="btn btn-primary btn_submit">{{ isset($test) && $test->public_status == 1 ? '更新' : '公開' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        let preview_url, h2_cnt = 1, question_cnt = 0;
        $(document).ready(function () {
            h2_cnt = $('#h2_cnt').val();
            question_cnt = $('#question_cnt').val();
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                $('[name=preview]').val(0)
                var enable = true;
                var detail = [];
                $('.paragraph').each(function () {
                    let tmp = {};
                    $t = $(this);
                    let h2_title = $t.find('input.h2_title').val();
                    tmp['h2_title'] = h2_title;
                    let h2_content = $t.find('textarea.h2_content').val();

                    tmp['h2_content'] = h2_content;
                    var h2_question = [];
                    $h2 = $t.find('.h2-part>.question_part');
                    $h2.find('.question-item').each(function () {
                        let q2_tmp = {};
                        q2_tmp['question_tag'] = $(this).find('p.question_tag').text();
                        var question_answer = [];
                        let question_right = $(this).find('input.question_right').val()
                        question_answer.push(question_right);
                        $qi = $(this);
                        $qi.find('input.question_error').each(function () {
                            question_answer.push($(this).val());
                        })
                        q2_tmp['question_answer'] = question_answer;
                        h2_question.push(q2_tmp);
                    })
                    tmp['h2_question'] = h2_question;
                    var h3_detail = [];
                    $t.find('.h3-item').each(function () {
                        $hi = $(this);
                        let h3_tmp = {};
                        let h3_title = $(this).find('input.h3_title').val();
                        h3_tmp['h3_title'] = h3_title;
                        let h3_content = $(this).find('textarea.h3_content').val();
                        h3_tmp['h3_content'] = h3_content;
                        var h3_question = [];
                        $h3 = $hi.find('.question_part');
                        $h3.find('.question-item').each(function () {
                            let q3_tmp = {};
                            q3_tmp['question_tag'] = $(this).find('p.question_tag').text();
                            var question_answer = [];
                            let question_right = $(this).find('input.question_right').val()
                            question_answer.push(question_right);
                            $qi = $(this);
                            $qi.find('input.question_error').each(function () {
                                question_answer.push($(this).val());
                            })
                            q3_tmp['question_answer'] = question_answer;
                            h3_question.push(q3_tmp);
                        })
                        h3_tmp['h3_question'] = h3_question;
                        h3_detail.push(h3_tmp);
                    })
                    tmp['h3_detail'] = h3_detail;
                    detail.push(tmp);
                })
                console.log(detail);
                $('#detail').val(JSON.stringify(detail));
                saveForm('test', save_test)
            })
            $('.btn_preview').click(function () {
                $(this).prev().val(1);
                let slack = $('[name=slack]').val();
                preview_url = '{{url('master/preview-test')}}' + '/' + slack;
                var enable = true;
                var detail = [];
                $('.paragraph').each(function () {
                    let tmp = {};
                    $t = $(this);
                    let h2_title = $t.find('input.h2_title').val();
                    tmp['h2_title'] = h2_title;
                    let h2_content = $t.find('textarea.h2_content').val();

                    tmp['h2_content'] = h2_content;
                    var h2_question = [];
                    $h2 = $t.find('.h2-part>.question_part');
                    $h2.find('.question-item').each(function () {
                        let q2_tmp = {};
                        q2_tmp['question_tag'] = $(this).find('p.question_tag').text();
                        var question_answer = [];
                        let question_right = $(this).find('input.question_right').val()
                        question_answer.push(question_right);
                        $qi = $(this);
                        $qi.find('input.question_error').each(function () {
                            question_answer.push($(this).val());
                        })
                        q2_tmp['question_answer'] = question_answer;
                        h2_question.push(q2_tmp);
                    })
                    tmp['h2_question'] = h2_question;
                    var h3_detail = [];
                    $t.find('.h3-item').each(function () {
                        $hi = $(this);
                        let h3_tmp = {};
                        let h3_title = $(this).find('input.h3_title').val();
                        h3_tmp['h3_title'] = h3_title;
                        let h3_content = $(this).find('textarea.h3_content').val();
                        h3_tmp['h3_content'] = h3_content;
                        var h3_question = [];
                        $h3 = $hi.find('.question_part');
                        $h3.find('.question-item').each(function () {
                            let q3_tmp = {};
                            q3_tmp['question_tag'] = $(this).find('p.question_tag').text();
                            var question_answer = [];
                            let question_right = $(this).find('input.question_right').val()
                            question_answer.push(question_right);
                            $qi = $(this);
                            $qi.find('input.question_error').each(function () {
                                question_answer.push($(this).val());
                            })
                            q3_tmp['question_answer'] = question_answer;
                            h3_question.push(q3_tmp);
                        })
                        h3_tmp['h3_question'] = h3_question;
                        h3_detail.push(h3_tmp);
                    })
                    tmp['h3_detail'] = h3_detail;
                    detail.push(tmp);
                })
                $('#detail').val(JSON.stringify(detail));
                saveForm('test', save_test);
            })
            $(document).on('click', '.h3-add', function () {
                let id = $(this).parent().parent().parent().data('id');
                console.log(id);
                let item_id
                if ($(this).parent().prev().data('id') == undefined) {
                    item_id = 1;
                } else {
                    item_id = $(this).parent().prev().data('id') + 1;
                }
                console.log(item_id);

                let h3_content = '<div class="h3-item" data-id="' + item_id + '">\n' +
                    '                                                <div class="form-group">\n' +
                    '                                                    <label class="form-label">h3タイトル</label>\n' +
                    '                                                    <input class="form-control h3_title" name="h3_title_' + id + '_' + item_id + '" type="text" required>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="form-group">\n' +
                    '                                                    <label class="form-label">h3内容</label>\n' +
                    '                                                    <textarea class="form-control h3_content" name="h3_content_' + id + '_' + item_id + '" required rows="3"></textarea>\n' +
                    '                                                </div>\n' +
                    '<div class="form-group question_part mb-0">\n' +
                    '                                                <div class="text-center mt-3">\n' +
                    '                                                    <button class="btn btn-success question-add">問題を追加</button>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                                <i class="fa fa-remove h3-remove"></i>\n' +
                    '                                            </div>';
                $(this).parent().before(h3_content);
            })
            $('#h2-add').click(function () {
                h2_cnt = h2_cnt + 1;
                let id = $(this).parent().prev().data('id') + 1;
                let h2_content = '<div class="paragraph" data-id="' + id + '">\n' +
                    '                                        <i class="fa fa-remove h2-remove"></i>\n' +
                    '                                        <div class="h2-part">\n' +
                    '                                            <div class="form-group">\n' +
                    '                                                <label class="form-label">h2タイトル</label>\n' +
                    '                                                <input class="form-control h2_title" name="h2_title_' + id + '" type="text" required>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="form-group">\n' +
                    '                                                <label class="form-label">h2内容</label>\n' +
                    '                                                <textarea class="form-control h2_content" name="h2_content_' + id + '" required rows="3"></textarea>\n' +
                    '                                            </div>\n' +
                    '<div class="form-group question_part">\n' +
                    '                                                <div class="text-center mt-3">\n' +
                    '                                                    <button class="btn btn-success question-add">問題を追加</button>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="h3-part">\n' +
                    '                                            <div class="text-center mt-3">\n' +
                    '                                                <i class="fe fe-plus-circle h3-add"></i>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>';
                $(this).parent().before(h2_content);

            })
            $(document).on('click', '.h2-remove', function () {
                $(this).parent().remove();
                h2_cnt = h2_cnt - 1;
            })
            $(document).on('click', '.h3-remove', function () {
                $(this).parent().remove();
            })
            $(document).on('click', '.question-add', function (e) {
                e.preventDefault();
                console.log($(this).parent().parent().find('textarea').val());
                let id = 1;
                let ids = [];
                if (question_cnt > 0) {
                    $('.question-item').each(function () {
                        ids.push($(this).data('id'));
                    })
                    console.log(ids);
                    id = Math.max(...ids) + 1;
                }
                console.log(id);
                question_cnt = question_cnt + 1;

                let question_tag = '@question_' + id + '@';
                let content = $(this).parent().parent().prev().find('textarea').val() + question_tag;
                $(this).parent().parent().prev().find('textarea').val(content)
                let question_content = '<div class="question-item" data-id="' + id + '">\n' +
                    '                        <i class="fa fa-remove question-item-remove"></i>\n' +
                    '                        <div class="row">\n' +
                    '                            <div class="col-12">\n' +
                    '                                <p class="question_tag">' + question_tag + '</p>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                        <div class="row">\n' +
                    '                            <div class="col-md-12 col-lg-4 mb-2">\n' +
                    '                                <label class="form-label">正答</label>\n' +
                    '                                <input class="form-control question_right" required name="question_right_' + id + '" type="text">\n' +
                    '                            </div>\n' +
                    '                            <div class="col-md-12 col-lg-8 error-part">\n' +
                    '                                <label class="form-label">誤答</label>\n' +
                    '                                <div class="row">\n' +
                    '                                    <div class="col-md-12 col-lg-6 mb-2" data-id="1">\n' +
                    '                                        <input class="form-control question_error" required type="text" name="question_error_' + id + '_1">\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-12 col-lg-6 text-center">\n' +
                    '                                        <i class="fe fe-plus-circle question-item-add mt-2"></i>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>'
                $(this).parent().before(question_content)
            })
            $(document).on('click', '.question-item-add', function () {
                let id = $(this).parent().parent().parent().parent().parent().data('id');
                console.log(id);

                let item_id = $(this).parent().prev().data('id') + 1;
                console.log(item_id);

                let question_error_item_content = '<div class="col-md-12 col-lg-6 mb-2 position-relative" data-id="' + item_id + '">\n' +
                    '                                        <input class="form-control question_error" required type="text" name="question_error_' + id + '_' + item_id + '">\n' +
                    '                                        <i class="fa fa-remove question-error-item-remove"></i>\n' +
                    '                                    </div>'
                $(this).parent().before(question_error_item_content);

            })
            $(document).on('click', '.question-item-remove', function () {

                let id = $(this).parent().data('id');
                let question_tag = $(this).next().find('p.question_tag').text();
                let content = $(this).parent().parent().prev().find('textarea').val();
                console.log(question_tag);
                console.log(content);
                content = content.replace(question_tag, '');
                $(this).parent().parent().prev().find('textarea').val(content)
                console.log('d')
                question_cnt = question_cnt - 1;
                $(this).parent().remove();
            })
            $(document).on('click', '.question-error-item-remove', function () {
                $(this).parent().remove();
            })
        })
    </script>
</x-admin-layout>
