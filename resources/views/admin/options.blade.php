<x-admin-layout>
    <div class="side-app dash_min-hei" id="options">
        <div class="page-header">
            <h4 class="page-title">サイト設定</h4>
        </div>
        <div class="col-lg-6 col-md-12">
            <form id="options" class="data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">サイトのタイトル</label>
                            <input type="text" class="form-control" placeholder="サイトのタイトル" name="site_title" value="{{$site_setting['site_title']}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">サイトの説明</label>
                            <input type="text" class="form-control" placeholder="サイトの簡単な説明" name="site_description" value="{{$site_setting->site_description}}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">サイトロゴ</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img src="{{ asset($site_setting->logo) }}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="file" class="dropify" data-height="150" name="file" required/>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">会社名</label>
                            <input type="text" class="form-control" placeholder="会社名" name="company_name" value="{{$site_setting->company_name}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">管理者代表アドレス</label>
                            <input type="email" class="form-control" placeholder="メールアドレス" name="address" value="{{$site_setting->address}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-footer mb-4">
                            <button type="submit" class="btn btn-primary btn_submit">更新</button>
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
                saveForm('options', save_setting)
            })
        })
    </script>
</x-admin-layout>
