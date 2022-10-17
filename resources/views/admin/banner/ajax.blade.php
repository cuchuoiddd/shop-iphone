<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>

                <tr>
                    <th style="width: 10px">#</th>
                    <th>Image</th>
                    <th style="width: 100px">
                        <span class="addCategory  pointer"><i class="fa fa-plus"></i> THÊM</span>
                    </th>
                </tr>
                @forelse($banners as $key => $item)
                    <tr>
                        <td>{{$key + 1}}.</td>
                        <td><img src="{{$item->image}}" alt="ảnh banner" style="width:50px; height:50px;"> </td>
                        <td>
                            <span class="pointer delete" data-id="{{$item->id}}"><i class="fa fa-trash-o fa-15x" aria-hidden="true"></i></span>
                        </td>
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
    <div class="box-footer clearfix custom-pagination">
        {{--{{$products->links()}}--}}
    </div>
</div>