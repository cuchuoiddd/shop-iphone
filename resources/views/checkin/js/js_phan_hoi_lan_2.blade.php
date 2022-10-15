<script>
    $(document).on('click','.openFormFeedback2',function () {
        let okr_id = $(this).data('id');
        let current_user = $('.currentUser').val();
        current_user = JSON.parse(current_user);

        $.ajax({
            url:'/get-user-with-okr/' + okr_id,
            success:function (data) {
                $('.OkrId').val(okr_id);
                $('.modal-title').html(`Tổng kết OKRs: ${data.full_name}`)
                $('.text1').html(`${data.full_name} đã làm việc như thế nào?`)
                $('.text2').html(`Nếu ${data.full_name} đã làm việc chưa hiệu quả thì nên cải thiện, thay đổi như thế nào?`)
                $('.text3').html(`Nếu ${data.full_name} làm việc hiệu quả, nên duỳ trì và phát huy điều gì?`)
                $('.text4').html(`${data.full_name} nên học tập thêm điều gì?`)
                $('.text5').html(`Điều tôi kỳ vọng ở ${data.full_name}`)

                if(data.id !== current_user.id || current_user.role_id == '1'){ //admin hoặc cấp trên
                    $('.submitFeedback2').show();
                } else {
                    $('.submitFeedback2').hide();
                }

                $('#modalFeedback2').modal('show');
            }
        })
    })
</script>