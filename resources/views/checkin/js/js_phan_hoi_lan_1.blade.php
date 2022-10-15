<script>
    $(document).on('click', '.openFormFeedback1', async function () {
        let self = $(this);
        let id = self.data('id');
        let current_user = $('.currentUser').val();
        current_user = JSON.parse(current_user);
        let html_feedback = "";

        await $.ajax({
            url:'get-feedback-status-department/'+id,
            success:function (data) {
                if (data && data.length > 0) {
                    data.forEach(f => {
                        html_feedback += `
                            <option value="` + f.id + `">` + f.name + ` (`+f.rate+`*) </option>
                        `
                    })
                }
            }
        });
        $.ajax({
            url: 'get-target-okr',
            data: {
                id: id
            },
            success: function (data) {
                if (data.okr) {
                    let titleOkr = self.closest('tr').find('.title').html();
                    let processOkr = self.closest('tr').find('.progressOkr').html();
                    let next_checkin = data.okr.next_checkin ? data.okr.next_checkin : moment(new Date()).format('yyyy-mm-dd');
                    $('#modalPhanHoi1 .showFeedbackStatus').append(html_feedback);
                    console.log(33333333);


                    $('#modalPhanHoi1 .nameOkr').html(titleOkr);
                    $('#modalPhanHoi1 .showDateCheckin').html(next_checkin);
                    $('#modalPhanHoi1 .showProcessOkr').html(processOkr);

                    // submitFeedback1
                    if (data.okr.user_id !== current_user.id || current_user.role_id == '1') { //admin hoặc cấp trên
                        $('.submitFeedback1').show();
                    } else {
                        $('.submitFeedback1').hide();
                    }

                    let data_nhap = []; //data nháp
                    if (data.history && data.history.length > 0) {
                        data_nhap = data.history;
                    }

                    if (data.okr.done == 1) { //checked done okr
                        console.log(77777, $('.checkedOkr'));
                    }
                    let html = '';
                    if (data.okr.target && data.okr.target.length > 0) {
                        data.okr.target.forEach((f, index) => {
                            let id_1 = index * 3 + 1;
                            let id_2 = index * 3 + 2;
                            let id_3 = index * 3 + 3;

                            let so_dat_duoc = 0;
                            let tien_do = 0;
                            let muc_do_tu_tin = 2;
                            let text_1 = '';
                            let text_2 = '';
                            let text_3 = '';
                            let text_4 = '';
                            let checked = '';
                            let history_checkin_id = 0;
                            if (data_nhap.length > 0) {
                                let data_nhap_item = data_nhap.filter(ft => ft.target_id == f.id);
                                if (data_nhap_item.length > 0) {
                                    data_nhap_item = data_nhap_item[0];
                                    history_checkin_id = data_nhap_item.id;
                                    so_dat_duoc = data_nhap_item.value;
                                    text_1 = data_nhap_item.text_1;
                                    text_2 = data_nhap_item.text_2;
                                    text_3 = data_nhap_item.text_3;
                                    text_4 = data_nhap_item.text_4;
                                    muc_do_tu_tin = data_nhap_item.status
                                    checked = data_nhap_item.done == 1 ? 'checked' : ''
                                    tien_do = ((data_nhap_item.value / f.target) * 100).toFixed()
                                }
                            }

                            html += `
                                <tr>
                                    <td>
                                        ` + f.name + ` <br>
                                        <hr>
                                        <input type="hidden" name="target_id[]" value="` + f.id + `">
                                        <input type="hidden" name="history_checkin_id[]" value="` + history_checkin_id + `">
                                        <input type="checkbox" id="done_` + index + `" name="done_` + index + `"
                                               class="filled-in chk-col-blue status" value="1" ` + checked + `>
                                        <label for="done_` + index + `">Hoàn thành</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control target" value="` + formatNumber(f.target) + `" readonly> <br>
                                        ` + f.unit.name + `
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="text" value="` + formatNumber(so_dat_duoc) + `" class="form-control valueTarget" readonly>
                                            </div>
                                        </div>
                                        ` + f.unit.name + `
                                    </td>
                                    <td><span class="tienDo">` + tien_do + `</span>%</td>
                                    <td>
                                        <div class="demo-radio-button">
                                            <input value="2" type="radio" id="radio_` + id_1 + `" class="radio-col-blue" ` + getChecked(2, muc_do_tu_tin) + `>
                                            <label for="radio_` + id_1 + `">Rất tốt</label> <br>
                                            <input value="1" type="radio" id="radio_` + id_2 + `" class="radio-col-maroon" ` + getChecked(1, muc_do_tu_tin) + `>
                                            <label for="radio_` + id_2 + `">Ổn</label> <br>
                                            <input value="0" type="radio" id="radio_` + id_3 + `" class="radio-col-red" ` + getChecked(0, muc_do_tu_tin) + `>
                                            <label for="radio_` + id_3 + `">Không ổn lắm</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <textarea class="form-control" cols="30" rows="5">` + text_1 + `</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <textarea class="form-control" cols="30" rows="5">` + text_2 + `</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <textarea class="form-control" cols="30" rows="5">` + text_3 + `</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <textarea class="form-control" cols="30" rows="5">` + text_4 + `</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="feedback_status_id[]" data-placeholder="Chọn tiêu chí" class="form-control select2">
                                                    <option></option>
                                                     ` + html_feedback + `
                                                </select>
                                                <input type="number" class="form-control" name="star_custom[]" placeholder="Nhập số sao tuỳ chỉnh">
                                                <textarea name="content[]" rows="4" class="form-control"
                                                          placeholder="Nội dung phản hồi"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            `
                        })

                        // $('.data-row-checkin').after(html)
                        // $('.data-row-checkin').prepend(html)
                        html += `
                            <tr>
                               <td colspan="11">
                                        <div class="demo-radio-button d-flex justify-content-center">
                                            <span>Chọn mức độ tự tin hoàn thành của mục tiêu:</span>
                                            <input value="0" type="radio" id="radio1_3" class="radio-col-red" ` + getChecked(0, data.okr.status_target) + `>
                                            <label for="radio1_3">Không ổn lắm</label>
                                            <input value="1" type="radio" id="radio1_2" class="radio-col-maroon" ` + getChecked(1, data.okr.status_target) + `>
                                            <label for="radio1_2">Ổn</label> <br>
                                            <input value="2" type="radio" id="radio1_1" class="radio-col-blue" ` + getChecked(2, data.okr.status_target) + `>
                                            <label for="radio1_1">Rất tốt</label> <br>
                                        </div>
                               </td>
                            </tr>
                        `
                        $('#modalPhanHoi1 .data-row-feedback').html(html)
                    }
                }
            }
        })


        $(window).on('shown.bs.modal', function () {
            // $('#modal-fill').modal('show');
            loadJsAfterCallAjax();
            // $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

            // alert('shown');
        });
        $('#modalPhanHoi1').modal('show');
    })

    $(document).on('keyup change', '.valueTarget', function (e) {
        let data = $(this).val();
        let target = $(this).closest('tr').find('.target').val();
        data = Number(data.replaceAll(',',''));
        target = Number(target.replaceAll(',',''))
        let tien_do = Math.round((data/target)*100);
        $(this).closest('tr').find('.tienDo').html(tien_do);
    })


    function getChecked(value1, value2) {
        if (value1 == value2) {
            return 'checked';
        } else {
            return '';
        }
    }
</script>