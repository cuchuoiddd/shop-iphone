@extends('layouts.master')
@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-switch/switch.css')}}">
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý nhân viên
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <input type="text" name="name" placeholder="Từ khoá tìm kiếm" class="form-control form-control-custom">
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @include('settings.user.ajax')
                    @include('settings.user.modal')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')

    <script>
        $(document).on('click','.addUser',function () {
            resetValue();
            $('#myModal').modal('show');
        })

        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/settings/user/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.full_name').val(item.full_name);
            $('.username').val(item.username);
            $('.email').val(item.email);
            if(item.parent_id){
                $('.parent_id').val(item.parent_id).change();
            }
            $('.phone').val(item.phone);
            $('.company_code').val(item.company_code).change();
            $('.department_id').val(item.department_id).change();
            $('.office_id').val(item.office_id).change();
            $('.role_id').val(item.role_id);
            let checked = item.status == 0 ? true : false;
            $('.status').prop('checked', checked);
            $('#myModal').modal({show: true});
        });

        function resetValue() {
            let form = $('#myForm');
            form.attr('action', '/settings/user');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới').change();
            form.trigger('reset');
            $('.parent_id').val('').change;
            $('.company_code').val('').change();
            $('.department_id').val('').change();
            $('.office_id').val('').change();

        }

        $(document).on('click','.btnStatus',function () {
            let el = $(this);
            let id = el.data('id');
            let status = $(this).attr('aria-pressed');

            $.ajax({
                url: "/settings/user-update-status",
                data: {id: id,status:status},
                method: 'put',
                success: function (data) {
                    if (data && data.success == 1){
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
            console.log(123123);
        })
    </script>
@endsection
