<x-admin-layout>
    <div class="side-app dash_min-hei" id="edit-notice">
        <div class="page-header">
            <h4 class="page-title">運営からの通知</h4>
            <a href="{{route('mypage')}}" class="btn btn-primary" target="_blank">表示する</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="panel panel-primary">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1 ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#no-all" class="active show" data-toggle="tab">すべて ({{ count($all_data) }})</a></li>
                                        <li><a href="#no-open" data-toggle="tab" class="">公開済み ({{ count($open_data) }})</a></li>
                                        <li><a href="#no-draft" data-toggle="tab">下書き ({{ count($draft_data) }})</a></li>
                                        <li><a href="#no-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="no-all">
                                        <table id="noAllTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">タイトル</th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_data as $item)
                                                <tr>
                                                    <td>
                                                        <span>{{ $item->title }}</span>
                                                        <span class="draft">{{ isset($item->deleted_at) ? '-削除' : ($item->public_status == 0 ? '-下書き' : '-公開済み') }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td>
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-notice', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="no-open">
                                        <table id="noOpenTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">タイトル</th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($open_data as $item)
                                                <tr>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item['user']['first_name'] }}</td>
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-notice', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="no-draft">
                                        <table id="noDraftTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">タイトル</th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($draft_data as $item)
                                                <tr>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item['user']['first_name'] }}</td>
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-notice', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="no-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="noTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">タイトル</th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $item)
                                                <tr>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item['user']['first_name'] }}</td>
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <label class="restore mb-0" data-id="{{ $item->id }}">復元</label>
                                                            <label class="complete-del mb-0" data-id="{{ $item->id }}">完全削除</label>
                                                        </div>
                                                    </td>
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
            drawDataTable('noAllTable');
            drawDataTable('noOpenTable');
            drawDataTable('noDraftTable');
            drawDataTable('noTrashTable');

            $('.del').click(function () {
                let id = $(this).data('id');
                let msg = "削除しました。"
                actionId(id, delete_notice, msg);
            })

            $('.empty').click(function () {
                emptyTrash(empty_trash_notice);
            })

            $('.restore').click(function () {
                let id = $(this).data('id');
                let msg = "復元しました。"
                actionId(id, restore_notice, msg);
            })

            $('.complete-del').click(function () {
                let id = $(this).data('id');
                let msg = "完全削除しました。"
                actionId(id, complete_delete_notice, msg);
            })
        })

    </script>
</x-admin-layout>
