<div class="modal fade" data-backdrop="false" id="modalFeedback2" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-custom">
        <form novalidate action="{{url('/feedback2')}}" method="post" id="myForm2">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tổng kết OKRs: </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--<div class="row">--}}
                        {{--<div class="col-6">--}}
                            {{--<div class="">Mục tiêu : <span>Mục tiêu số 3</span></div>--}}
                            {{--<div class="">Ngày cần check-in : <span>18/07/2022</span></div>--}}
                            {{--<div class="">Tiến độ thực hiên : <span>10%</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required text1">Tôi đã hoàn thành mục tiêu của mình chưa?</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_1" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required text2">Nếu đã hoành thành, điều gì đã góp phần vào thành công?</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_2" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required text3">Nếu chưa, tôi đã gặp phải những trở ngại gì?</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_3" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required text4">Mục tiêu khó hay dễ đạt được hơn bạn nghĩ khi đặt ra?</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_4" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required text5">Nếu tôi viết lại OKRs này, tôi sẽ thay đổi điều gì</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="text_5" class="form-control" rows="1" required data-validation-required-message="Không được bỏ trống"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="OkrId" name="okr_id">
                    <button type="submit" class="btn btn-bold btn-pure btn-primary float-right submitFeedback2">Kết thúc tổng kết cuối chu kỳ</button>
                    <button type="button" class="btn btn-bold btn-pure btn-secondary float-right mr-1"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>