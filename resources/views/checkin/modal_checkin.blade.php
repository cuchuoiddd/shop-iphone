<div class="modal fade" data-backdrop="false" id="modal-fill" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-custom">
        <form novalidate action="{{route('checkins.checkin.store')}}" method="post" id="myForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check-in OKRs hàng tuần</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="">Mục tiêu : <span class="nameOkr">Mục tiêu số 3</span></div>
                            <div class="">Ngày cần check-in : <span class="showDateCheckin">18/07/2022</span></div>
                            <div class="">Tiến độ thực hiên : <span class="showProcessOkr">10</span>%</div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kết quả chính</th>
                                <th>Mục tiêu</th>
                                <th>Số đạt được</th>
                                <th>Tiến độ</th>
                                <th>Mức độ tự tin hoàn thành</th>
                                <th>Tiến độ, kết quả công việc ?</th>
                                <th>Công việc nào đang & sẽ chậm tiến độ ?</th>
                                <th>Trở ngại, khó khăn gì?</th>
                                <th>Cần làm gì để vượt qua trở ngại?</th>
                            </tr>
                            </thead>
                            <tbody class="data-row-checkin"></tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="checkbox" id="md_checkbox_1" name="done_okr"
                           class="filled-in chk-col-blue status doneOkr" value="1">
                    <label for="md_checkbox_1">Hoàn thành Okrs</label>
                    &emsp;&emsp;
                    <span>Ngày Check-in tiếp theo:</span>
                    <span class="form-group">
                        <span class="controls">
                            <input type="text" name="next_checkin" class="form-control-custom datepicker next_checkin" required autocomplete="off"
                                   data-validation-required-message="Ngày Check-in tiếp theo không được bỏ trống" min="20-08-2022">
                        </span>
                    </span>

                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right submitCheckin">Check-in
                        Xong
                    </button>
                    <button type="button" class="btn btn-bold btn-pure btn-warning float-right mr-1 luuNhap">Lưu nháp</button>
                    <button type="button" class="btn btn-bold btn-pure btn-secondary float-right mr-1"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" data-backdrop="false" id="modalShowTarget" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Check-in OKRs hàng tuần</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kết quả chính</th>
                            <th>Mục tiêu</th>
                            <th>Đơn vị</th>
                            <th>Đạt được</th>
                            <th>Tiến độ</th>
                            <th>Thay đổi</th>
                            <th>Mức độ tự tin</th>
                            <th>Kế hoạch</th>
                            <th>Kết quả</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody class="data-row-target"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-bold btn-pure btn-primary float-right addTarget" data-okr_id="">Thêm kết quả
                    chính
                </button>
                <a class="btn btn-bold btn-pure btn-warning float-right mr-1 editOkr" style="color: white"> <i class="fa fa-edit"></i> &ensp;Sửa OKR
                </a>
                <input type="hidden" class="deleteOkrValue">
                <a class="btn btn-bold btn-pure btn-danger float-right mr-1 deleteOkr" style="color: white"> <i class="fa fa-edit"></i> &ensp;Xóa OKR
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" data-backdrop="false" id="modalEditTarget" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom1">
        <form action="/update-target" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật kết quả chính</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="required">Kết quả chính</label>
                                        <input type="text" name="name" class="form-control name" required
                                               data-validation-required-message="Kết quả không được bỏ trống">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="required">Mục tiêu</label>
                                        <input type="text" name="target" class="form-control target formatNumber" required
                                               data-validation-required-message="Kết quả không được bỏ trống">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="required">Đơn vị</label>
                                        <select name="unit_id" class="select2 form-control unitId">
                                            @forelse($units as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Link kế hoạch</label>
                                        <input type="text" name="link_okr" class="form-control linkOkr"
                                               placeholder="Link google sheet, nếu có">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Link kết quả</label>
                                        <input type="text" name="link_result" class="form-control linkResult"
                                               placeholder="Link google sheet, nếu có">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Kết quả chính liên quan (Cấp trên)</label>
                                        <select name="parent_id[]" id="" class="select2 form-control target_parent_id" multiple
                                                data-placeholder="Chọn kết quả chính">
                                            @forelse($target_okr as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="targetID" name="target_id">
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right updateTarget">Cập nhật
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" data-backdrop="false" id="modalCreateTarget" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom1">
        <form action="/create-target" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm kết quả chính</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="required">Kết quả chính</label>
                                        <input type="text" name="name" class="form-control name" required
                                               data-validation-required-message="Kết quả không được bỏ trống">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="required">Mục tiêu</label>
                                        <input type="text" name="target" class="form-control target" required
                                               data-validation-required-message="Kết quả không được bỏ trống">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="required">Đơn vị</label>
                                        <select name="unit_id" class="select2 form-control unitId">
                                            @forelse($units as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Link kế hoạch</label>
                                        <input type="text" name="link_okr" class="form-control linkOkr"
                                               placeholder="Link google sheet, nếu có">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Link kết quả</label>
                                        <input type="text" name="link_result" class="form-control linkResult"
                                               placeholder="Link google sheet, nếu có">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Kết quả chính liên quan (Cấp trên)</label>
                                        <select name="parent_id[]" id="" class="select2 form-control" multiple
                                                data-placeholder="Chọn kết quả chính">
                                            <option value=""></option>
                                            @forelse($target_okr as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="okrID" name="okr_id">
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right">Lưu lại</button>
                </div>
            </div>
        </form>
    </div>
</div>
