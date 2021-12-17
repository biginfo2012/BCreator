<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-user">
        <div class="page-header">
            <h4 class="page-title">新規追加：ユーザー</h4>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">姓</label>
                        <input type="text" class="form-control" placeholder="姓">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">名</label>
                        <input type="text" class="form-control" placeholder="名">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">メールアドレス</label>
                        <input type="email" class="form-control" placeholder="メールアドレス">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">パスワード</label>
                        <input type="email" class="form-control" placeholder="パスワード">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">会員レベル</label>
                        <select class="form-control custom-select">
                            <option value="1">管理者</option>
                            <option value="2">無料会員</option>
                            <option value="3">有料会員</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">会員ステータス</label>
                        <select class="form-control custom-select">
                            <option value="1">有効</option>
                            <option value="2">停止中</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">新規追加</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
