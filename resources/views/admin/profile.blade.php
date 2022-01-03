<x-admin-layout>
    <div class="side-app dash_min-hei" id="profile">
        <div class="page-header">
            <h4 class="page-title">プロフィール</h4>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">マイプロフィール</h3>
                    </div>
                    <div class="card-body">
                        <form id="my_profile">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <span class="avatar brround avatar-xl" style="background-image: url('{{ isset($admin->image) ? asset($admin->image) : asset('images/faces/male/16.jpg')}}')"></span>
                                </div>
                                <div class="col">
                                    <h3 class="mb-1">{{ $admin->first_name . ' ' . $admin->last_name }}</h3>
                                    <p class="mb-4">{{ $admin->company_name }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">メールアドレス</label>
                                <input class="form-control" placeholder="test-email@domain.com" type="email" name="email" value="{{ $admin->email }}" required/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">パスワード</label>
                                <input type="password" class="form-control" value="" required placeholder="******"/>
                            </div>
                            <div class="form-footer">
                                <button class="btn btn-primary btn-block btn_my_profile">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="card" id="profile_edit">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">プロフィール編集</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">会社名</label>
                                    <input type="text" class="form-control"  placeholder="会社名" value="{{$admin->company_name}}" name="company_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">姓</label>
                                    <input type="text" class="form-control" placeholder="姓" value="{{$admin->first_name}}" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">名</label>
                                    <input type="text" class="form-control" placeholder="名" value="{{$admin->last_name}}" name="last_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">プロフィール画像</label>
                                    <input type="file" class="dropify" name="file" data-height="150"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn_profile_edit">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn_profile_edit').click(function (e) {
                e.preventDefault();
                saveForm('profile_edit', profile_edit)
            })
            $('.btn_my_profile').click(function (e) {
                e.preventDefault();
                saveForm('my_profile', my_profile)
            })
        })
    </script>
</x-admin-layout>
