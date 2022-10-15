@extends('layouts.master')
@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý tiêu chí ghi nhận
                {{--<small>Control panel</small>--}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <select class="form-control form-control-custom select2" name="department_id" data-placeholder="Chọn phòng ban">
                        <option value=""></option>
                        @forelse($departments as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                        @endforelse
                    </select>
                    <select class="form-control form-control-custom select2" name="type" data-placeholder="Chọn">
                        <option value=""></option>
                        <option value="{{\App\Constants\SettingConstant::CHECK_IN}}">Check-in</option>
                        <option value="{{\App\Constants\SettingConstant::GHI_NHAN}}">Ghi nhận</option>
                        <option value="{{\App\Constants\SettingConstant::PHAN_HOI}}">Phản hồi khác</option>
                    </select>
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
                    @include('settings.feedback_status.ajax')
                    @include('settings.feedback_status.modal')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')

    <script>
        $(document).on('click','.addFeedback',function () {
            resetValue();
            $('#myModal').modal('show');
        })

        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/settings/feedback-status/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.name').val(item.name);
            $('.rate').val(item.rate);
            $('.description').val(item.description);
            $('.position').val(item.position);
            if (item.department_id){
                $('.department_id').val(item.department_id).change();
            }

            $('#myModal').modal({show: true})
        });

        function resetValue() {
            let form = $('#myForm');
            form.attr('action', '/settings/feedback-status');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới').change();
            form.trigger('reset');
        }
    </script>
@endsection
