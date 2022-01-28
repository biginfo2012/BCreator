<x-admin-layout>
    <style>
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before{
            display: none !important;
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after{
            display: none !important;
        }
        .table td{
            padding: 0;
        }
        .table thead th, .text-wrap table thead th{
            border-bottom: 0;
        }
    </style>
    <div class="side-app dash_min-hei" id="edit-test">
        <div class="page-header">
            <h4 class="page-title">テスト</h4>
            <a href="{{route('archive-test')}}" class="btn btn-primary" target="_blank">表示する</a>
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
                                        <li class=""><a href="#test-all" class="active show" data-toggle="tab">すべて ({{ count($all_data) }})</a></li>
                                        <li><a href="#test-open" data-toggle="tab" class="">公開済み ({{ count($open_data) }})</a></li>
                                        <li><a href="#test-draft" data-toggle="tab">下書き ({{ count($draft_data) }})</a></li>
                                        <li><a href="#test-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="test-all">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="btn_change">投稿順</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#" class="dropdown_item" data-id="1">投稿順</a></li>
                                                    <li><a href="#" class="dropdown_item" data-id="0">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <table id="testAllTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="table_contributor" width="15%"><span class="mt-2">投稿者</span></th>
                                                <th class="table_day" width="25%"><span class="mt-2">最終更新日</span></th>
                                                <th class="table_slug" width="15%"><span class="mt-2">スラッグ</span></th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">
                                                        <span class="parent">{{ $item->curriculum->title . (isset($item->lesson) ? ('-' . $item->lesson->title) : '') }}</span>
                                                        <span>{{ $item->title }}</span>
                                                        <span class="draft">{{ isset($item->deleted_at) ? '-削除' : ($item->public_status == 0 ? '-下書き' : '-公開済み') }}</span>
                                                    </td>
                                                    <td class="table_contributor"><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td class="table_slug"><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td class="table_edit">
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-test', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="test-open">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="btn_change">投稿順</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#" class="dropdown_item" data-id="1">投稿順</a></li>
                                                    <li><a href="#" class="dropdown_item" data-id="0">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <table id="testOpenTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="table_contributor" width="15%"><span class="mt-2">投稿者</span></th>
                                                <th class="table_day" width="25%"><span class="mt-2">最終更新日</span></th>
                                                <th class="table_slug" width="15%"><span class="mt-2">スラッグ</span></th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($open_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">
                                                        <span class="parent">{{ $item->curriculum->title . (isset($item->lesson) ? ('-' . $item->lesson->title) : '') }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td class="table_contributor"><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td class="table_slug"><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td class="table_edit">
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-test', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="test-draft">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="btn_change">投稿順</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#" class="dropdown_item" data-id="1">投稿順</a></li>
                                                    <li><a href="#" class="dropdown_item" data-id="0">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <table id="testDraftTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="table_contributor" width="15%"><span class="mt-2">投稿者</span></th>
                                                <th class="table_day" width="25%"><span class="mt-2">最終更新日</span></th>
                                                <th class="table_slug" width="15%"><span class="mt-2">スラッグ</span></th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($draft_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">
                                                        <span class="parent">{{ $item->curriculum->title . (isset($item->lesson) ? ('-' . $item->lesson->title) : '') }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td class="table_contributor"><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td class="table_slug"><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td class="table_edit">
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-test', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="test-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="testTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead class="table_head">
                                            <tr class="w-100 d-flex">
                                                <th class="table_title" width="35%">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="table_contributor" width="15%"><span class="mt-2">投稿者</span></th>
                                                <th class="table_day" width="25%"><span class="mt-2">最終更新日</span></th>
                                                <th class="table_slug" width="15%"><span class="mt-2">スラッグ</span></th>
                                                <th class="table_edit" width="10%"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $item)
                                                <tr class="table_item">
                                                    <td class="table_title">
                                                        <span class="parent">{{ $item->curriculum->title . (isset($item->lesson) ? ('-' . $item->lesson->title) : '') }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td class="table_contributor"><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td class="table_day"><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td class="table_slug"><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td class="table_edit">
                                                        <div class="flex fx-bet fx-wrp mt-2">
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
            drawDataTableWithOrder('testAllTable');
            drawDataTableWithOrder('testOpenTable');
            drawDataTableWithOrder('testDraftTable');
            drawDataTable('testTrashTable');

            $('.del').click(function () {
                let id = $(this).data('id');
                let msg = "削除しました。"
                actionId(id, delete_test, msg);
            })

            $('.empty').click(function () {
                emptyTrash(empty_trash_test);
            })

            $('.restore').click(function () {
                let id = $(this).data('id');
                let msg = "復元しました。"
                actionId(id, restore_test, msg);
            })

            $('.complete-del').click(function () {
                let id = $(this).data('id');
                let msg = "完全削除しました。"
                actionId(id, complete_delete_test, msg);
            })

            $('.dropdown_item').click(function () {
                let txt = $(this).text()
                let id = $(this).data('id');
                $(this).parent().parent().prev().find('span.btn_change').text(txt);
                $(this).parent().parent().parent().parent().next().find('table').DataTable().order([id, 'asc']).draw();
            })
        })

    </script>
</x-admin-layout>
