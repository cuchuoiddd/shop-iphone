@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Phản hồi, Ghi nhận
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
                    <div class="box response">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="nav nav-pills margin-bottom margin-top-10">
                                <li class=" nav-item"><a href="#navpills-1" class="nav-link active show"
                                                         data-toggle="tab" aria-expanded="false">Phản hồi</a></li>
                                <li class="nav-item"><a href="#navpills-2" class="nav-link" data-toggle="tab"
                                                        aria-expanded="false">Ghi nhận</a></li>
                            </ul>
                            <div class="tab-content">
                                <input type="hidden" class="valueTimes" value="{{$times}}">
                                <input type="hidden" class="valueOkrs" value="{{$okrs}}">
                                <div id="navpills-1" class="tab-pane active show">
                                    @include('okrs.cfrs.phan_hoi')
                                </div>
                                <div id="navpills-2" class="tab-pane">
                                    @include('okrs.cfrs.ghi_nhan')
                                </div>
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
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $("select.select2").select2({
                tags: true
            })
        })

        $('.changePH').on('change', function () {
            if ($(this).val() == 1) {
                $('.toggle-type_PH .form-group.row').remove();
            } else {
                let html = getHTML();
                $('.toggle-type_PH').append(html);
                loadJsAfterCallAjax();
            }
        })

        $('.changeGN').on('change', function () {
            if ($(this).val() == 1) {
                $('.toggle-type_GN .form-group.row').remove();
            } else {
                let html = getHTML();
                $('.toggle-type_GN').append(html);
                loadJsAfterCallAjax();
            }
        })

        function getHTML() {
            let data_time = $('.valueTimes').val();
            let data_okr = $('.valueOkrs').val();

            let times = '';
            let okrs = '';
            data_time = JSON.parse(data_time);
            data_okr = JSON.parse(data_okr);

            if(data_time.length > 0){
                data_time.forEach(f=>{
                    times+=`
                        <option value="`+f.id+`">`+f.name+`</option>
                    `
                })
            }
            if(data_okr.length > 0){
                data_okr.forEach(f=>{
                    okrs+=`
                        <option value="`+f.id+`">`+f.title+`</option>
                    `
                })
            }


            let html = `
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label required">Chu kỳ</label>
                        <div class="col-sm-10 controls">
                            <select name="time_id" class="form-control select2" required
                                    data-validation-required-message="Chu kỳ không được bỏ trống"
                                    data-placeholder="Chọn chu kỳ"
                            >
                                <option></option>
                                ` + times + `
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label required">OKRs</label>
                    <div class="col-sm-10 controls">
                        <select name="okr_id" class="form-control select2" required
                                data-validation-required-message="Okr không được bỏ trống"
                                data-placeholder="Chọn okr"
                        >
                            <option></option>
                            ` + okrs + `
                            </select>
                        </div>
                    </div>
                `
            return html;
        }
    </script>
@endsection

