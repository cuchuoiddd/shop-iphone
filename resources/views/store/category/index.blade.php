@extends('layouts.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý danh mục
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
                    @include('store.category.ajax')
                </div>
            </div>

        </section>
        <!-- /.content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="myForm" method="post" action="" novalidate>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Tên danh mục</label>
                                <div class="col-sm-9 controls">
                                    <input class="form-control name" name="name" type="text" required data-validation-required-message="Họ tên không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả</label>
                                <div class="col-sm-9 controls">
                                    <textarea name="description" id="" cols="30" rows="4" class="form-control description"></textarea>
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
        $('.addCategory').on('click',function () {
            let form = $('#myForm');
            form.attr('action', '/store/categories');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới danh mục').change();
            form.trigger('reset');

            $('#myModal').modal('show');
        })


        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/store/categories/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.name').val(item.name);
            $('.description').val(item.description);
            $('#myModal').modal({show: true});
        });
    </script>
@endsection
