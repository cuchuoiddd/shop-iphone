<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th>TÊN CHU KỲ</th>
                    <th>NGÀY BẮT ĐẦU</th>
                    <th>NGÀY KẾT THÚC</th>
                    <th style="width: 100px">
                        <span class="addTime  pointer"><i class="fa fa-plus"></i> THÊM</span>
                    </th>
                </tr>
                @forelse($docs as $key => $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>
                            <span class="pointer edit mr-1" data-item="{{$item}}">
                                <i class="fa fa-edit fa-15x" aria-hidden="true"></i>
                            </span>
                            <span class="pointer delete" data-id="{{$item->id}}">
                                <i class="fa fa-trash-o fa-15x" aria-hidden="true"></i>
                            </span>
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
    {{--<div class="box-footer clearfix custom-pagination">--}}
        {{--{{$docs->links()}}--}}
    {{--</div>--}}
</div>