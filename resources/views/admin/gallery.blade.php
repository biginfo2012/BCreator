<x-admin-layout>
    <div class="side-app dash_min-hei" id="gallery">
        <div class="page-header flex fx-wrp">
            <h1 class="page-title">メディアライブラリ</h1>
            <div class="page-subtitle">1 - 10 of 234</div>
            <div class="page-options d-flex">
                <div class="form-group mb-0">
                    <div class="row gutters-xs">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <span class="col-auto">
                                            <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                @foreach($media as $id => $item)
                    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{asset($item->image)}}" data-src="{{asset($item->image)}}" data-sub-html="<h4>Gallery Image {{$id+1}}</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>" >
                        <a href="">
                            <img class="img-responsive" src="{{asset($item->image)}}" alt="Thumb-1">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
{{--        <div class="pagination-wrapper">--}}
{{--            <nav aria-label="Page navigation">--}}
{{--                <ul class="pagination mb-0">--}}
{{--                    <li class="page-item active">--}}
{{--                        <a class="page-link" href="#">1</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#">2</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#">3</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#">4</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#">5</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a aria-label="Next" class="page-link" href="#"><i class="fa fa-angle-right"></i></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </div>
</x-admin-layout>
