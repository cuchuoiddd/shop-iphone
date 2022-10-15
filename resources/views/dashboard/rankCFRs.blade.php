
<div class="box-body p-0">
    <div class="media-list media-list-hover media-list-divided custom-box">
        @forelse($ghi_nhan as $item)
            <div class="media">
                <div class="row">
                    <div class="col-3">
                        <span class="avatar avatar-sm bg-yellow"><i class="fa fa-star"></i></span>
                        {{--<img class="avatar" src="../../../images/avatar/1.jpg" alt="...">--}}
                        <img class="avatar" src="/images/avatar/{{@$item->user->avatar}}" alt="...">
                    </div>
                    <div class="col-9">
                        <div class="media-body">
                            <p style="position: relative">
                                <strong class="bold">{{@$item->user->full_name}}</strong>
                                <span class="avatar avatar-sm bg-blue bold"
                                      style="color: yellow !important;position: absolute;right: 0">{{$item->current_rate}} <i
                                            class="fa fa-star"></i></span>
                            </p>
                            <p>
                                <time>Đã phản hồi với</time>
                                <strong>{{@$item->userCfrs->full_name}}</strong></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="media-body">

                            <nav class="nav nav-dot-separated no-gutters">
                                <div class="row">
                                    <div class="col-12 text-report">
                                        <span class="text-warning">{{$item->content}}</span>
                                    </div>
                                    <div class="col-12 text-report">
                                        <span class="bold">Tiêu chí ghi nhận: </span>
                                        <time>{{@$item->feedbackStatus->name}}</time>
                                    </div>
                                    <div class="col-12 text-report">
                                        <span class="bold">Thời gian: </span>
                                        <time>{{$item->created_at}}</time>
                                    </div>
                                    {{--<div class="col-12 text-report">--}}
                                    {{--<span class="bold">Tiến độ OKRs: </span><time>Đạt được 16%</time>--}}
                                    {{--</div>--}}
                                    <div class="col-12 text-report">
                                        <span class="bold">OKRs: </span>
                                        <time>{{@$item->okr->title}}</time>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>
