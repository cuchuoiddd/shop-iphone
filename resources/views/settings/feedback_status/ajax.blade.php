<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th>TIÊU CHÍ GHI NHẬN</th>
                    <th>SỐ SAO</th>
                    <th>LOẠI PHẢN HỒI</th>
                    <th>PHÒNG BAN</th>
                    <th>MÔ TẢ</th>
                    <th>THỨ TỰ SẮP XẾP</th>
                    <th style="width: 100px">
                        <span class="addFeedback  pointer"><i class="fa fa-plus"></i> THÊM</span>
                    </th>
                </tr>
                @forelse($docs as $key => $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->rate}} <span style="color: rgb(255, 170, 0);font-size: 17px;">&#9733;</span> </td>
                        <td>{{$item->type == 0 ? 'Checkin' : ($item->type == 1 ? 'Ghi nhận' : 'Phản hồi khác')}}</td>
                        <td>{{@$item->department->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->position}}</td>
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
    <div class="box-footer clearfix custom-pagination">
        {{$docs->links()}}
    </div>
</div>