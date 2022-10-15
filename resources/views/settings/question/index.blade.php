@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Câu hỏi check-in
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
                    @include('settings.question.ajax')
                    @include('settings.question.modal')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click','.addQuestion',function () {
            resetValue();
            $('#myModal').modal('show');
        })

        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/settings/question/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.name').val(item.name);
            $('.position').val(item.position);
            $('#myModal').modal({show: true})
        });

        function resetValue() {
            let form = $('#myForm');
            form.attr('action', '/settings/question');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới').change();
            form.trigger('reset');
        }
    </script>
@endsection
