@extends('layouts.master')
@section('head')
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-switch/switch.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Okrs
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <select class="form-control form-control-custom select2" name="time_id" data-placeholder="Chu kỳ OKRs">
                        <option value=""></option>
                        @forelse($times as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <select class="form-control form-control-custom select2" name="user_id" data-placeholder="Chọn người phụ trách">
                        <option value=""></option>
                        @forelse($users as $item)
                        <option value="{{$item->id}}">{{$item->full_name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <select class="form-control form-control-custom" name="status_target">
                        <option value="">Chọn mức độ tự tin</option>
                        <option value="0">Không ổn lắm</option>
                        <option value="1">Ổn</option>
                        <option value="2">Rất tốt</option>
                    </select>
                    <select class="form-control form-control-custom" name="done">
                        <option value="">Chọn hoàn thành OKRs</option>
                        <option value="1">Hoàn thành</option>
                        <option value="0">Chưa hoàn thành</option>
                    </select>
                    {{--<select class="form-control form-control-custom" name="time_id">--}}
                        {{--<option value="">Trạng thái check-in</option>--}}
                        {{--<option value="1">Chưa check-in</option>--}}
                        {{--<option value="2">Check-in sai hạn</option>--}}
                        {{--<option value="3">Check-in đúng hạn</option>--}}
                    {{--</select>--}}
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="box response">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box response">
                                @include('okrs.objective.ajax')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click','.btnStatus',function () {
            let el = $(this);
            let id = el.data('id');
            let done = el.data('done');
            let status = $(this).attr('aria-pressed');
            let text = done == 1 ? 'Bạn có muốn huỷ hoàn thành OKRs' : 'Bạn có muốn hoàn thành OKRs';
            swal({
                title: text,
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                showCloseButton: true,
                onClose: () => {
                    this.DeleteUnsavedImages();
                }
            },function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "/update-done-okr",
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
                } else {
                    status == "false" ? el.addClass('active') : el.removeClass('active');
                }
            });

        })
    </script>
@endsection

