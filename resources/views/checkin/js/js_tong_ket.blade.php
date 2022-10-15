<script>
    $(document).on('click','.openFormSummary',function () {
        let okr_id = $(this).data('id');
        $('.OkrId').val(okr_id);
        let title = $(this).closest('tr').find('.title').html();
        $('#modalTongKet .titleText').html('Tổng kết OKRs: ' + title).change();

        let current_user = $('.currentUser').val();
        current_user = JSON.parse(current_user);

        $.ajax({
                url:'/get-user-with-okr/' + okr_id,
                success: function (data) {
                    if (data) {
                        if (data.id === current_user.id) { //phản hồi khi là của chính mình
                            $('.submitTongKet').show();
                        } else {
                            $('.submitTongKet').hide();
                        }

                    }
                }
        });

        let html = "";
        $.ajax({
                url:'/get-target-okr/',
                data:{id:okr_id},
                success: function (data) {
                    if (data.okr.target && data.okr.target.length > 0) {
                        data.okr.target.forEach(f=>{
                            let value = data.history.findIndex(fd => fd.target_id === f.id);
                            if (value > -1){
                                value = data.history[value].value;
                            } else {
                                value = 0;
                            }
                            let tien_do = ((value/f.target)*100).toFixed();
                            html += `
                                <tr>
                                    <td>`+f.name+`</td>
                                    <td>`+f.target+`</td>
                                    <td>`+value+`</td>
                                    <td>`+tien_do+` %</td>
                                    <td>
                                        <input type="hidden" value="`+f.id+`" name="target_id[]">
                                        <select name="detail_scores[]" id="" class="form-control changeTarget">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </td>
                                </tr>
                            `
                        })

                        $('.listTarget').html(html);

                    }
                }
        });

        $('#modalTongKet').modal('show');
    })


    $('#modalTongKet').on('shown.bs.modal', function (e) {
        $('.changeTarget').on('change', function(ev) {
            let arr = $('.changeTarget');
            let total = 0;
            arr.each(function(index, value) {
                total += Number(this.value);
            });

            total = Math.round(total/(arr.length));
            $('.scores').val(total)
        });
    })
</script>