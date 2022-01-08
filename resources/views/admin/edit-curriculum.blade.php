<x-admin-layout>
    <style>

    </style>
    <div class="side-app dash_min-hei" id="edit-curriculum">
        <div class="page-header">
            <h4 class="page-title">カリキュラム</h4>
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
                                        <li class=""><a href="#cur-all" class="active show" data-toggle="tab">すべて ({{ count($all_data) }})</a></li>
                                        <li><a href="#cur-open" data-toggle="tab" class="">公開済み ({{ count($open_data) }})</a></li>
                                        <li><a href="#cur-draft" data-toggle="tab">下書き ({{ count($draft_data) }})</a></li>
                                        <li><a href="#cur-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="cur-all">
                                        <table id="curAllTable" class="table table-striped wrp_ad_table" style="width:100%">
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
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="cur-open">
                                        <table id="curOpenTable" class="table table-striped wrp_ad_table" style="width:100%">
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
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="cur-draft">
                                        <table id="curDraftTable" class="table table-striped wrp_ad_table" style="width:100%">
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
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="cur-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="curTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
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
            drawDataTable('curAllTable');
            drawDataTable('curOpenTable');
            drawDataTable('curDraftTable');
            drawDataTable('curTrashTable');

            $('.del').click(function () {
                let id = $(this).data('id');
                let msg = "削除しました。"
                actionId(id, delete_curriculum, msg);
            })

            $('.empty').click(function () {
                emptyTrash(empty_trash_curriculum);
            })

            $('.restore').click(function () {
                let id = $(this).data('id');
                let msg = "復元しました。"
                actionId(id, restore_curriculum, msg);
            })

            $('.complete-del').click(function () {
                let id = $(this).data('id');
                let msg = "完全削除しました。"
                actionId(id, complete_delete_curriculum, msg);
            })
        })

    </script>
</x-admin-layout>
