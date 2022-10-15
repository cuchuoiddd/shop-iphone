<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>

                <tr>
                    <th style="width: 10px">#</th>
                    <th>NGƯỜI ĐỀ XUẤT</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>SAO</th>
                    <th>HÌNH ẢNH</th>
                    <th>MÔ TẢ</th>
                    <th>DUYỆT</th>
                    {{--<th style="width: 100px">--}}
                        {{--<span class="addCategory  pointer"><i class="fa fa-plus"></i> THÊM</span>--}}
                    {{--</th>--}}
                </tr>
                @forelse($orders as $key => $item)
                    <tr>
                        <td>{{$key + 1}}.</td>
                        <td>{{@$item->user->full_name}}</td>
                        <td>{{@$item->product->name}}</td>
                        <td>{{$item->rate}}</td>
                        <td><img src="/images/product/{{@$item->product->thumbnail}}" alt="ảnh sản phẩm" style="width:50px; height:50px;"> </td>
                        <td>{{@$item->product->description}}</td>
                        <td>
                            <div class="col-sm-2 col-6 text-center align-self-center">
                                <button type="button" class="btn btn-sm btn-toggle btn-primary btnStatus {{$item->status == 1 ? 'active' : ''}}" data-id="{{$item->id}}" data-toggle="button" aria-pressed="false">
                                    <span class="handle"></span>
                                </button>
                            </div>
                        </td>
                        {{--<td>--}}
                            {{--<span class="pointer edit mr-1" data-item="{{$item}}"><i class="fa fa-edit fa-15x" aria-hidden="true"></i></span>--}}
                            {{--<span class="pointer delete" data-id="{{$item->id}}"><i class="fa fa-trash-o fa-15x" aria-hidden="true"></i></span>--}}
                        {{--</td>--}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">Không có bản ghi nào !</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    {{--<div class="box-footer clearfix custom-pagination">--}}
    {{--{{$company->links()}}--}}
    {{--</div>--}}
</div>