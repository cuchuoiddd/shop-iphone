<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th>HỌ VÀ TÊN</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>PHÒNG BAN</th>
                    <th>VỊ TRÍ CÔNG VIỆC</th>
                    <th>NGÀY TẠO</th>
                    <th>QUYỀN</th>
                    <th>KÍCH HOẠT</th>
                    <th style="width: 100px">
                        <span class="addUser pointer"><i class="fa fa-plus"></i> THÊM</span>
                    </th>
                </tr>
                @forelse($docs as $key => $item)
                    <tr>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{@$item->department->name}}</td>
                        <td>{{@$item->office->name}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->role_id == 1 ? 'Admin' : 'Nhân viên'}}</td>
                        <td>
                            <div class="col-sm-2 col-6 text-center align-self-center">
                                <button type="button" class="btn btn-sm btn-toggle btn-primary btnStatus {{$item->status == 1 ? 'active' : ''}}" data-id="{{$item->id}}" data-toggle="button" aria-pressed="false">
                                    <span class="handle"></span>
                                </button>
                            </div>
                        </td>
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