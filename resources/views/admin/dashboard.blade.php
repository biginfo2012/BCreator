<x-admin-layout>
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">ダッシュボード</h4>
        </div>
        <div class="row row-cards">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body sales-relative">
                        <h5 class="text-muted">総ユーザー数</h5>
                        <h1 class="text-success">{{ $cnt_users }}人</h1>
                        <a href="{{ route('master.edit-user') }}" class="text-success border-bottom">詳細を見る</a>
                        <i class="fa fa-user fa-2x icon-absolute bg-success text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body sales-relative">
                        <h5 class="text-muted">総売り上げ</h5>
                        {{--Todo total payments--}}
                        <h1 class="text-primary">¥{{number_format($total_pay)}}</h1>
                        <a href="{{ route('master.payments') }}" class="text-grey border-bottom">詳細を見る</a>
                        <i class="fa fa-credit-card-alt fa-2x icon-absolute bg-primary text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body sales-relative">
                        <h5 class="text-muted">総コンテンツ数</h5>
                        {{--Todo total lesson--}}
                        <h1 class="text-info">{{$cnt_lessons}}</h1>
                        <a href="{{ route('master.edit-lesson') }}" class="text-info border-bottom">詳細を見る</a>
                        <i class="fa fa-folder fa-2x icon-absolute bg-info text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card ">
                    <div class="card-body sales-relative">
                        <h5 class="text-muted">当月の新規ユーザー</h5>
                        <h1 class="text-danger">{{ $cnt_month_user }}人</h1>
                        <a href="{{ route('master.edit-user') }}" class="text-danger border-bottom">詳細を見る</a>
                        <i class="fa fa-signal fa-2x icon-absolute bg-danger text-white" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">b-Creator masterの使い方</h3>
                    </div>
                    <div class="card-body overflow-hidden">
                        <div class="wrp_master_howto">
                            <div class="box">
                                <div class="item_title">
                                    <span>① カリキュラムの作成</span>
                                </div>
                                <div class="" style="padding: 0 15px; margin-bottom: 5px;">
                                    <span>まず最初にカリキュラムを作成します。カリキュラムはレッスン、復習、テストをまとめる箱の役割を持っているため、カリキュラムがなくては子要素に当たるそれらは作成できません。</span>
                                </div>
                                <div class="move_btn">
                                    <a href="{{ route('master.post-curriculum') }}">カリキュラムを作る<i class="angle fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="box">
                                <div class="item_title">
                                    <span>② レッスンの作成</span>
                                </div>
                                <div class="" style="padding: 0 15px; margin-bottom: 5px;">
                                    <span>カリキュラムの作成後、レッスンを作成します。どのカリキュラムに属するのかを選択し、レッスンを作成することで、該当のカリキュラム内に表示されます。</span>
                                </div>
                                <div class="move_btn">
                                    <a href="{{ route('master.post-lesson') }}">レッスンを作る<i class="angle fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="box">
                                <div class="item_title">
                                    <span>③ 復習・テストの作成</span>
                                </div>
                                <div class="" style="padding: 0 15px; margin-bottom: 5px;">
                                    <span>復習・テストは各カリキュラム・レッスンのまとめとしてご利用ください。</span>
                                </div>
                                <div class="move_btn">
                                    <a href="{{ route('master.post-review') }}">復習を作る<i class="angle fa fa-angle-right"></i></a>
                                    <a href="{{ route('master.post-test') }}">テストを作る<i class="angle fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-deck">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">新規ユーザー</h4>
                            <a href="{{ route('master.edit-user') }}"><i class="mdi mdi-dots-vertical"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>USER</th>
                                    <th></th>
                                    <th class="d-none d-sm-table-cell">登録日</th>
                                </tr>
                                @foreach($current_users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        {{--Todo user profile image--}}
                                        <td><span class="avatar  d-block rounded" style=""></span></td>
                                        <td>{{ $item->first_name . $item->last_name }}</td>
                                        <td class="d-none d-sm-table-cell">{{ date('Y年m月d日', strtotime($item->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">アクティブユーザー</h4>
                        </div>
                        <p class="card-description">ユーザーのサイト利用状況を表示しています</p>
                        @foreach($login_users as $item)
                            <div class="list d-flex align-items-center border-bottom py-3">
                                <div class="avatar brround d-block" style="">
                                    {{--Todo user profile image--}}
                                    <span class="avatar-status bg-green"></span>
                                </div>
                                <div class="w-100 ml-3">
                                    <p class="mb-0"><b>{{ $item->first_name . $item->last_name }}</b></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted mr-1"></i>
                                            <p class="mb-0 f12">前回のログイン：{{ date('H.i.s', strtotime($item->login_at)) }}</p>
                                        </div>
                                        <small class="text-muted ml-auto">{{ round(abs(strtotime(date('Y-m-d H:i:s')) - strtotime($item->login_at))/3600,0) }}時間前</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
