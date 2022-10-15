<div class="modal fade" data-backdrop="false" id="modalPhanHoi1" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom">
        <form novalidate action="{{url('/phan-hoi-lan-1')}}" method="post" id="myForm1">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Phản hồi check-in</h5>
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
                                <th>Phản hồi của người quản lý</th>
                            </tr>
                            </thead>
                            <tbody class="data-row-feedback"></tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <h2>Phản hồi mục tiêu</h2>
                            <div class="row">
                                <div class="controls col-7">
                                    <select
                                            name="feedback_status_id_okr" id="" class="form-control select2 showFeedbackStatus"
                                            data-placeholder="Chọn tiêu chí"
                                            required data-validation-required-message="Tiêu chí không được bỏ trống"
                                    >
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col-5">
                                    <input type="number" placeholder="Nhập số sao tùy chỉnh" name="star_custom_okr" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-6 form-group">
                            <div class="controls">
                                <textarea name="content_okr" rows="4" class="form-control" required
                                          data-validation-required-message="Nội dung không được bỏ trống"
                                          placeholder="Nội dung phản hồi"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="checkbox" id="md_checkbox_1" class="filled-in chk-col-blue status checkedOkr">
                    <label for="md_checkbox_1">Hoàn thành Okrs</label>
                    &emsp;&emsp;
                    <span>Ngày Check-in tiếp theo:</span>
                    <span class="form-group">
                        <span class="controls">
                            <input type="text" class="form-control-custom datepicker nextCheckin">
                        </span>
                    </span>

                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right submitFeedback1">Phản hồi xong</button>
                    <button type="button" class="btn btn-bold btn-pure btn-secondary float-right mr-1"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>