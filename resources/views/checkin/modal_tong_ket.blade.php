<style>
    .scores{
        padding: 2px 15px;
        border: 1px solid;
        border-radius: 14px;
        background: olivedrab;
        color: #fff;
        width: 50px;
        font-size: 15px;
        text-align: center;
    }
    .scores:focus-visible{
        border: none;
        outline: none;
    }
</style>
<div class="modal fade" data-backdrop="false" id="modalTongKet" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom">
        <form novalidate action="{{url('/summary')}}" method="post" id="myForm1">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title titleText">Tổng kết OKRs: </h5>
                    {{--<h5 class="scores modal-title ml-2" style="">0</h5>--}}
                    <input type="text" class="modal-title scores ml-2" name="scores" readonly value="0">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 box box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>KÊT QUẢ CHÍNH</th>
                                        <th>MỤC TIÊU</th>
                                        <th>KẾT QUẢ</th>
                                        <th>%</th>
                                        <th>CHẤM ĐIỂM</th>
                                    </tr>
                                </thead>
                                <tbody class="listTarget">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Tôi đã hoàn thành mục tiêu của mình chưa?</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_1" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Nếu đã hoành thành, điều gì đã góp phần vào thành công?</label>
                                <div class="col-sm-9 controls">
                                     <textarea name="text_2" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Nếu chưa, tôi đã gặp phải những trở ngại gì?</label>
                                <div class="col-sm-9 controls">
                                     <textarea name="text_3" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Mục tiêu khó hay dễ đạt được hơn bạn nghĩ khi đặt ra?</label>
                                <div class="col-sm-9 controls">
                                     <textarea name="text_4" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Nếu tôi viết lại OKRs này, tôi sẽ thay đổi điều gì</label>
                                <div class="col-sm-9 controls">
                                     <textarea name="text_5" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bạn nhận được gì từ người quản lý mà bạn thấy hữu ích</label>
                                <div class="col-sm-9">
                                    <textarea name="text_6" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Điều gì từ người quản lý đã cản trở khả năng làm việc của bạn</label>
                                <div class="col-sm-9">
                                    <textarea name="text_7" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Người quản lý có thể làm gì cho bạn để giúp bạn thành công hơn</label>
                                <div class="col-sm-9">
                                    <textarea name="text_8" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Các kỹ năng, năng lực tôi muốn cải thiện hiện tại</label>
                                <div class="col-sm-9">
                                    <textarea name="text_9" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Các kỹ năng, năng lực tôi nghĩ mình muốn bổ sung trong tương lai</label>
                                <div class="col-sm-9">
                                    <textarea name="text_10" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Điều Công ty, nhóm có thể giúp tôi phát triển hơn nữa trong nghề nghiệp là</label>
                                <div class="col-sm-9">
                                    <textarea name="text_11" class="form-control" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="OkrId" name="okr_id">
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right submitTongKet">Kết thúc tổng kết cuối chu kỳ</button>
                    <button type="button" class="btn btn-bold btn-pure btn-secondary float-right mr-1"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>