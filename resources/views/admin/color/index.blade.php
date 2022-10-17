@extends('layouts.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý màu sắc
                {{--<small>Control panel</small>--}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="box response">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên màu</th>
                                        <th>Mã màu</th>
                                        <th style="width: 100px">
                                            <span class="addColor  pointer"><i class="fa fa-plus"></i> THÊM</span>
                                        </th>
                                    </tr>
                                    @forelse($colors as $key => $item)
                                        <tr>
                                            <td>{{$key + 1}}.</td>
                                            <td>{{$item->color_name}}</td>
                                            <td>
                                                {{$item->color_code}} &emsp;
                                                <input style="width: 100px; height: 35px;" type="color" value="{{$item->color_code}}">
                                            </td>
                                            <td>
                                                <span class="pointer edit mr-1" data-item="{{$item}}"><i class="fa fa-edit fa-15x" aria-hidden="true"></i></span>
                                                <span class="pointer delete" data-id="{{$item->id}}"><i class="fa fa-trash-o fa-15x" aria-hidden="true"></i></span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">Không có bản ghi nào !</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
                                <label class="col-sm-3 col-form-label required">Tên màu</label>
                                <div class="col-sm-9 controls">
                                    <input class="form-control color_name" name="color_name" type="text" required data-validation-required-message="Tên màu không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label required">Mã màu</label>
                                <div class="col-sm-9 controls">
                                    <input class="form-control color_code" name="color_code" type="text" required data-validation-required-message="Mã màu không được bỏ trống" placeholder="Ví dụ: #fff">
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
        $('.addColor').on('click', function () {
            let form = $('#myForm');
            form.attr('action', '/admin/colors');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới màu sắc').change();
            form.trigger('reset');

            $('#myModal').modal('show');
        })


        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/admin/colors/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.color_name').val(item.color_name);
            $('.color_code').val(item.color_code);
            $('#myModal').modal({show: true});
        });
    </script>
@endsection
