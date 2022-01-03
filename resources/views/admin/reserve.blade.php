<x-admin-layout>
    <div class="side-app dash_min-hei" id="master_reserve">
        <div class="page-header">
            <h4 class="page-title">カウンセリング予約</h4>
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
                                        <li class=""><a href="#reser-all" class="active show" data-toggle="tab">すべて ({{ count($all_data) }})</a></li>
                                        <li><a href="#reser-wip" data-toggle="tab" class="">未対応 ({{ count($open_data) }})</a></li>
                                        <li><a href="#reser-comp" data-toggle="tab">完了 ({{ count($draft_data) }})</a></li>
                                        <li><a href="#reser-trash" data-toggle="tab">削除 ({{ count($trash_data) }})</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="reser-all">
                                        <table id="resAllTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-10p">予約日</th>
                                                <th class="wd-10p">姓</th>
                                                <th class="wd-10p">名</th>
                                                <th class="wd-10p">メールアドレス</th>
                                                <th class="wd-15p">電話番号</th>
                                                <th class="wd-15p">第一希望</th>
                                                <th class="wd-15p">第二希望</th>
                                                <th class="wd-15p">ステータス</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="mt-2">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['number'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['first_date'] . ' ' . $item['first_time'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['second_date'] . ' ' . $item['second_time'] }}</span></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select reply_status">
                                                                <option value="0" {{ $item['status'] == 0 ? 'selected' : '' }}>未対応</option>
                                                                <option value="1" {{ $item['status'] == 1 ? 'selected' : '' }}>完了</option>
                                                                <option value="2" {{ $item['status'] == 2 ? 'selected' : '' }}>削除</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary change_status" data-id="{{$item->id}}" disabled>OK</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="reser-wip">
                                        <table id="resOpenTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-10p">予約日</th>
                                                <th class="wd-10p">姓</th>
                                                <th class="wd-10p">名</th>
                                                <th class="wd-10p">メールアドレス</th>
                                                <th class="wd-15p">電話番号</th>
                                                <th class="wd-15p">第一希望</th>
                                                <th class="wd-15p">第二希望</th>
                                                <th class="wd-15p">ステータス</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($open_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="mt-2">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['number'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['first_date'] . ' ' . $item['first_time'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['second_date'] . ' ' . $item['second_time'] }}</span></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select reply_status">
                                                                <option value="0" {{ $item['status'] == 0 ? 'selected' : '' }}>未対応</option>
                                                                <option value="1" {{ $item['status'] == 1 ? 'selected' : '' }}>完了</option>
                                                                <option value="2" {{ $item['status'] == 2 ? 'selected' : '' }}>削除</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary change_status" data-id="{{$item->id}}" disabled>OK</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="reser-comp">
                                        <table id="resDraftTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-10p">予約日</th>
                                                <th class="wd-10p">姓</th>
                                                <th class="wd-10p">名</th>
                                                <th class="wd-10p">メールアドレス</th>
                                                <th class="wd-15p">電話番号</th>
                                                <th class="wd-15p">第一希望</th>
                                                <th class="wd-15p">第二希望</th>
                                                <th class="wd-15p">ステータス</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($draft_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="mt-2">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['number'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['first_date'] . ' ' . $item['first_time'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['second_date'] . ' ' . $item['second_time'] }}</span></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select reply_status">
                                                                <option value="0" {{ $item['status'] == 0 ? 'selected' : '' }}>未対応</option>
                                                                <option value="1" {{ $item['status'] == 1 ? 'selected' : '' }}>完了</option>
                                                                <option value="2" {{ $item['status'] == 2 ? 'selected' : '' }}>削除</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary change_status" data-id="{{$item->id}}" disabled>OK</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="reser-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary empty" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <table id="resTrashTable" class="table table-striped wrp_ad_table" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th class="wd-10p">予約日</th>
                                                <th class="wd-10p">姓</th>
                                                <th class="wd-10p">名</th>
                                                <th class="wd-10p">メールアドレス</th>
                                                <th class="wd-15p">電話番号</th>
                                                <th class="wd-15p">第一希望</th>
                                                <th class="wd-15p">第二希望</th>
                                                <th class="wd-15p">ステータス</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trash_data as $item)
                                                <tr>
                                                    <td>
                                                        <span class="mt-2">{{ date('Y-m-d', strtotime($item->created_at)) }}</span>
                                                    </td>
                                                    <td><span class="mt-2">{{ $item['first_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['last_name'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['email'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['number'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['first_date'] . ' ' . $item['first_time'] }}</span></td>
                                                    <td><span class="mt-2">{{ $item['second_date'] . ' ' . $item['second_time'] }}</span></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select reply_status">
                                                                <option value="0" {{ $item['status'] == 0 ? 'selected' : '' }}>未対応</option>
                                                                <option value="1" {{ $item['status'] == 1 ? 'selected' : '' }}>完了</option>
                                                                <option value="2" {{ $item['status'] == 2 ? 'selected' : '' }}>削除</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary change_status" data-id="{{$item->id}}" disabled>OK</button>
                                                            </div>
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
            drawDataTable('resAllTable');
            drawDataTable('resOpenTable');
            drawDataTable('resDraftTable');
            drawDataTable('resTrashTable');

            $('.empty').click(function () {
                emptyTrash(empty_trash_reserve);
            })

            $(document).on('change', '.reply_status', function () {
                console.log($(this).next().find('button'))
                $(this).next().find('button')[0].disabled = false;
            })
            $(document).on('click', '.change_status', function () {
                let id = $(this).data('id');
                let msg = 'ステータスを変更しました。'
                let status = $(this).parent().parent().find('.reply_status option:selected').val();
                console.log(status)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
                $.ajax({
                    url: change_status_reserve,
                    type:'post',
                    data: {
                        id : id,
                        status : status
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

            })
        })

    </script>
</x-admin-layout>
