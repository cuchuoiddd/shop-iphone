@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Danh mục
                {{--<small>Control panel</small>--}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    @include('admin.category.ajax')
                    @include('admin.category.modal')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click','.addCategory',function () {
            resetValue();
            $('#myModal').modal('show');
        })

        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/admin/categories/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật Danh mục').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.name').val(item.name);
            if(item.parent_id){
                $('.parent_id').val(item.parent_id).change();
            }
            $('.position').val(item.position);
            $('#myModal').modal({show: true})
        });

        function resetValue() {
            let form = $('#myForm');
            form.attr('action', '/admin/categories');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới Danh mục').change();
            form.trigger('reset');
        }
    </script>
@endsection
