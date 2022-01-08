<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-curriculum">
        <div class="page-header">
            <h4 class="page-title">{{ isset($curriculum) ? '編集' : '新規追加' }}：カリキュラム</h4>
        </div>
        <form id="curriculum" class="data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($curriculum) ? $curriculum->id : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label class="form-label">タイトル</label>
                        <input type="text" class="form-control" name="title" placeholder="タイトル"
                               value="{{ isset($curriculum) ? $curriculum->title : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                        @if(!isset($curriculum))
                            <input type="file" class="dropify" name="file" data-height="150" required>
                        @else
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <img src="{{ asset($curriculum->thumbnail) }}" style="height: 160px;">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <input type="file" class="dropify" name="file" data-height="150">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">テキスト <span class="form-label-small">30~50文字推奨</span></label>
                        <textarea class="form-control" name="detail" rows="6" placeholder="" required>{{ isset($curriculum) ? $curriculum->detail : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="form-group">
                        <label class="form-label">スラッグ</label>
                        <input type="text" class="form-control" name="slack" placeholder="スラッグ" value="{{ isset($curriculum) ? $curriculum->slack : '' }}">
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
                                    <input type="number" class="form-control" name="order" placeholder="なし" value="{{ isset($curriculum) ? $curriculum->order : '' }}">
                                </div>
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option value="0" {{ isset($curriculum) && $curriculum->public_status == 0 ? 'selected' : '' }}>下書き</option>
                                            <option value="1" {{ isset($curriculum) && $curriculum->public_status == 1 ? 'selected' : '' }}>公開</option>
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
                saveForm('curriculum', save_curriculum)
            })
        })
    </script>
</x-admin-layout>
