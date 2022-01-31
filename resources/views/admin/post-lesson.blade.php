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

        #h2-add {
            font-size: 40px;
        }
    </style>
    <div class="side-app dash_min-hei" id="post-lesson">
        <div class="page-header">
            <h4 class="page-title">{{ isset($lesson) ? '編集' : '新規追加' }}：レッスン</h4>
        </div>
        <form id="lesson" class="data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($lesson) ? $lesson->id : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label class="form-label">タイトル</label>
                        <input type="text" class="form-control" name="title" placeholder="タイトル"
                               value="{{ isset($lesson) ? $lesson->title : '' }}" required>
                    </div>
                    <div class="form-group ">
                        <div class="form-group ">
                            <label class="form-label">親カリキュラムの選択</label>
                            <select class="form-control select2 custom-select" name="curriculum_id"
                                    data-placeholder="カリキュラム" required>
                                <option label="Choose one">
                                </option>
                                @foreach($curriculum as $item)
                                    <option
                                        value="{{ $item->id }}" {{ isset($lesson) && $lesson->curriculum_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                        @if(!isset($lesson))
                            <input type="file" class="dropify" name="file" data-height="150" required>
                        @else
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <img src="{{ asset($lesson->thumbnail) }}" style="height: 160px;">
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
                        <label class="form-label">レッスンの説明 <span class="form-label-small">40~80文字推奨</span></label>
                        <textarea class="form-control" name="comment" rows="2" placeholder=""
                                  required>{{isset($lesson) ? $lesson->comment : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">コンテンツ</label>
                        <input type="hidden" name="detail" id="detail">
                        {{--                        <textarea class="content" required name="detail">{{ isset($lesson) ? $lesson->detail : '' }}</textarea>--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-part">
                                    <input type="hidden" id="h2_cnt" value="{{isset($h2_cnt) ? $h2_cnt : 1}}">
                                    @if(isset($lesson))
                                        @if(count($lesson->det) > 0)
                                            @foreach($lesson->det as $item)
                                                @if($item->parent_id == 0)
                                                    <div class="paragraph" data-id="{{$item->id}}">
                                                        <div class="h2-part">
                                                            <div class="form-group">
                                                                <label class="form-label">h2タイトル</label>
                                                                <input class="form-control h2_title" type="text"
                                                                       name="h2_title_{{$item->id}}" required
                                                                       value="{{$item->title}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">h2内容</label>
                                                                <textarea class="form-control h2_content"
                                                                          name="h2_content_{{$item->id}}" required
                                                                          rows="3">{{$item->content}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="h3-part">
                                                            @foreach($lesson->det as $item_tmp)
                                                                @if($item_tmp->parent_id == $item->id)
                                                                    <div class="h3-item" data-id="{{$item_tmp->id}}">
                                                                        <div class="form-group">
                                                                            <label class="form-label">h3タイトル</label>
                                                                            <input class="form-control h3_title"
                                                                                   name="h3_title_{{$item->id}}_{{$item_tmp->id}}"
                                                                                   type="text" required value="{{$item_tmp->title}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label">h3内容</label>
                                                                            <textarea class="form-control h3_content"
                                                                                      name="h3_content_{{$item->id}}_{{$item_tmp->id}}"
                                                                                      required rows="3">{{$item_tmp->content}}</textarea>
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
                                                        <input class="form-control h2_title" type="text" name="h2_title_1"
                                                               required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">h2内容</label>
                                                        <textarea class="form-control h2_content"
                                                                  name="h2_content_1" required rows="3"></textarea>
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
                                                    <textarea class="form-control h2_content"
                                                              name="h2_content_1" required rows="3"></textarea>
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
                        <input type="text" class="form-control" name="slack" placeholder="スラッグ"
                               value="{{ isset($lesson) ? $lesson->slack : '' }}" required>
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
                                    <label class="form-label">目安時間</label>
                                    <input type="number" class="form-control" name="time" placeholder=""
                                           value="{{ isset($lesson) ? $lesson->time : 30 }}" required>
                                </div>
                                <div class="item">
                                    <label class="form-label">優先順位</label>
                                    <input type="number" class="form-control" name="order" placeholder="なし"
                                           value="{{ isset($lesson) ? $lesson->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option
                                                value="0" {{ isset($lesson) && $lesson->public_status == 0 ? 'selected' : '' }}>
                                                下書き
                                            </option>
                                            <option
                                                value="1" {{ isset($lesson) && $lesson->public_status == 1 ? 'selected' : '' }}>
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
                                            class="btn btn-primary btn_submit">{{ isset($lesson) && $lesson->public_status == 1 ? '更新' : '公開' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        let preview_url, h2_cnt = 1;
        $(document).ready(function () {
            h2_cnt = $('#h2_cnt').val();
            $('.h2_content').richText();
            $('.h3_content').richText();
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                $('[name=preview]').val(0)
                console.log(h2_cnt);
                var detail = [];
                var enable = true;
                $('.paragraph').each(function () {
                    let tmp = {};
                    $t = $(this);
                    let h2_title = $t.find('input.h2_title').val();
                    tmp['h2_title'] = h2_title;
                    let h2_content = $t.find('textarea.h2_content').val();
                    if (h2_content == '') {
                        enable = false;
                        return;
                    }
                    tmp['h2_content'] = h2_content;
                    var h3_detail = [];
                    $t.find('.h3-item').each(function () {
                        let h3_tmp = {};
                        let h3_title = $(this).find('input.h3_title').val();
                        h3_tmp['h3_title'] = h3_title;
                        let h3_content = $(this).find('textarea.h3_content').val();
                        h3_tmp['h3_content'] = h3_content;
                        if (h3_content == '') {
                            enable = false;
                            return;
                        }
                        h3_detail.push(h3_tmp);
                    })
                    tmp['h3_detail'] = h3_detail;
                    detail.push(tmp);
                })
                console.log(JSON.stringify(detail))
                $('#detail').val(JSON.stringify(detail));
                if (enable) {
                    saveForm('lesson', save_lesson)
                }

            })
            $('.btn_preview').click(function () {
                $(this).prev().val(1);
                let slack = $('[name=slack]').val();
                preview_url = '{{url('master/preview-lesson')}}' + '/' + slack;
                var detail = [];
                var enable = true;
                $('.paragraph').each(function () {
                    let tmp = {};
                    $t = $(this);
                    let h2_title = $t.find('input.h2_title').val();
                    tmp['h2_title'] = h2_title;
                    let h2_content = $t.find('textarea.h2_content').val();
                    tmp['h2_content'] = h2_content;
                    if (h2_content == '') {
                        enable = false;
                        return;
                    }
                    var h3_detail = [];
                    $t.find('.h3-item').each(function () {
                        let h3_tmp = {};
                        let h3_title = $(this).find('input.h3_title').val();
                        h3_tmp['h3_title'] = h3_title;
                        let h3_content = $(this).find('textarea.h3_content').val();
                        h3_tmp['h3_content'] = h3_content;
                        if (h3_content == '') {
                            enable = false;
                            return;
                        }
                        h3_detail.push(h3_tmp);
                    })
                    tmp['h3_detail'] = h3_detail;
                    detail.push(tmp);
                })
                console.log(JSON.stringify(detail))
                $('#detail').val(JSON.stringify(detail));
                if (enable) {
                    saveForm('lesson', save_lesson)
                }
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
                    '                                                <i class="fa fa-remove h3-remove"></i>\n' +
                    '                                            </div>';
                $(this).parent().before(h3_content);
                let content_name = '[name=h3_content_' + id + '_' + item_id + ']';
                $(content_name).richText();
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
                    '                                        </div>\n' +
                    '                                        <div class="h3-part">\n' +
                    '                                            <div class="text-center mt-3">\n' +
                    '                                                <i class="fe fe-plus-circle h3-add"></i>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>';
                $(this).parent().before(h2_content);
                let content_name = '[name=h2_content_' + id + ']';
                $(content_name).richText();

            })
            $(document).on('click', '.h2-remove', function () {
                $(this).parent().remove();
                h2_cnt = h2_cnt - 1;
            })
            $(document).on('click', '.h3-remove', function () {
                $(this).parent().remove();
            })
        })
    </script>
</x-admin-layout>
