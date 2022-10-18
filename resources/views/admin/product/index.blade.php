@extends('layouts.master')
@section('head')
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-switch/switch.css')}}">
@endsection
@section('content')
    <style>
        .btn-delete {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 10;
        }

        .box-body {
            position: relative;
        }
        #FormEdit .select2.select2-container{
            width: 100% !important;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý sản phẩm
                {{--<small>Control panel</small>--}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    {{--<div class="form-group row">--}}
                    {{--<div class="col-sm-9 controls">--}}
                    <select name="category_id" data-placeholder="Chọn danh mục" class="select2 form-control">
                        <option value=""></option>
                        @forelse($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    {{--</div>--}}
                    {{--</div>--}}
                    <input type="text" name="name" placeholder="Từ khoá tìm kiếm"
                           class="form-control form-control-custom">
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @include('admin.product.ajax')
                </div>
            </div>

        </section>
        <!-- /.content -->
        @include('admin.product.modal_create_product')
        @include('admin.product.modal_update')
    </div>
@endsection
@section('script')
    <script>
        $('.addCategory').on('click', function () {
            $('#myModal').modal('show');
        })


        // edit
        $(document).on('click', '.edit', async function () {
            let id = $(this).data('id');
            let form = $('#FormEdit');
            let html = '';

            let data_html = '';
            let data_color = $('.dataColor').val();
            data_color = JSON.parse(data_color);

            form.attr('action', '/admin/products/' + id);
            $.ajax({
                url:'get-info-product/'+ id,
                success:function (data) {
                    if(data){
                        console.log(123,data);
                        $('#FormEdit .name').val(data.name);
                        $('#FormEdit .category_id').val(data.category_id).change();
                        $('#FormEdit .capacity_id').val(data.capacity_id).change();
                        let checked = data.sim_free == 1 ? 'checked' : '';
                        $('#FormEdit .sim_free').prop('checked',checked);


                        if(data.product_option.length > 0){
                            data.product_option.forEach(f=>{

                                if (data_color.length > 0) {
                                    data_color.forEach(fe => {
                                        let active = f.color_id == fe.id ? 'selected' : '';
                                        data_html += `
                                            <option  `+active+` value="` + fe.id + `">` + fe.color_name + `</option>
                                        `
                                    })
                                }

                                html += `
                                    <div class="box">
                                    <div class="box-body">
                                        <button type="button" data-id="45" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="required">Chọn màu</label>
                                                    <select name="color_id[]" class="form-control select2" id="">
                                                        `+data_html+`
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="">Giá máy mới</label>
                                                    <input type="text" name="new_price[]" class="form-control formatNumber"  value="`+f.new_price+`">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="">Giá máy cũ</label>
                                                    <input type="text" name="old_price[]" class="form-control formatNumber" value="`+f.old_price+`">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                `;
                                data_html = '';
                            })

                            console.log(12313,html);
                            $('#FormEdit .formAdd').html(html);
                            console.log(123);
                            if(html){
                                $('#ModalEdit').modal({show: true});
                            }

                        }
                    }
                }
            })
        });

        $(document).on('click', '.btnStatus', function () {
            let el = $(this);
            let id = el.data('id');
            let status = $(this).attr('aria-pressed');

            $.ajax({
                url: "/admin/update-status-product",
                data: {id: id, status: status},
                method: 'put',
                success: function (data) {
                    if (data && data.success == 1) {
                        swal({
                            title: 'Cập nhật thành công',
                            type: 'success',
                            showCloseButton: true,
                        })
                    } else {
                        status == "false" ? el.addClass('active') : el.removeClass('active');
                        swal({
                            title: 'Cập nhật thất bại',
                            type: 'error',
                            showCloseButton: true,
                        })
                    }
                }
            })
        })


        $('.addResult').on('click', function () {
            let data_html = '';
            let data = $('.dataColor').val();
            data = JSON.parse(data);
            if (data.length > 0) {
                data.forEach(f => {
                    data_html += `
                        <option value="` + f.id + `">` + f.color_name + `</option>
                    `
                })
            }


            let html = `
                <div class="box">
                            <div class="box-body">
                                <button type="button" data-id="45" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="required">Chọn màu</label>
                                            <select name="color_id[]" class="form-control select2" id="">
                                                `+data_html+`
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="">Giá máy mới</label>
                                            <input type="text" name="new_price[]" class="form-control formatNumber">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="">Giá máy cũ</label>
                                            <input type="text" name="old_price[]" class="form-control formatNumber">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            `

            $('.formAdd').append(html);
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
            $('.select2').select2();

        })

        $(document).delegate('.btn-delete', 'click', function (e) {
            let parent = $(this).parent().parent().remove();
        })
    </script>
@endsection
