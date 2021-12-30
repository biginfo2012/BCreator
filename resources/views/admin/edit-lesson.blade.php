<x-admin-layout>
    <div class="side-app dash_min-hei" id="edit-lesson">
        <div class="page-header">
            <h4 class="page-title">レッスン</h4>
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
                                        <li class=""><a href="#les-all" class="active show" data-toggle="tab">すべて ({{ count($all_data) }})</a></li>
                                        <li><a href="#les-open" data-toggle="tab" class="">公開済み ({{ count($open_data) }})</a></li>
                                        <li><a href="#les-draft" data-toggle="tab">下書き ({{ count($draft_data) }})</a></li>
                                        <li><a href="#les-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="les-all">
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
                                        <table id="lesAllTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </th>
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
                                                        <span class="parent">{{ $item->curriculum->title }}</span>
                                                        <span>{{ $item->title }}</span>
                                                        <span class="draft">{{ isset($item->deleted_at) ? '-削除' : ($item->public_status == 0 ? '-公開済み' : '-下書き') }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td>
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-lesson', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="les-open">
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
                                        <table id="lesOpenTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($open_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="parent">{{ $item->curriculum->title }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td>
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-lesson', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="les-draft">
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
                                        <table id="lesDraftTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($draft_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="parent">{{ $item->curriculum->title }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td>
                                                        <div class="mt-2 flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-lesson', $item->id) }}">編集</a>
                                                            <label class="del mb-0" data-id="{{ $item->id }}">削除</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="les-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="lesTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-35p">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </th>
                                                <th class="wd-15p">投稿者</th>
                                                <th class="wd-25p">最終更新日</th>
                                                <th class="wd-15p">スラッグ</th>
                                                <th class="wd-10p"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="parent">{{ $item->curriculum->title }}</span>
                                                        <span>{{ $item->title }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['user']['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ date('Y年m月d日 H:i', strtotime($item->updated_at)) }}</span></td>
                                                    <td><span class="mt-2">{{ $item->slack }}</span></td>
                                                    <td>
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
            drawDataTable('lesAllTable');
            drawDataTable('lesOpenTable');
            drawDataTable('lesDraftTable');
            drawDataTable('lesTrashTable');

            $('.del').click(function () {
                let id = $(this).data('id');
                let msg = "削除しました。"
                actionId(id, delete_lesson, msg);
            })

            $('.empty').click(function () {
                emptyTrash(empty_trash_lesson);
            })

            $('.restore').click(function () {
                let id = $(this).data('id');
                let msg = "復元しました。"
                actionId(id, restore_lesson, msg);
            })

            $('.complete-del').click(function () {
                let id = $(this).data('id');
                let msg = "完全削除しました。"
                actionId(id, complete_delete_lesson, msg);
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