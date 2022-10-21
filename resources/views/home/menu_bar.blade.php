<div class="offcanvas-body fz-18">
    <div class="list-group">
        @forelse($menu as $item)
            <div class="list-group-item list-group-item-action position-relative d-flex align-items-center pointer parent">
                <span class="fz-18 font-medium">
                    {{$item->name}}
                    @if(isset($item->children))
                        <img src="{{url('images/demo/right1.png')}}" alt="" class="right" style="display: block">
                        <img src="{{url('images/demo/top.png')}}" alt="" class="top" style="display: none">
                    @endif
                </span>
                <div class="list-group" style="display: none;">
                    @if(isset($item->children))
                        @forelse($item->children as $item1)
                            <a class="list-group-item list-group-item-action bold child" data-id="{{$item1->id}}">{{$item1->name}}</a>
                            @empty
                        @endforelse
                    @endif
                </div>
            </div>
            @empty
        @endforelse
    </div>
</div>