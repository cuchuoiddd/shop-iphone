<div class="box response">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table-z-c2 tt-table" id="conent-okr" style="">
                <thead>
                <tr>
                    <th class="table-z-c2-col-1" style="width:60%;">Mục tiêu</th>
                    <th class="table-z-c2-col-2">Kết quả chính</th>
                    <th class="table-z-c2-col-3">Tiến độ</th>
                    <th class="table-z-c2-col-4" style="text-align:left">Thay đổi</th>
                    <th style="width:140px !important; min-width:140px;">Mức độ tự tin</th>
                    <th class="table-z-c2-col-4" style="text-align:left">Tổng kết</th>
                    <th style="min-width: 130px;text-align:center;">Check-in</th>
                </tr>
                </thead>
                <tbody>
                @forelse($okrs as $item)
                    <tr id="tree-{{$item->id}}" class="table-z-c2-col-1" data-position="1" data-id="{{$item->id}}">
                        <td style="width:50%;">
                            <div class="tt" data-tt-id="tree-1" data-tt-parent="">
                                @if(count($item->children))
                                    <span style="padding: 5px"
                                          class="pointer {{count($item->children) ? 'showChildOkr' : ''}}">
                                        <i class="fa fa-caret-right fa-15x right-{{$item->id}}"></i>
                                        <i class="fa fa-sort-down fa-15x down-{{$item->id}}" style="display: none"></i>
                                    </span>
                                @endif
                                <span class="content_1">
                                    <img src="/images/avatar/{{@$item->user->avatar}}" alt="" class="img-thumb mr-3"
                                         data-toggle="tooltip" data-placement="top" title="{{@$item->user->full_name}}">
                                    <span class="title">{{$item->title}}</span>
                                </span>
                            </div>
                        </td>
                        <td>
                            <a href="javascript:;" class="btn btn-z-c6 btn-z-c6-outline-secondary btn-z-block btnViewKR"
                               data-id="tree-1" data-okr_id="{{$item->id}}">
                                {{count($item->target)}} Kết quả
                            </a>
                        </td>
                        <td style="width:200px;">
                            <div class="progress-z-c1">
                                <div class="progress-z-c1-body">
                                    <div class="progress x-progress c2x-progress">
                                        <div class="progress-bar x-progress-bar c2x-progress-bar c-bg-danger"
                                             role="progressbar" style="width: {{$item->tien_do}}%" aria-valuenow="15"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-z-c1-footer"><span class="progressOkr">{{$item->tien_do}}</span>%
                                </div>
                            </div>
                        </td>
                        <td class="text-success text-center">
                            {{$item->thay_doi}}%
                        </td>
                        <td>
                            <div class="demo-radio-button">
                                <input type="radio"
                                       class="with-gap {{$item->status_target == 0 ? "radio-col-red" : ($item->status_target == 1 ? "radio-col-orange" : "radio-col-blue")}}"
                                       checked="">
                                <label>{{$item->status_target == 0 ? "Không ổn lắm" : ($item->status_target == 1 ? "Ổn" : "Rất tốt")}}</label>
                            </div>
                        </td>
                        <td class="text-danger text-center">
                            {{@$item->summary->scores}}
                        </td>
                        <td>
                            <button class="btn btn-block btn-sm text-white {{\App\Helpers\Functions::showClassStatusOkr($item->status)}}"
                                    style="background-color: {{\App\Helpers\Functions::showColorOkr($item->status)}}"
                                    type="button" data-id="{{$item->id}}">
                                <i class="fa fa-map-marker"></i> {{\App\Helpers\Functions::showTextStatusOkr($item->status)}}
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>