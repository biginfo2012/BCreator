<x-admin-layout>
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
                        <input type="text" class="form-control" placeholder="タイトル" name="title" value="{{ isset($test) ? $test->title : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">親カリキュラム-レッスンの選択</label>
                        <select class="form-control select2-show-search" name="lesson_id" data-placeholder="カリキュラム-レッスン" required>
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
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">スラッグ</label>
                        <input type="text" class="form-control" placeholder="スラッグ" name="slack" value="{{ isset($test) ? $test->slack : '' }}" required>
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
                                    <input type="number" class="form-control" placeholder="なし" name="order" value="{{ isset($test) ? $test->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option value="0" {{ isset($test) && $test->public_status == 0 ? 'selected' : '' }}>下書き</option>
                                            <option value="1" {{ isset($test) && $test->public_status == 1 ? 'selected' : '' }}>公開</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary btn_submit">OK</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btn btn-primary btn_submit">公開</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        let preview_url;
        $(document).ready(function () {
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                $('[name=preview]').val(0)
                saveForm('test', save_test)
            })
            $('.btn_preview').click(function () {
                $(this).prev().val(1);
                let slack = $('[name=slack]').val();
                preview_url = '{{url('master/preview-test')}}' + '/' + slack;
                saveForm('test', save_test)
            })
        })
    </script>
</x-admin-layout>
