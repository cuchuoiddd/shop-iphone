@extends('layouts.master')
@section('head')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-switch/switch.css')}}">
@endsection
@section('content')
    <style>
        .btn-delete {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 10;
        }

        .box-body {
            position: relative;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý OKRs
            </h1>
            {{--<form id="gridForm" action="{{url()->current()}}">--}}
                {{--<div class="search-custom">--}}
                    {{--<input type="text" name="name" placeholder="Từ khoá tìm kiếm"--}}
                           {{--class="form-control form-control-custom">--}}
                    {{--<button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>--}}
                        {{--Tìm kiếm--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <form id="myForm" method="post" action="{{url()->current()}}" novalidate>
                        @csrf
                        <div class="box response">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Chu kỳ</label>
                                <div class="col-sm-10 controls">
                                    <select name="time_id" class="select2 form-control time_id" required
                                            data-validation-required-message="Chu kỳ không được bỏ trống"
                                            data-placeholder="Chọn chu kỳ"
                                    >
                                        <option></option>
                                        @forelse($times as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label ">OKRs cấp trên</label>
                                <div class="col-sm-10 controls">
                                    <select name="parent_okr_id" class="select2 form-control"
                                            data-placeholder="Chọn okr cấp trên"
                                    >
                                        <option></option>
                                        @forelse($okr_parent as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Mục tiêu của bạn</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control title" name="title" type="text" required
                                           data-validation-required-message="Mục tiêu không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Chọn ngày checkin</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control datepicker" name="next_checkin" type="text" required
                                           data-validation-required-message="Ngày checkin không được bỏ trống" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10 controls formAdd">
                                    <div class="box">
                                        <div class="box-body">
                                            <button type="button" data-id="45" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="required">Kết quả chính</label>
                                                        <input type="text" name="name[]" class="form-control" required
                                                               data-validation-required-message="Kết quả không được bỏ trống">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="required">Mục tiêu</label>
                                                        <input type="text" name="target[]" class="form-control formatNumber" required
                                                               data-validation-required-message="Kết quả không được bỏ trống">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label class="required">Đơn vị</label>
                                                        <select name="unit_id[]" class="select2 form-control unit_id" required
                                                                data-validation-required-message="Đơn vị không được bỏ trống"
                                                                data-placeholder="Chọn đơn vị"
                                                        >
                                                            @forelse($units as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Link kế hoạch</label>
                                                        <input type="text" name="link_okr[]" class="form-control" placeholder="Link google sheet, nếu có">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Link kết quả</label>
                                                        <input type="text" name="link_result[]" class="form-control" placeholder="Link google sheet, nếu có">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Kết quả chính liên quan (Cấp trên)</label>
                                                        <select name="parent_id[0][]" class="select2 form-control"
                                                            data-placeholder="Chọn kết quả chính liên quan" multiple
                                                        >
                                                            @forelse($target_okr as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @empty
                                                            @endforelse

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10 controls">
                                    <span class="pointer addResult"><i class="fa fa-plus"></i> <b>Thêm Kết quả chính</b></span>
                                    <input type="hidden" value="{{$units}}" class="dataUnit">
                                    <input type="hidden" value="{{$target_okr}}" class="dataTargetOkr">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">OKRs liên kết chéo</label>
                                <div class="col-sm-5 controls">
                                    <div class="box listMapping">
                                        <div class="box-body">
                                            <select name="mapping_okr_id[]" class="select2 form-control"
                                                data-placeholder="Okr liên kết chéo"
                                            >
                                                <option value=""></option>
                                                @forelse($okr_mappings as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 controls">
                                    <span class="pointer addMapping"><i class="fa fa-plus"></i> <b>Thêm OKRs liên kết chéo</b></span>
                                    <input type="hidden" value="{{$okr_mappings}}" class="dataOkrMapping">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Hiển thị</label>
                                <div class="col-sm-10 controls">
                                    <div class="demo-radio-button">
                                        <input name="public" type="radio" value="0" id="radio_7" class="radio-col-red" checked="">
                                        <label for="radio_7">Công khai</label>
                                        <input name="public" type="radio" value="1" id="radio_9" class="radio-col-yellow">
                                        <label for="radio_9">Riêng tư</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Chia sẻ OKRs với</label>
                                <div class="col-sm-10 controls">
                                    <select name="share_okr[]" class="select2 form-control" multiple>
                                        @forelse($users as $item)
                                            <option value="{{$item->id}}">{{$item->full_name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary">Lưu lại</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    @include('okrs.okr.script')
@endsection
