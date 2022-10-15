@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý công ty
                {{--<small>Control panel</small>--}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    {{--<select class="form-control form-control-custom select2" name="select">--}}
                        {{--<option selected="selected">Alabama</option>--}}
                        {{--<option>Alaska</option>--}}
                        {{--<option disabled="disabled">California (disabled)</option>--}}
                        {{--<option>Delaware</option>--}}
                        {{--<option>Tennessee</option>--}}
                        {{--<option>Texas</option>--}}
                        {{--<option>Washington</option>--}}
                    {{--</select>--}}
                    <input type="text" name="name" placeholder="Tên cty" class="form-control form-control-custom">
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    @include('settings.company.ajax')
                    @include('settings.company.modal')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click','.addCompany',function () {
            resetValue();
            $('#myModal').modal('show');
        })

        // edit
        $(document).on('click', '.edit', async function () {
            let item = $(this).data('item');
            let form = $('#myForm');
            form.attr('action', '/settings/company/' + item.id);
            $('#myModal #myModalLabel').html('Cập nhật công ty').change();
            form.append('<input name="_method" type="hidden" value="PUT" class="_method" />');

            $('.name').val(item.name);
            $('.phone').val(item.phone);
            $('.email').val(item.email);
            $('.description').val(item.description);
            $('#myModal').modal({show: true})
        });

        function resetValue() {
            let form = $('#myForm');
            form.attr('action', '/settings/company');
            $('._method').remove();
            $('#myModal #myModalLabel').html('Thêm mới công ty').change();
            form.trigger('reset');
        }
    </script>
@endsection
