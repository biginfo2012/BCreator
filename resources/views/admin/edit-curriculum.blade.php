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
    <div class="side-app dash_min-hei" id="edit-curriculum">
        <div class="page-header">
            <h4 class="page-title">カリキュラム</h4>
            <a href="{{route('archive-curriculum')}}" class="btn btn-primary" target="_blank">表示する</a>
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
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">タイトル</th>
                                                <th class="table_contributor" width="15%">投稿者</th>
                                                <th class="table_day" width="25%">最終更新日</th>
                                                <th class="table_slug" width="15%">スラッグ</th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">
                                                        <span>{{ $item->title }}</span>
                                                        <span class="draft">{{ isset($item->deleted_at) ? '-削除' : ($item->public_status == 0 ? '-下書き' : '-公開済み') }}</span>
                                                    </td>
                                                    <td class="table_contributor"><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td class="table_slug"><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td class="table_edit">
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
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">タイトル</th>
                                                <th class="table_contributor" width="15%">投稿者</th>
                                                <th class="table_day" width="25%">最終更新日</th>
                                                <th class="table_slug" width="15%">スラッグ</th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($open_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">{{ $item->title }}</td>
                                                    <td class="table_contributor">{{ $item['user']['first_name'] }}</td>
                                                    <td class="table_day">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td class="table_slug">{{ $item->slack }}</td>
                                                    <td class="table_edit">
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
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">タイトル</th>
                                                <th class="table_contributor" width="15%">投稿者</th>
                                                <th class="table_day" width="25%">最終更新日</th>
                                                <th class="table_slug" width="15%">スラッグ</th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($draft_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">{{ $item->title }}</td>
                                                    <td class="table_contributor">{{ $item['user']['first_name'] }}</td>
                                                    <td class="table_day">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td class="table_slug">{{ $item->slack }}</td>
                                                    <td class="table_edit">
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
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">タイトル</th>
                                                <th class="table_contributor" width="15%">投稿者</th>
                                                <th class="table_day" width="25%">最終更新日</th>
                                                <th class="table_slug" width="15%">スラッグ</th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">{{ $item->title }}</td>
                                                    <td class="table_contributor">{{ $item['user']['first_name'] }}</td>
                                                    <td class="table_day">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</td>
                                                    <td class="table_slug">{{ $item->slack }}</td>
                                                    <td class="table_edit">
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
