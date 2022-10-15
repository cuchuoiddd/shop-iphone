<!-- /.box-header -->
<div class="box-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <th>TÊN MỤC TIÊU</th>
                <th>NGƯỜI PHỤ TRÁCH</th>
                <th>KẾT QUẢ CHÍNH</th>
                <th>TIẾN ĐỘ</th>
                <th>THAY ĐỔI</th>
                <th>MỨC ĐỘ TỰ TIN</th>
                <th>CHECK-IN GẦN NHẤT</th>
                <th>CHECK-IN TIẾP THEO</th>
                <th>TRẠNG THÁI</th>
                <th style="width: 100px">THAO TÁC</th>
            </tr>
            @forelse($okrs as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{@$item->user->full_name}}</td>
                    <td>{{count($item->target)}} kết quả</td>
                    <td>{{$item->tien_do}}%</td>
                    <td>{{$item->thay_doi}}%</td>
                    <td>{{$item->status_target==2?"Tốt" :($item->status_target==1 ? "Ổn" : "Không ổn lắm")}}</td>
                    <td>{{\App\Helpers\Functions::dayMonthYear($item->checkin_date)}}</td>
                    <td>{{\App\Helpers\Functions::dayMonthYear($item->next_checkin)}}</td>
                    <td>{{\App\Helpers\Functions::showTextStatusOkr($item->status)}}</td>
                    <td>
                        <div class="col-sm-2 col-6 text-center align-self-center">
                            <button type="button"
                                    class="btn btn-sm btn-toggle btn-primary btnStatus {{$item->done == 1 ? 'active' : ''}}"
                                    data-done="{{$item->done}}" data-id="{{$item->id}}" data-toggle="button"
                                    aria-pressed="false">
                                <span class="handle"></span>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix custom-pagination">
    {{$okrs->links()}}
</div>