<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-review">
        <div class="page-header">
            <h4 class="page-title">{{ isset($review) ? '編集' : '新規追加' }}：復習</h4>
        </div>
        <form id="review" class="data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($review) ? $review->id : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label class="form-label">タイトル</label>
                        <input type="text" class="form-control" placeholder="タイトル" name="title" value="{{ isset($review) ? $review->title : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">親カリキュラム-レッスンの選択</label>
                        <select class="form-control select2-show-search" name="lesson_id" data-placeholder="カリキュラム-レッスン" required>
                            <option label="Choose one">
                            </option>
                            @foreach($curriculum as $cur)
                                <optgroup label="{{$cur->curriculum->title}}">
                                    @foreach($lesson as $les)
                                        @if($cur->curriculum_id == $les->curriculum_id)
                                            <option value="{{ $les->id }}" {{ isset($review) && $review->lesson_id == $les->id ? 'selected' : '' }}>{{ $les->title }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                        <input type="file" class="dropify" data-height="150" name="file" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">コンテンツ</label>
                        <textarea class="content" name="detail">{{ isset($review) ? $review->detail : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">スラッグ</label>
                        <input type="text" class="form-control" placeholder="スラッグ" name="slack" value="{{ isset($review) ? $review->slack : '' }}">
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
                                    <input type="number" class="form-control" placeholder="なし" name="order" value="{{ isset($review) ? $review->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option value="0" {{ isset($review) && $review->public_status == 0 ? 'selected' : '' }}>下書き</option>
                                            <option value="1" {{ isset($review) && $review->public_status == 1 ? 'selected' : '' }}>公開</option>
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
                saveForm('review', save_review)
            })
        })
    </script>
</x-admin-layout>
