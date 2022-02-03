<x-admin-layout>
    <style>
        .table td{
            padding: 0;
        }
        .table thead th, .text-wrap table thead th{
            border-bottom: 0;
        }
        th{
            padding-left: 0 !important;
        }
    </style>
    <div class="side-app dash_min-hei" id="edit-user">
        <div class="page-header">
            <h4 class="page-title">ユーザー</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#us-open" class="active show" data-toggle="tab">メンバー ({{ count($all_data) }})</a></li>
                                        <li><a href="#us-stop" data-toggle="tab" class="">停止中 ({{ count($stop_data) }})</a></li>
                                        <li><a href="#us-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="us-open">
                                        <table id="userAllTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_id" width="15%"><span>ID</span></th>
                                                <th class="table_family" width="12.5%"><span>姓</span></th>
                                                <th class="table_first" width="12.5%"><span>名</span></th>
                                                <th class="table_mail" width="20%"><span>メール</span></th>
                                                <th class="table_level" width="15%"><span>会員レベル</span></th>
                                                <th class="table_day" width="12.5%"><span>登録日</span></th>
                                                <th class="table_login" width="12.5%"><span>最終ログイン</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_data as $id => $item)
                                                <tr class="table_item">
                                                    <td class="table_id">
                                                        <span>{{ $id+1 }}</span>
                                                        <div class="flex fx-wrp">
                                                            <a href="{{ route('master.modify-user', $item->id) }}">編集</a>
                                                            <a href="#" class="stop_user" data-id="{{$item->id}}">停止</a>
                                                            <a href="#" class="del" data-id="{{$item->id}}">削除</a>
                                                        </div>
                                                    </td>
                                                    <td class="table_family"><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td class="table_first"><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td class="table_mail"><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td class="table_level"><span class="mt-2">{{ $item['role'] == 1 ? '管理者' : ($item['role'] == 2 ? '無料会員' : ($item['role'] == 3 ? '有料会員' : '銀行未振込')) }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->created_at)) }}</span></td>
                                                    <td class="table_login"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->login_at)) }}</span></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="us-stop">
                                        <table id="userStopTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_id" width="15%"><span>ID</span></th>
                                                <th class="table_family" width="12.5%"><span>姓</span></th>
                                                <th class="table_first" width="12.5%"><span>名</span></th>
                                                <th class="table_mail" width="20%"><span>メール</span></th>
                                                <th class="table_level" width="15%"><span>会員レベル</span></th>
                                                <th class="table_day" width="12.5%"><span>登録日</span></th>
                                                <th class="table_login" width="12.5%"><span>最終ログイン</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($stop_data as $id => $item)
                                                <tr class="table_item">
                                                    <td class="table_id">
                                                        <span>{{ $id+1 }}</span>
                                                        <div class="flex fx-wrp">
                                                            <a href="#" class="active_user" data-id="{{$item->id}}">有効化</a>
                                                            <a href="#" class="del" data-id="{{$item->id}}">削除</a>
                                                        </div>
                                                    </td>
                                                    <td class="table_family"><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td class="table_first"><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td class="table_mail"><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td class="table_level"><span class="mt-2">{{ $item['role'] == 1 ? '管理者' : ($item['role'] == 2 ? '無料会員' : ($item['role'] == 3 ? '有料会員' : '銀行未振込')) }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->created_at)) }}</span></td>
                                                    <td class="table_login"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->login_at)) }}</span></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="us-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="userTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_id" width="15%"><span>ID</span></th>
                                                <th class="table_family" width="12.5%"><span>姓</span></th>
                                                <th class="table_first" width="12.5%"><span>名</span></th>
                                                <th class="table_mail" width="20%"><span>メール</span></th>
                                                <th class="table_level" width="15%"><span>会員レベル</span></th>
                                                <th class="table_day" width="12.5%"><span>登録日</span></th>
                                                <th class="table_login" width="12.5%"><span>最終ログイン</span></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $id => $item)
                                                <tr class="table_item">
                                                    <td class="table_id">
                                                        <span>{{ $id+1 }}</span>
                                                        <div class="flex fx-wrp">
                                                            <a href="#" class="restore" data-id="{{$item->id}}">復元</a>
                                                            <a href="#" class="complete-del" data-id="{{$item->id}}">完全削除</a>
                                                        </div>
                                                    </td>
                                                    <td class="table_family"><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td class="table_first"><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td class="table_mail"><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td class="table_level"><span class="mt-2">{{ $item['role'] == 1 ? '管理者' : ($item['role'] == 2 ? '無料会員' : ($item['role'] == 3 ? '有料会員' : '銀行未振込')) }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->created_at)) }}</span></td>
                                                    <td class="table_login"><span class="mt-2">{{ date('Y年m月d日', strtotime($item->login_at)) }}</span></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            drawDataTable('userAllTable');
            drawDataTable('userStopTable');
            drawDataTable('userTrashTable');

            $('.stop_user').click(function () {
                let id = $(this).data('id');
                let msg = "停止しました。"
                actionId(id, stop_user, msg);
            })

            $('.del').click(function () {
                let id = $(this).data('id');
                let msg = "削除しました。"
                actionId(id, delete_user, msg);
            })

            $('.active_user').click(function () {
                let id = $(this).data('id');
                let msg = "有効化しました。"
                actionId(id, active_user, msg);
            })

            $('.empty').click(function () {
                emptyTrash(empty_trash_user);
            })

            $('.restore').click(function () {
                let id = $(this).data('id');
                let msg = "復元しました。"
                actionId(id, restore_user, msg);
            })

            $('.complete-del').click(function () {
                let id = $(this).data('id');
                let msg = "完全削除しました。"
                actionId(id, complete_delete_user, msg);
            })
        })

    </script>
</x-admin-layout>
