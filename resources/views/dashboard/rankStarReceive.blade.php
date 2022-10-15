<div class="box box-long">
    <div class="box-header with-border">
        <span class="avatar avatar-sm bg-blue"><i class="fa fa-star"></i></span>
        <h5 class="box-title bold">TOP SAO NHẬN ĐƯỢC TRONG THÁNG</h5>
    </div>
    <div class="box-body p-0">
        <div class="media-list media-list-hover media-list-divided custom-box">
            @forelse($rankStar['star_user_receive'] as $item)
                <a class="media media-single" href="#">
                    <span class="avatar avatar-sm bg-yellow"><i class="fa fa-star"></i></span>
                    <img src="/images/avatar/{{@$item->userCfrs->avatar}}"
                         class="avatar rounded-circle" alt="User Image">
                    <div class="media-body">
                        <p class="bold">{{@$item->userCfrs->full_name}}</p>
                        <time datetime="2017-07-14 20:00">{{@$item->userCfrs->office->name}}</time>
                    </div>
                    <p class="bold">{{$item->total_star}}</p>
                </a>
            @empty
            @endforelse


        </div>
    </div>
</div>