<div class="box box-short">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-8">
                <h5 class="box-title bold">Tiến độ tuần này</h5>
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
                <span class="badge badge-pill badge-success">{{$okrRank['rankSuccess']['now']}}</span>
                <span class="title">OKRs tiến triển tốt</span>
                @if($okrRank['rankSuccess']['now']-$okrRank['rankSuccess']['last']-$okrRank['rankSuccess']['last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                    @elseif($okrRank['rankSuccess']['now']-$okrRank['rankSuccess']['last']-$okrRank['rankSuccess']['last'] < 0)
                <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-danger">{{$okrRank['rankSuccess']['now']-$okrRank['rankSuccess']['last']-$okrRank['rankSuccess']['last']}}</span>
            </a>

            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-warning">{{$okrRank['rankRuning']['now']}}</span>
                <span class="title">OKRs đang tiến triển</span>
                @if($okrRank['rankRuning']['now']-$okrRank['rankRuning']['last']-$okrRank['rankRuning']['last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                @elseif($okrRank['rankRuning']['now']-$okrRank['rankRuning']['last']-$okrRank['rankRuning']['last'] < 0)
                    <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-info">{{$okrRank['rankRuning']['now']-$okrRank['rankRuning']['last']-$okrRank['rankRuning']['last']}}</span>
            </a>

            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-danger">{{$okrRank['rankFailed']['now']}}</span>
                <span class="title">OKRs có sự rủi ro</span>
                @if($okrRank['rankFailed']['now']-$okrRank['rankFailed']['last']-$okrRank['rankFailed']['last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                    @elseif($okrRank['rankFailed']['now']-$okrRank['rankFailed']['last']-$okrRank['rankFailed']['last'] < 0)
                <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-secondary">{{$okrRank['rankFailed']['now']-$okrRank['rankFailed']['last']-$okrRank['rankFailed']['last']}}</span>
            </a>

            <a class="media media-single" href="#">
                <span class="badge badge-pill badge-primary">{{$okrRank['rank0']['now']}}</span>
                <span class="title">OKRs không tiến triển</span>
                @if($okrRank['rank0']['now']-$okrRank['rank0']['last']-$okrRank['rank0']['last'] > 0)
                    <i class="ion-arrow-graph-up-right text-info mr-1"></i>
                    @elseif($okrRank['rank0']['now']-$okrRank['rank0']['last']-$okrRank['rank0']['last'] < 0)
                <i class="ion-arrow-graph-down-right text-danger mr-1"></i>
                @endif
                <span class="badge badge-pill badge-secondary">{{$okrRank['rank0']['now']-$okrRank['rank0']['last']-$okrRank['rank0']['last']}}</span>
            </a>
        </div>
    </div>
</div>