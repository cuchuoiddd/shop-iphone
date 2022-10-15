<div class="box box-short">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-8">
                <h5 class="box-title bold">Tình trạng CFRs (Trong chu kỳ)</h5>
            </div>
            <div class="col-4 text-right">
                <h5 class="box-title bold">Thay đổi</h5><br>
                <small>(So với tuần trước)</small>
            </div>
        </div>

    </div>
    <div class="box-body p-0">
        <div class="media-list media-list-hover media-list-divided">
            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-success">{{$statusCFRS['feedback_cfrs_now']}}</span>
                <span class="title">Phản hồi</span>
                @if($statusCFRS['feedback_cfrs_now'] - $statusCFRS['feedback_cfrs_last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                @elseif ($statusCFRS['feedback_cfrs_now'] - $statusCFRS['feedback_cfrs_last'] < 0)
                    <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-danger">{{$statusCFRS['feedback_cfrs_now'] - $statusCFRS['feedback_cfrs_last']}}</span>
            </a>

            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-warning">{{$statusCFRS['ghi_nhan_cfrs_now']}}</span>
                <span class="title">Ghi nhận</span>
                @if($statusCFRS['ghi_nhan_cfrs_now'] - $statusCFRS['ghi_nhan_cfrs_last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                @elseif ($statusCFRS['ghi_nhan_cfrs_now'] - $statusCFRS['ghi_nhan_cfrs_last'] < 0)
                    <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-info">{{$statusCFRS['ghi_nhan_cfrs_now'] - $statusCFRS['ghi_nhan_cfrs_last']}}</span>
            </a>

            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-danger">0</span>
                <span class="title">Quản lý sử dụng CFRs</span>
                <span class="badge badge-pill badge-secondary">0</span>
            </a>

            {{--<a class="media media-single" href="#">--}}
                {{--<span class="badge badge-pill badge-primary">8</span>--}}
                {{--<span class="title">OKRs không tiến triển</span>--}}
                {{--<span class="badge badge-pill badge-secondary">0</span>--}}
            {{--</a>--}}
        </div>
    </div>
</div>