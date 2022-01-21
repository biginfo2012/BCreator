<x-admin-layout>
    <div class="side-app dash_min-hei" id="payments">
        <div class="page-header flex fx-wrp">
            <h4 class="page-title">支払い管理</h4>
            <div class="page-options d-flex">
                <div class="form-group mb-0">
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <span class="col-auto">
                            <button class="btn btn-secondary btn_search" type="button"><i class="fe fe-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="payAllTable" class="table table-striped wrp_ad_table" style="width:100%; background: white">
                    <thead>
                    <tr>
                        <th class="wd-10p">ID</th>
                        <th class="wd-10p">姓</th>
                        <th class="wd-10p">名</th>
                        <th class="wd-15p">メール</th>
                        <th class="wd-15p">日付</th>
                        <th class="wd-25p">金額</th>
                        <th class="wd-15p">ステータス</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $id => $item)
                        <tr>
                            <td>
                                <span>{{ $id+1 }}</span>
                            </td>
                            <td><span>{{ $item['user']['first_name'] }}</span></td>
                            <td><span>{{ $item['user']['last_name'] }}</span></td>
                            <td><span>{{ $item['user']['email'] }}</span></td>
                            <td><span>{{ date('Y-m-d', strtotime($item->created_at)) }}</span></td>
                            <td><span>{{ '¥' . number_format($item->amount) }}</span></td>
                            <td>
                                <span class="{{ $item->status == 'succeeded' ? 'success' : 'fail'}}">{{ $item->status == 'succeeded' ? '成功' : '失敗'}}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#payAllTable').DataTable({
                "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
                "searching": true,
                "pageLength": 20,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "現在ありません",
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
                        "next":       "次へ",
                        "previous":   "前へ"
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

            $('.btn_search').click(function () {
                let txt = $(this).parent().prev().find('input').val();
                $(this).parent().parent().parent().parent().parent().next().find('table').DataTable().search(txt).draw();
            })

        })

    </script>
</x-admin-layout>
