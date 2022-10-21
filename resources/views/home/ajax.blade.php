@forelse($products as $item)
<div class="col-6 col-md-4">
    <div class="item">
        <div class="image">
            <img src="{{url($item->thumbnail)}}" width="126" height="126" alt="">
        </div>
        <div class="name fz-14 font-medium">{{$item->name}}</div>
        <div class="dung-luong d-flex">
            @if($item->sim_free)
                <span class="sim-free fz-12">Simfree未開封</span>
            @endif
            <span class="price fz-12">{{$item->capacity->capacity}}</span>
        </div>
        @if(count($item->productOption))
            <div class="d-flex new-price">
                <div class="fz-14 text">新品</div>
                <div class="fz-16 font-bold" style="color: #EB5757">
                    <span class="number">{{number_format(@$item->productOption[0]->new_price)}}</span>円
                </div>
            </div>
            <div class="d-flex old-price">
                <div class="fz-14 text">中古</div>
                <div class="fz-16 font-bold" style="color: #EB5757">
                    <span class="number">{{number_format(@$item->productOption[0]->old_price)}}</span>円
                </div>

            </div>
            <div class="color text-center">
                <span class="font-medium" style="color: #4f4f4f">Màu</span>

                    <span>{{@$item->productOption[0]->color->color_name}}</span>
            </div>
        @endif
        <div class="color-code">
            <ul class="list-group list-group-horizontal justify-content-center align-items-center">
                @forelse($item->productOption as $key=> $item1)
                    <li class="list-group-item d-flex {{$key == 0 ? "active" : ''}}">
                        <button class="color-button" style="background-color: {{$item1->color->color_code}}" data-item="{{$item1}}"></button>
                    </li>
                @empty
                @endforelse


                {{--<li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>--}}
                {{--<li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>--}}
                {{--<li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>--}}
                {{--<li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>--}}
            </ul>
        </div>
    </div>
</div>
    @empty
    <p>Không có sản phẩm nào !</p>
@endforelse