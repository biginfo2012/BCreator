<x-admin-layout>
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
                        <input type="text" class="form-control" name="title" placeholder="タイトル" value="{{ isset($lesson) ? $lesson->title : '' }}" required>
                    </div>
                    <div class="form-group ">
                        <div class="form-group ">
                            <label class="form-label">親カリキュラムの選択</label>
                            <select class="form-control select2 custom-select" name="curriculum_id" data-placeholder="カリキュラム" required>
                                <option label="Choose one">
                                </option>
                                @foreach($curriculum as $item)
                                    <option value="{{ $item->id }}" {{ isset($lesson) && $lesson->curriculum_id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                        <input type="file" class="dropify" name="file" data-height="150" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">コンテンツ</label>
                        <textarea class="content" required name="detail">{{ isset($lesson) ? $lesson->detail : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">スラッグ</label>
                        <input type="text" class="form-control" name="slack" placeholder="スラッグ" value="{{ isset($lesson) ? $lesson->slack : '' }}">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="status_btn flex fx-bet fx-wrp">
                                <button type="submit" class="btn btn-secondary btn_submit">下書き保存</button>
                                <a href="#" class="btn btn-secondary">プレビュー</a>
                            </div>
                            <div class="status">
                                <div class="item">
                                    <label class="form-label">優先順位</label>
                                    <input type="number" class="form-control" name="order" placeholder="なし" value="{{ isset($lesson) ? $lesson->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option value="0" {{ isset($lesson) && $lesson->public_status == 0 ? 'selected' : '' }}>下書き</option>
                                            <option value="1" {{ isset($lesson) && $lesson->public_status == 1 ? 'selected' : '' }}>公開</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary">OK</button>
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
        $(document).ready(function () {
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                saveForm('lesson', save_lesson)
            })
        })
    </script>
</x-admin-layout>
