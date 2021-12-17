<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-lesson">
        <div class="page-header">
            <h4 class="page-title">新規追加：レッスン</h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-9">
                <div class="form-group">
                    <label class="form-label">タイトル</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="タイトル">
                </div>
                <div class="form-group ">
                    <div class="form-group ">
                        <label class="form-label">親カリキュラムの選択</label>
                        <select class="form-control select2 custom-select" data-placeholder="カリキュラム">
                            <option label="Choose one">
                            </option>
                            <option value="1">テストテスト</option>
                            <option value="2">テストテスト</option>
                            <option value="3">テストテスト</option>
                            <option value="4">テストテストテストテスト</option>
                            <option value="5">テストテスト</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">サムネイル <span class="form-label-small">600×400</span></label>
                    <input type="file" class="dropify" data-height="150" />
                </div>
                <div class="form-group">
                    <label class="form-label">コンテンツ</label>
                    <textarea class="content" name="example"></textarea>
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
