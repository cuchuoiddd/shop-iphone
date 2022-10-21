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
                Quản lý Banner
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
                                        <th>Image</th>
                                        <th style="width: 100px">
                                            <span class="addCategory pointer"><i class="fa fa-plus"></i> THÊM</span>
                                        </th>
                                    </tr>
                                    @forelse($banners as $key => $item)
                                        <tr>
                                            <td>{{$key + 1}}.</td>
                                            <td><img src="{{$item->image}}" alt="ảnh banner" style="width:200px; height:100px;"> </td>
                                            <td>
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
                        <!-- /.box-body -->
                        <div class="box-footer clearfix custom-pagination">
                            {{--{{$products->links()}}--}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
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
                                <label class="col-sm-3 col-form-label required">Ảnh banner:</label>
                                <div class="col-sm-9 controls">
                                    <input type="file" class="form-control" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thứ tự hiển thị:</label>
                                <div class="col-sm-9 controls">
                                    <input class="form-control position" name="position" type="number">
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
        $('.addCategory').on('click', function () {
            let form = $('#myForm');
            form.attr('action', '/admin/banners');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới ảnh banner').change();
            form.trigger('reset');

            $('#myModal').modal('show');
        })
    </script>
@endsection
