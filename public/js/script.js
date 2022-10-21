$(document).ready(function(){
    // $(".owl-carousel").owlCarousel();
    $('.owl-carousel').owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:0,
        autoWidth:true,
        nav:true,
        responsive:{
            600:{
                items:2
            }
        }
    });

    $(document).on('click','.content .parent',function () {
        $('.content .parent').removeClass('active').addClass('d-flex align-items-center');
        $(this).addClass('active');
        $('.content .parent .list-group').hide();
        $(this).removeClass('d-flex align-items-center').find('.list-group').show();

        $('.content .parent .top').hide();
        $('.content .parent .right').show();
        $(this).find('.top').show();
        $(this).find('.right').hide();
    })

    $(document).on('click','.header-mobile .parent',function () {
        $('.content .parent').removeClass('active').addClass('d-flex align-items-center');
        $(this).addClass('active');
        $('.content .parent .list-group').hide();
        $(this).removeClass('d-flex align-items-center').find('.list-group').show();

        $('.content .parent .top').hide();
        $('.content .parent .right').show();
        $(this).find('.top').show();
        $(this).find('.right').hide();
    })

    $(document).on('click','.color-code .color-button',function () {
        let el = $(this);
        let item = el.data('item');
        el.closest('.item').find('.new-price .number').text(item.new_price);
        el.closest('.item').find('.old-price .number').text(item.old_price);

        el.closest('ul').find('.list-group-item').removeClass('active');
        el.parent().addClass('active');
    })


    $(document).on('click','.filter .filter-item',function () {
        let capacity = $(this).data('id');
        $(this).parent().find('.filter-item').removeClass('active');
        $(this).addClass('active');
        $('#gridForm .capacity_id').val(capacity);
        submitForm();
    })

    $(document).on('click','.menu-bar .child',function () {
        let category = $(this).data('id');
        $('#gridForm .category_id').val(category);
        submitForm();
    })

    $(document).on('click','.header-mobile .child',function () {
        let category = $(this).data('id');
        $('#gridForm .category_id').val(category);
        submitForm();
    })

    //form
    function submitForm(){
        let capacity_id = $('#gridForm .capacity_id').val();
        let category_id = $('#gridForm .category_id').val();

        $.ajax({
            url:'/',
            data:{
                capacity_id:capacity_id,
                category_id:category_id
            },
            success:function (data) {
                console.log(123123,data);
                        if (data) {
                            $('.response').html(data);
                        }
            }

        })

        // $("#gridForm").submit(function (e, page) {
        //     e.preventDefault();
        //
        //     $.get($("#gridForm").attr('action'), $("#gridForm").serialize(), function (data) {
        //         if (data) {
        //             $('.response').html(data);
        //         }
        //     })
        // })
    }




});