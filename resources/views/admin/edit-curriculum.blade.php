<x-admin-layout>
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
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item['user']['first_name'] }}</td>
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <a class="del" data-id="{{ $item->id }}">削除</a>
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
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <a class="del" data-id="{{ $item->id }}">削除</a>
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
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <a class="del" data-id="{{ $item->id }}">削除</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="cur-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary" href="#">ゴミ箱を空にする</a>
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
                                                    <td>{{ date('Y年m月d日 H:i', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->slack }}</td>
                                                    <td>
                                                        <div class="flex fx-bet fx-wrp">
                                                            <a href="{{ route('master.modify-curriculum', $item->id) }}">編集</a>
                                                            <a class="del" data-id="{{ $item->id }}">削除</a>
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
            $('#curAllTable').DataTable({
                "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
                "searching": false,
                "pageLength": 5,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "現示可能な資料がありません。",
                    "info":           "_TOTAL_個の資料の中で_START_~_END_が現示されます。",
                    "infoEmpty":      "0~0の0を表示。",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     " _MENU_ ",
                    "loadingRecords": "ロード中...",
                    "processing":     "処理中...",
                    "search":         "検索:",
                    "zeroRecords":    "一致する検索資料がありません。",
                    "paginate": {
                        "first":      "初めに",
                        "last":       "最後",
                        "next":       "次の",
                        "previous":   "以前"
                    },
                    "aria": {
                        "sortAscending":  ": ",
                        "sortDescending": ": "
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": 2 }
                    ]
                },
                "fixedColumns": true,
                "aaSorting": []
            });
            $('#curOpenTable').DataTable({
                "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
                "searching": false,
                "pageLength": 5,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "現示可能な資料がありません。",
                    "info":           "_TOTAL_個の資料の中で_START_~_END_が現示されます。",
                    "infoEmpty":      "0~0の0を表示。",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     " _MENU_ ",
                    "loadingRecords": "ロード中...",
                    "processing":     "処理中...",
                    "search":         "検索:",
                    "zeroRecords":    "一致する検索資料がありません。",
                    "paginate": {
                        "first":      "初めに",
                        "last":       "最後",
                        "next":       "次の",
                        "previous":   "以前"
                    },
                    "aria": {
                        "sortAscending":  ": ",
                        "sortDescending": ": "
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": 2 }
                    ]
                },
                "fixedColumns": true,
                "aaSorting": []
            });
            $('#curDraftTable').DataTable({
                "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
                "searching": false,
                "pageLength": 5,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "現示可能な資料がありません。",
                    "info":           "_TOTAL_個の資料の中で_START_~_END_が現示されます。",
                    "infoEmpty":      "0~0の0を表示。",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     " _MENU_ ",
                    "loadingRecords": "ロード中...",
                    "processing":     "処理中...",
                    "search":         "検索:",
                    "zeroRecords":    "一致する検索資料がありません。",
                    "paginate": {
                        "first":      "初めに",
                        "last":       "最後",
                        "next":       "次の",
                        "previous":   "以前"
                    },
                    "aria": {
                        "sortAscending":  ": ",
                        "sortDescending": ": "
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": 2 }
                    ]
                },
                "fixedColumns": true,
                "aaSorting": []
            });
            $('#curTrashTable').DataTable({
                "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
                "searching": false,
                "pageLength": 5,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "現示可能な資料がありません。",
                    "info":           "_TOTAL_個の資料の中で_START_~_END_が現示されます。",
                    "infoEmpty":      "0~0の0を表示。",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     " _MENU_ ",
                    "loadingRecords": "ロード中...",
                    "processing":     "処理中...",
                    "search":         "検索:",
                    "zeroRecords":    "一致する検索資料がありません。",
                    "paginate": {
                        "first":      "初めに",
                        "last":       "最後",
                        "next":       "次の",
                        "previous":   "以前"
                    },
                    "aria": {
                        "sortAscending":  ": ",
                        "sortDescending": ": "
                    },
                    "columnDefs": [
                        { "orderable": false, "targets": 2 }
                    ]
                },
                "fixedColumns": true,
                "aaSorting": []
            });

            $('.del').click(function () {
                let id = $(this).attr('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
                $.ajax({
                    url: delete_curriculum,
                    type:'post',
                    data: {
                        id : id
                    },
                    // beforeSend: function(){
                    //     $("#global-loader").fadeIn("slow")
                    // },
                    // complete: function(){
                    //     $("#global-loader").fadeOut("slow")
                    // },
                    success: function (response) {
                        if(response.status){
                            $('#delCompleteModal').modal('show');
                        }
                        else{
                            toastr.warning("삭제할수 없습니다.", "삭제실패", {
                                positionClass: "toast-top-right",
                                timeOut: 5e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1
                            });
                        }
                    },
                    error: function () {

                    }
                });

            })
        })

    </script>
</x-admin-layout>
