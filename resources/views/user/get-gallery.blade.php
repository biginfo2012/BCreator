<div class="page-header flex fx-wrp">
    <h1 class="page-title">メディアライブラリ</h1>
    <div class="page-subtitle">{{$page_start}} {{$page_end}} of {{$count}}</div>
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
                    <img class="img-responsive" src="{{asset($item->image)}}" alt="Thumb-{{$item->id}}">
                </a>
            </li>
        @endforeach
    </ul>
</div>
<div class="pagination-wrapper">
    <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
            @for($i = 1; $i <= $page; $i++)
                <li class="page-item {{$i == $current_page ? 'active' : 'item'}}" data-id="{{$i}}">
                    <a class="page-link">{{$i}}</a>
                </li>
            @endfor
            <li class="page-item page-next">
                <a aria-label="Next" class="page-link"><i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </nav>
</div>
