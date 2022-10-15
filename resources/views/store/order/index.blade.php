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
                Danh sách đổi quà
                {{--<small>Control panel</small>--}}
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
                    @include('store.order.ajax')
                </div>
            </div>

        </section>
        <!-- /.content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="myForm" method="post" action="" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Tên sản phẩm</label>
                                <div class="col-sm-9 controls">
                                    <input class="form-control name" name="name" type="text" required data-validation-required-message="Tên sp không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chọn danh mục</label>
                                <div class="col-sm-9 controls">
                                    <select name="category_id" id="" data-placeholder="Chọn danh mục" class="select2 form-control">
                                        <option value=""></option>
                                        @forelse($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hình ảnh</label>
                                <div class="col-sm-9 controls">
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số sao</label>
                                <div class="col-sm-9 controls">
                                    <input type="number" class="form-control rate" name="rate">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số lượng nhập kho</label>
                                <div class="col-sm-9 controls">
                                    <input type="number" class="form-control quantity" name="quantity">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thứ tự sắp xếp</label>
                                <div class="col-sm-9 controls">
                                    <input type="number" class="form-control position" name="position">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 controls">
                                    <input type="checkbox" id="md_checkbox" name="status" value="1" class="filled-in chk-col-blue status">
                                    <label for="md_checkbox">Hiển thị</label>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary float-right">Save changes</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script>

        $(document).on('click','.btnStatus',function () {
            let el = $(this);
            let id = el.data('id');
            let status = $(this).attr('aria-pressed');

            $.ajax({
                url: "/update-status-order",
                data: {id: id,status:status},
                method: 'put',
                success: function (data) {
                    if (data && data.success == 1){
                        swal({
                            title: 'Xác nhận đơn hàng thành công',
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
    </script>
@endsection
