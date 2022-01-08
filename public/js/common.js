$(document).ready(function () {
    getNotice();
})
function saveForm(index, url) {
    let id = '#' + index;
    if($(id).valid()){
        var paramObj = new FormData($(id)[0]);
        $.ajax({
            url: url,
            type: 'post',
            data: paramObj,
            contentType: false,
            processData: false,
            success: function(response){
                $.growl.notice({
                    title: "成功",
                    message: "保存しました"
                });
            },
        });
    }
}

function drawDataTable(index) {
    let id = '#' + index;
    $(id).DataTable({
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
}

function actionId(id, url, msg) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: url,
        type:'post',
        data: {
            id : id
        },
        success: function (response) {
            if(response.status){
                $.growl.notice({
                    title: "成功",
                    message: msg
                });
                window.location.reload();
            }
            else{

            }
        },
        error: function () {

        }
    });

}
function actionIdWithout(id, url, msg) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: url,
        type:'post',
        data: {
            id : id
        },
        success: function (response) {
            if(response.status){
                $.growl.notice({
                    title: "成功",
                    message: msg
                });
            }
            else{

            }
        },
        error: function () {

        }
    });

}


function emptyTrash(url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: url,
        type:'post',
        success: function (response) {
            if(response.status){
                $.growl.notice({
                    title: "成功",
                    message: "ゴミ箱を空にしました。"
                });
                window.location.reload();
            }
            else{

            }
        },
        error: function () {

        }
    });

}

function getNotice() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: get_notice,
        type:'post',
        success: function (response) {
            $('#notice').html(response)
            $('#notice_bell').attr('data-after', $('#total_notice_count').val());
        },
        error: function () {

        }
    });

}
