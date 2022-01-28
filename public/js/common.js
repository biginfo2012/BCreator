$(document).ready(function () {
    getNotice();
    $('#notice_bell').click(function () {
        checkNotice();

    })
})
function saveForm(index, url, reload=false) {
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
                console.log(response);
                if(response.status){
                    if($('[name=preview]').val() == '1'){
                        window.open(preview_url, '_blank');
                    }
                    else{
                        $.growl.notice({
                            title: "成功",
                            message: "保存しました"
                        });

                        if(reload){
                            window.location.reload();
                        }
                    }

                }
                else{
                    $.growl.error({
                        title: "失敗",
                        message: "保存失敗しました"
                    });
                }


            },
        });
    }
}

function drawDataTable(index) {
    let id = '#' + index;
    $(id).DataTable({
        "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
        "searching": false,
        "ordering": false,
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
}
function drawDataTableWithOrder(index) {
    let id = '#' + index;
    $(id).DataTable({
        "dom": '<"d-none"i>rt<"d-none"fl><""p><"clear">',
        "searching": false,
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
            if($('#total_notice_count').val() != 0){
                $('#notice_bell').attr('data-after', $('#total_notice_count').val());
            }
            else{
                $('#notice_bell').removeClass('notice_bell');
            }

        },
        error: function () {

        }
    });
}
function checkNotice() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: check_notice,
        type:'post',
        data: {
            notice_ids : $('#notice_ids').val(),
        },
        success: function (response) {
        },
        error: function () {

        }
    });
}

function searchData(type){
    let keyword = $('#keyword').val();
    console.log(type)
    if(keyword == ''){
        $.growl.warning({
            title: "警告",
            message: "検索したい値を入力してください"
        });
        return
    }
    let curriculum_id = '';
    if(type == 'lesson'){
        curriculum_id = $('#search_btn').data('id');
    }
    $('#dataArea').empty();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: search_data,
        type:'post',
        data: {
            type : type,
            keyword : keyword,
            curriculum_id : curriculum_id
        },
        success: function (response) {
            $('#dataArea').html(response)
        },
        error: function () {

        }
    })
}
