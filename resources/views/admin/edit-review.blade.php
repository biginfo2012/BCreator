<x-admin-layout>
    <div class="side-app dash_min-hei" id="edit-review">
        <div class="page-header">
            <h4 class="page-title">復習</h4>
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
                                        <li class=""><a href="#rev-all" class="active show" data-toggle="tab">すべて (3)</a></li>
                                        <li><a href="#rev-open" data-toggle="tab" class="">公開済み (2)</a></li>
                                        <li><a href="#rev-draft" data-toggle="tab">下書き (1)</a></li>
                                        <li><a href="#rev-trash" data-toggle="tab">削除 (1)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="rev-all">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    投稿順 <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#">投稿順</a></li>
                                                    <li><a href="#">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wrp_ad_table">
                                            <div class="table_head">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>投稿者</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>最終更新日</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>スラッグ</span>
                                                </div>
                                                <div class="table_edit"></div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名-レッスン名</span>
                                                    <span>テストテストテスト</span>
                                                    <span class="draft">-下書き</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名</span>
                                                    <span>テストテストテスト</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination-wrapper">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Next" class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="rev-open">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    投稿順 <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#">投稿順</a></li>
                                                    <li><a href="#">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wrp_ad_table">
                                            <div class="table_head">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>投稿者</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>最終更新日</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>スラッグ</span>
                                                </div>
                                                <div class="table_edit"></div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名</span>
                                                    <span>テストテストテスト</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名</span>
                                                    <span>テストテストテスト</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination-wrapper">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Next" class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="rev-draft">
                                        <div class="sort_curriculum">
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    投稿順 <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <li><a href="#">投稿順</a></li>
                                                    <li><a href="#">カリキュラム順</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wrp_ad_table">
                                            <div class="table_head">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム-レッスン</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>投稿者</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>最終更新日</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>スラッグ</span>
                                                </div>
                                                <div class="table_edit"></div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名</span>
                                                    <span>テストテストテスト</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名</span>
                                                    <span>テストテストテスト</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet">
                                                        <a href="#">編集</a>
                                                        <a href="#">削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination-wrapper">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Next" class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="rev-trash">
                                        <div class="trash_empty">
                                            <a class="btn btn-primary" href="#">ゴミ箱を空にする</a>
                                        </div>
                                        <div class="wrp_ad_table">
                                            <div class="table_head">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム名-レッスン</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>投稿者</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>最終更新日</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>スラッグ</span>
                                                </div>
                                                <div class="table_edit"></div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet fx-wrp">
                                                        <a href="#">復元</a>
                                                        <a href="#">完全削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet fx-wrp">
                                                        <a href="#">復元</a>
                                                        <a href="#">完全削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_item">
                                                <div class="table_title">
                                                    <span class="parent">カリキュラム</span>
                                                    <span>タイトル</span>
                                                </div>
                                                <div class="table_contributor">
                                                    <span>平沢</span>
                                                </div>
                                                <div class="table_day">
                                                    <span>2021年12月1日 3:10 PM</span>
                                                </div>
                                                <div class="table_slug">
                                                    <span>test</span>
                                                </div>
                                                <div class="table_edit">
                                                    <div class="flex fx-bet fx-wrp">
                                                        <a href="#">復元</a>
                                                        <a href="#">完全削除</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination-wrapper">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a aria-label="Next" class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
