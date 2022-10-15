<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>TÊN CÔNG TY</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>EMAIL</th>
                    <th>NGÀY CẬP NHẬT</th>
                    @if(empty(\Illuminate\Support\Facades\Auth::user()->company_code))
                        <th style="width: 100px">
                            <span class="addCompany pointer"><i class="fa fa-plus"></i> THÊM</span>
                        </th>
                    @else
                        <th style="width: 100px">THAO TÁC</th>
                    @endif
                </tr>
                @forelse($company as $key => $item)
                    <tr>
                        <td>{{$key + 1}}.</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <span class="pointer edit mr-1" data-item="{{$item}}"><i class="fa fa-edit fa-15x" aria-hidden="true"></i></span>
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
        {{$company->links()}}
    </div>
</div>