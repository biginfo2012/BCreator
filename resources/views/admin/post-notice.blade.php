<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-notice">
        <div class="page-header">
            <h4 class="page-title">{{ isset($notice) ? '編集' : '新規追加' }}：運営からの通知</h4>
        </div>
        <form id="notice" class="data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($notice) ? $notice->id : '' }}">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="form-group">
                        <label class="form-label">タイトル</label>
                        <input type="text" class="form-control" name="title" placeholder="タイトル" value="{{ isset($notice) ? $notice->title : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">テキスト <span class="form-label-small">40~80文字推奨</span></label>
                        <textarea class="form-control" name="detail" rows="6" placeholder="" required>{{ isset($notice) ? $notice->detail : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="status_btn flex fx-bet fx-wrp">
                                <button type="submit" class="btn btn-secondary btn_submit">下書き保存</button>
                            </div>
                            <div class="status">
                                <div class="item">
                                    <label class="form-label">ステータス変更</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="public_status">
                                            <option value="0" {{ isset($notice) && $notice->public_status == 0 ? 'selected' : '' }}>下書き</option>
                                            <option value="1" {{ isset($notice) && $notice->public_status == 1 ? 'selected' : '' }}>公開</option>
                                        </select>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary btn_submit">OK</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <button type="submit" class="btn btn-primary btn_submit">{{ isset($notice) && $notice->public_status == 1 ? '更新' : '公開' }}</button>
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
                saveForm('notice', save_notice)
            })
        })
    </script>
</x-admin-layout>
