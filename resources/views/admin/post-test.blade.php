<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-test">
        <div class="page-header">
            <h4 class="page-title">新規追加：テスト</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-9">
                <div class="form-group">
                    <label class="form-label">タイトル</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="タイトル">
                </div>
                <div class="form-group">
                    <label class="form-label">親カリキュラム-レッスンの選択</label>
                    <select class="form-control select2-show-search" data-placeholder="カリキュラム-レッスン">
                        <option label="Choose one">
                        </option>
                        <optgroup label="カリキュラム名">
                            <option value="AZ">レッスン名レッスン名</option>
                            <option value="CO">レッスン名レッスン名</option>
                            <option value="ID">レッスン名レッスン名</option>
                        </optgroup>
                        <optgroup label="カリキュラム名">
                            <option value="AL">レッスン名レッスン名</option>
                            <option value="AR">レッスン名レッスン名</option>
                            <option value="IL">レッスン名レッスン名</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                    <input type="file" class="dropify" data-height="150" />
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="form-group">
                    <label class="form-label">スラッグ</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="スラッグ">
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="status_btn flex fx-bet fx-wrp">
                            <a href="#" class="btn btn-secondary">下書き保存</a>
                            <a href="#" class="btn btn-secondary">プレビュー</a>
                        </div>
                        <div class="status">
                            <div class="item">
                                <label class="form-label">優先順位</label>
                                <input type="number" class="form-control" name="example-text-input" placeholder="なし">
                            </div>
                            <div class="item">
                                <label class="form-label">ステータス変更</label>
                                <div class="input-group">
                                    <select class="form-control custom-select">
                                        <option value="1">下書き</option>
                                        <option value="2">公開</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary">OK</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <a href="#" class="btn btn-primary">公開</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
