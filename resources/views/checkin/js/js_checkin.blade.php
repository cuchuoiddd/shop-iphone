<script>
    $(document).delegate('.openFormCheckin', 'click', function () {
        let titleOkr = $(this).closest('tr').find('.title').html();
        let processOkr = $(this).closest('tr').find('.progressOkr').html();

        let id = $(this).data('id');
        let current_user = $('.currentUser').val();
        current_user = JSON.parse(current_user);
        let date = moment(new Date()).add(1, 'days').format('DD-MM-YYYY');
        $('.next_checkin').val(date);
        $('.next_checkin').attr('min',date);

        // console.log(1233123,date);
        // console.log(1233123,$('.next_checkin'));
        //
        // return;
        $.ajax({
            url: 'get-target-okr',
            data: {
                id: id
            },
            success: function (data) {
                if (data.okr) {
                    if(data.okr.user_id === current_user.id && data.okr.status != 3){ //check-in khi là của chính mình và khác trạng thái đã checkin
                        $('.submitCheckin').show();
                    } else {
                        $('.submitCheckin').hide();
                    }

                    let next_checkin = data.okr.next_checkin ? data.okr.next_checkin : moment(new Date()).format('YYYY-MM-DD');

                    $('#modal-fill .nameOkr').html(titleOkr);
                    $('#modal-fill .showDateCheckin').html(next_checkin);
                    $('#modal-fill .showProcessOkr').html(processOkr);


                    let data_nhap = []; //data nháp
                    if(data.history && data.history.length > 0){
                        data_nhap = data.history;
                    }

                    let html = '';


                    if (data.okr.target && data.okr.target.length > 0) {
                        let muc_do_tu_tin = data.okr.status_target;
                        let done_okr = data.okr.done ==1 ? true : false
                        $('#modal-fill .doneOkr').prop('checked',done_okr);
                        data.okr.target.forEach((f, index) => {
                            let id_1 = index * 3 + 1;
                            let id_2 = index * 3 + 2;
                            let id_3 = index * 3 + 3;

                            let target = 0;
                            let tien_do = 0;
                            let muc_do = 0;
                            let text_1 = '';
                            let text_2 = '';
                            let text_3 = '';
                            let text_4 = '';
                            let checked = '';

                            if(data_nhap.length> 0){
                                let data_nhap_item = data_nhap.filter(ft=>ft.target_id == f.id);
                                if(data_nhap_item.length > 0){
                                    data_nhap_item = data_nhap_item[0];
                                    target = data_nhap_item.value;
                                    tien_do = ((data_nhap_item.value / f.target) * 100).toFixed();
                                    muc_do = data_nhap_item.status;
                                    text_1 = data_nhap_item.text_1;
                                    text_2 = data_nhap_item.text_2;
                                    text_3 = data_nhap_item.text_3;
                                    text_4 = data_nhap_item.text_4;
                                    checked = data_nhap_item.done == 1 ? 'checked' : ''
                                }else {
                                    target = 0;
                                    tien_do = 0;
                                    muc_do = 0;
                                    text_1 = '';
                                    text_2 = '';
                                    text_3 = '';
                                    text_4 = '';
                                    checked = data_nhap_item.done == 1 ? 'checked' : ''
                                }
                                console.log(123,data_nhap_item);
                            }
                            html += `
                                <tr>
                                    <td>
                                        ` + f.name + ` <br>
                                        <hr>
                                        <input type="hidden" name="target_id[]" value="` + f.id + `">
                                        <input type="checkbox" id="done_` + index + `" name="done_` + index + `"
                                               class="filled-in chk-col-blue status" value="1" `+checked+`>
                                        <label for="done_` + index + `">Hoàn thành</label>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control target" value="` +formatNumber(f.target) + `"> <br>
                                        ` + f.unit.name + `
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="text" value="`+target+`" class="form-control valueTarget formatNumber" name="value[]" required data-validation-required-message="Số đạt được không được bỏ trống">
                                            </div>
                                        </div>
                                        ` + f.unit.name + `
                                    </td>
                                    <td><span class="tienDo">`+tien_do+`</span>%</td>
                                    <td>
                                        <div class="demo-radio-button">
                                            <input name="status_` + index + `" value="2" type="radio" id="radio_` + id_1 + `" class="radio-col-blue" `+getChecked(2,muc_do)+`>
                                            <label for="radio_` + id_1 + `">Rất tốt</label> <br>
                                            <input name="status_` + index + `" value="1" type="radio" id="radio_` + id_2 + `" class="radio-col-maroon" `+getChecked(1,muc_do)+`>
                                            <label for="radio_` + id_2 + `">Ổn</label> <br>
                                            <input name="status_` + index + `" value="0" type="radio" id="radio_` + id_3 + `" class="radio-col-red" `+getChecked(0,muc_do)+`>
                                            <label for="radio_` + id_3 + `">Không ổn lắm</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls mof-container-focus">
                                                <textarea class="form-control textarea-resize-focus" name="text_1[]" id="" cols="30" rows="4" required data-validation-required-message="Tiến độ không được bỏ trống">`+text_1+`</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls mof-container-focus">
                                                <textarea class="form-control textarea-resize-focus" name="text_2[]" id="" cols="30" rows="4" required data-validation-required-message="Công việc không được bỏ trống">`+text_2+`</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls mof-container-focus">
                                                <textarea class="form-control textarea-resize-focus" name="text_3[]" id="" cols="30" rows="4" required data-validation-required-message="Trở ngại, khó khăn không được bỏ trống">`+text_3+`</textarea>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="controls mof-container-focus">
                                                <textarea class="form-control textarea-resize-focus-custom" name="text_4[]" id="" cols="30" rows="4" required data-validation-required-message="Vượt qua trở ngại không được bỏ trống">`+text_4+`</textarea>
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
                                            <input name="status_target" value="0" type="radio" id="radio1_3" class="radio-col-red" `+getChecked(0,muc_do_tu_tin)+`>
                                            <label for="radio1_3">Không ổn lắm</label>
                                            <input name="status_target" value="1" type="radio" id="radio1_2" class="radio-col-maroon" `+getChecked(1,muc_do_tu_tin)+`>
                                            <label for="radio1_2">Ổn</label> <br>
                                            <input name="status_target" value="2" type="radio" id="radio1_1" class="radio-col-blue" `+getChecked(2,muc_do_tu_tin)+`>
                                            <label for="radio1_1">Rất tốt</label> <br>
                                        </div>
                               </td>
                            </tr>
                        `
                        $('.data-row-checkin').html(html)
                    } else {
                        $('.data-row-checkin').html('');
                    }
                }
            }
        })


        $(window).on('shown.bs.modal', function () {
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        });

        $('#modal-fill').modal('show');
    })

    // $('.valueTarget').change(function () {
    // })
    $(document).on('keyup change', '.valueTarget', function (e) {
        let data = $(this).val();
        let target = $(this).closest('tr').find('.target').val();
        data = Number(data.replaceAll(',',''));
        target = Number(target.replaceAll(',',''))
        let tien_do = Math.round((data/target)*100);
        $(this).closest('tr').find('.tienDo').html(tien_do);
    })


    $(document).on('click','.btnViewKR',function () {
        let name = $(this).closest('tr').find('.title').html();
        let okr_id = $(this).data('okr_id')
        $.ajax({
            url:'/get-target-okr',
            data:{
                id:okr_id
            },
            success:function (data) {
                if(!data.check_permission_edit_okr){
                    $('#modalShowTarget .modal-footer').hide();
                } else {
                    $('#modalShowTarget .modal-footer').show();
                }
                let html = '';
                if(data.okr.target && data.okr.target.length > 0){
                    data.okr.target.forEach((f, index)=>{
                        let id_1 = index * 3 + 1;
                        let id_2 = index * 3 + 2;
                        let id_3 = index * 3 + 3;

                        let dat_duoc = 0;
                        let tien_do = 0;
                        let thay_doi = 0;
                        let muc_do_tu_tin = 2;
                        let data_href_okr =  f.link_okr ? f.link_okr : '#';
                        let data_href_result =  f.link_result ? f.link_result : '#';
                        if(data.history.length> 0){
                            let data_his_item = data.history.filter(ft=>ft.target_id == f.id);
                            if(data_his_item.length > 0){
                                data_his_item = data_his_item[0];
                                dat_duoc = data_his_item.value;
                                tien_do = ((dat_duoc/f.target)*100).toFixed();
                                thay_doi = tien_do;
                                muc_do_tu_tin = data_his_item.status
                            }
                        }

                        if(data.history_second){
                            let data_his_second_item = data.history_second.filter(fs=>fs.target_id == f.id);
                            if(data_his_second_item.length > 0){
                                data_his_second_item = data_his_second_item[0];
                                let tien_do_old = ((data_his_second_item.value/f.target)*100).toFixed();
                                thay_doi = tien_do - tien_do_old;
                            }
                        }


                        html+=`
                            <tr>
                                 <td>`+f.name+`</td>
                                 <td>`+formatNumber(f.target)+`</td>
                                 <td>`+f.unit.name+`</td>
                                 <td>`+formatNumber(dat_duoc)+`</td>
                                 <td>`+tien_do+` %</td>
                                 <td>`+thay_doi+` %</td>
                                 <td>
                                        <div class="demo-radio-button">
                                            <input value="2" type="radio" id="radio_` + id_1 + `" class="radio-col-blue" `+getChecked(2,muc_do_tu_tin)+`>
                                            <label for="radio_` + id_1 + `">Rất tốt</label> <br>
                                            <input value="1" type="radio" id="radio_` + id_2 + `" class="radio-col-maroon" `+getChecked(1,muc_do_tu_tin)+`>
                                            <label for="radio_` + id_2 + `">Ổn</label> <br>
                                            <input value="0" type="radio" id="radio_` + id_3 + `" class="radio-col-red" `+getChecked(0,muc_do_tu_tin)+`>
                                            <label for="radio_` + id_3 + `">Không ổn lắm</label>
                                        </div>
                                    </td>
                                 <td><a href="`+data_href_okr+`" target='_blank'><i class="fa fa-location-arrow"></i></a></td>
                                 <td><a href="`+data_href_result+`" target='_blank'><i class="fa fa-location-arrow"></i></a></td>
                                 <td>
                                    <span class="pointer editTarget mr-1" data-id="`+f.id+`"><i class="fa fa-edit fa-15x"></i></span>
                                    <span class="pointer deleteTarget" data-id="`+f.id+`"><i class="fa fa-trash-o fa-15x"></i></span>
                                 </td>
                            </tr>
                        `
                    })

                    $('.data-row-target').html(html);
                }
                else {
                    $('.data-row-target').html('');
                };
            }
        })
        $('#modalShowTarget .modal-title').html(name);
        $('#modalShowTarget .addTarget').attr('data-okr_id',okr_id);
        $('#modalShowTarget .editOkr').attr('href','okr/'+okr_id+'/edit');
        $('#modalShowTarget .deleteOkrValue').val(okr_id);
        $('#modalShowTarget').modal('show');
    })


    $(document).on('click','.editTarget',function () {
        let id = $(this).data('id');
        $.ajax({
            url:"/get-target-detail/"+id,
            success:function (data) {
                if(data){
                    let parent = data.parent_id ? JSON.parse(data.parent_id) : [];
                    $('#modalEditTarget .name').val(data.name).change();
                    $('#modalEditTarget .target').val(formatNumber(data.target)).change();
                    $('#modalEditTarget .linkOkr').val(data.link_okr).change();
                    $('#modalEditTarget .linkResult').val(data.link_result).change();
                    $('#modalEditTarget .target_parent_id').val(parent).change();
                    $('#modalEditTarget .unitId').val(data.unit_id).change();
                    $('#modalEditTarget .targetID').val(id);

                    $('#modalEditTarget').modal('show');
                }

            }
        })
    })

    $(document).on('click','.deleteTarget',function () {
        let id = $(this).data('id');
        let self = $(this);
        swal({
            title: 'Bạn có chắc chắn xóa mục này?',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            showCloseButton: true,
        },function () {
            $.ajax({
                url:'/delete-target/'+id,
                method:'delete',
                success:function (data) {
                    if(data && data == 1){
                        self.closest('tr').remove();
                    } else {
                        alertify.error('Đã check-in không được xoá');
                    }
                }
            })
        })

    })


    $(document).on('click','.addTarget',function () {
        let okr_id = $(this).data('okr_id');
        $('.okrID').val(okr_id);
        $('#modalCreateTarget').modal('show');
    })



    function getChecked(value1,value2) {
        if(value1==value2){
            return 'checked';
        } else {
            return '';
        }
    }

    $(document).on('click','.luuNhap',function (e) {
        e.preventDefault();
        let html = `<input type="hidden" value="1" name="is_luu_nhap">`;
        $('#modal-fill #myForm').append(html);
        $('#modal-fill #myForm').submit();
    })

    $(document).on('click','.deleteOkr',function () {
        let okr_id = $('.deleteOkrValue').val();
        swal({
            title: 'Bạn có chắc chắn xóa mục này?',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            showCloseButton: true,
        },function () {
            $.ajax({
                url: `/okr/${okr_id}`,
                method: 'delete',
                success: function (data) {
                    if (data && data.success === false) {
                        swal({
                            title: data.message ? data.message : '',
                            type: 'warning'
                        })
                    } else {
                        swal({
                            title: 'Đã xóa thành công!',
                            type: 'success'
                        })
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            });
        })
    })

</script>