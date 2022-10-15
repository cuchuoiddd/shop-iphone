<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            @forelse($products as $item)
                <div class="col-3">
                    <div class="box pointer addOrder" data-item="{{$item}}">
                        <img class="box-img-top" src="/images/product/{{$item->thumbnail}}" alt="Ảnh sản phẩm" style="height: 300px;object-fit: contain">
                        <div class="box-body" style="min-height: 130px;">
                            <h4 class="box-title b-0 px-0">{{$item->name}} ({{$item->rate}} <i class="fa fa-star text-yellow"></i>)</h4>
                            <p>{{$item->description}}</p>
                            <p><small>10 lần đổi</small></p>
                        </div>
                    </div>
                </div>
                @empty
            @endforelse
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix custom-pagination">
        {{$products->links()}}
    </div>
</div>