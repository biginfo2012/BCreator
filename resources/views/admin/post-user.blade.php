<x-admin-layout>
    <div class="side-app dash_min-hei" id="post-user">
        <div class="page-header">
            <h4 class="page-title">{{ isset($user) ? '編集' : '新規追加' }}：ユーザー</h4>
        </div>
        <div class="col-lg-6 col-md-12">
            <form id="user">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">姓</label>
                            <input type="text" class="form-control" placeholder="姓" name="first_name" required value="{{ isset($user) ? $user->first_name : '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">名</label>
                            <input type="text" class="form-control" placeholder="名" name="last_name" required value="{{ isset($user) ? $user->last_name : '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">メールアドレス</label>
                            <input type="email" class="form-control" placeholder="メールアドレス" name="email" required value="{{ isset($user) ? $user->email : '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">パスワード</label>
                            <input type="password" class="form-control" placeholder="パスワード" name="password" {{ isset($user) ? '' : 'required' }}>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">会員レベル</label>
                            <select class="form-control custom-select" name="role">
                                <option value="1" {{ isset($user) && $user->role ==1 ? 'selected' :'' }}>管理者</option>
                                <option value="2" {{ isset($user) && $user->role ==2 ? 'selected' :'' }}>無料会員</option>
                                <option value="3" {{ isset($user) && $user->role ==3 ? 'selected' :'' }}>有料会員</option>
                                <option value="4" {{ isset($user) && $user->role ==4 ? 'selected' :'' }}>銀行未振込</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">会員ステータス</label>
                            <select class="form-control custom-select" name="status">
                                <option value="1" {{ isset($user) && $user->status ==1 ? 'selected' :'' }}>有効</option>
                                <option value="0" {{ isset($user) && $user->status ==0 ? 'selected' :'' }}>停止中</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn_submit">{{ isset($user) ? '編集' : '新規追加' }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn_submit').click(function (e) {
                e.preventDefault();
                saveForm('user', save_user)
            })
        })
    </script>
</x-admin-layout>
