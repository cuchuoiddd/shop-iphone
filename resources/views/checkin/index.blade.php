@extends('layouts.master')
@section('content')
    <style>
        .table-z-c2 tbody tr:not(:last-child) {
            border-bottom: 1px solid #dee2e6;
        }
        .tt-table div.tt {
            display: inline-block;
            position: relative;
        }
        .tt {
            width: 100%;
        }
        div.tt div.tail {
            width: 8px;
            height: 38px;
            left: -6px;
            border: 1px solid #707070;
            border-right: 0;
            border-top: 0;
            position: absolute;
            bottom: 11px;
            z-index: 0;
        }
        .content_1{
            position: relative;
            z-index: 10;
        }
        .content{
            min-height: auto;
        }
        .tt-table div.tt div.content1 {
            z-index: 10;
            position: relative;
            display: flex;
        }
        .table-z-c2-expand.root {
            border: 0;
        }
        .table-z-c2-expand {
            min-width: 26px;
            min-height: 26px;
            position: relative;
            margin-right: 1rem;
            background: transparent;
            border-radius: 26px;
        }
        .avatar-z-c2, .avatar-z-c3 {
            background-repeat: no-repeat;
            background-size: cover;
        }
        .avatar-z-c2 {
            border-radius: 50%;
            width: 26px;
            height: 26px;
            min-width: 26px;
            min-height: 26px;
            margin-top: auto;
            margin-bottom: auto;
        }
        .popup-c2 {
            position: absolute;
            bottom: 100%;
            left: 13px;
            display: none;
            background: #fff;
            z-index: 9999;
            min-width: 150px;
            height: auto;
            padding: 5px 10px;
            box-shadow: 0 1px 5px rgb(0 0 0 / 10%), 0 1px 5px rgb(0 0 0 / 10%);
        }
        .table-z-c2-col-3 {
            width: 30%;
        }
        .table-z-c2-col-1 a {
            color: #000;
        }
        .btn-z-c6-outline-secondary {
            border-color: #d6d6d6;
            background-color: #fff;
            color: #000;
        }
        .btn-z-c6 {
            height: 30px;
            border-radius: 30px;
            font-size: 14px;
            line-height: 16px;
            box-shadow: 0 1px 5px rgb(0 0 0 / 10%), 0 1px 5px rgb(0 0 0 / 10%);
        }
        .btn-z-block {
            width: 100%;
            display: block;
        }
        .x-progress {
            height: 10px;
            border-radius: 10px;
            background: #eee;
        }
        .progress-z-c1 {
            display: flex;
        }
        .progress-z-c1-body {
            width: 100%;
            margin: auto;
        }
        .progress-z-c1-footer {
            color: #010101;
            font-size: 14px;
            width: 50px;
            margin-left: 15px;
        }
        .table-z-c2-expand {
            min-width: 26px;
            min-height: 26px;
            position: relative;
            margin-right: 1rem;
            background: transparent;
            border-radius: 26px;
        }
        .table-z-c2-col-2 {
            min-width: 135px;
            width: 135px;
        }
        .table-z-c2 tbody td:not(:last-child) {
            padding-right: 1rem;
        }
        .table-z-c2-col-4 {
            min-width: 80px;
        }
        .position-2 .tt{
            left: 42px;
            width: calc(100% - 42px);
        }
        .position-3 .tt{
            left: 84px;
            width: calc(100% - 84px);
        }
        .position-4 .tt{
            left: 126px;
            width: calc(100% - 126px);
        }
        .position-5 .tt{
            left: 168px;
            width: calc(100% - 168px);
        }
        .position-6 .tt{
            left: 210px;
            width: calc(100% - 210px);
        }
        #modalCreateTarget .select2.select2-container,#modalEditTarget .select2.select2-container,#modalPhanHoi1 .select2.select2-container{
            width: 100% !important;
        }
        #modalShowTarget .modal-body{
            overflow: auto;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Checkin
                {{--<small>Control panel</small>--}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <select class="form-control form-control-custom select2" name="time_id" data-placeholder="Chọn chu kỳ">
                        <option value=""></option>
                        @forelse($times as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                        @endforelse
                    </select>
                    <select class="form-control form-control-custom select2" name="user_id" data-placeholder="Chọn nhân viên">
                        <option value=""></option>
                        @forelse($users as $item)
                            <option value="{{$item->id}}">{{$item->full_name}}</option>
                            @empty
                        @endforelse
                    </select>
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <input type="hidden" value="{{$user}}" class="currentUser">
                    {{--@include('checkin.ajax')--}}
                    @include('checkin.ajax')
                    @include('checkin.modal_checkin')
                    @include('checkin.modal_phan_hoi_1')
                    @include('checkin.modal_phan_hoi_2')
                    @include('checkin.modal_tong_ket')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).delegate('.showChildOkr','click',function () {
                let el = $(this).closest('tr');
                let id = el.data('id');
                let current_user = $('.currentUser').val();
                // current_user = JSON.parse(current_user);

                let position =  Number(el.data('position')) + 1;

                let check_class = el.hasClass('active');
                if (check_class) {
                    el.removeClass('active');
                    $('.right-' + id).show();
                    $('.down-' + id).hide();
                    $('.tree-'+id).remove();
                }else {
                    el.addClass('active');
                    $('.right-' + id).hide();
                    $('.down-' + id).show();
                    $.ajax({
                        url: `get-okr-child`,
                        data:{
                            id:id
                        },
                        success: function (data) {
                            if(data && data.length > 0){
                                let html = '';
                                data.forEach(f=>{
                                    console.log(3333,f);
                                    let html_1 = '';
                                    let add_class = el.attr('class') + ' ' + el.attr('id');
                                    add_class = add_class.replace('active','');
                                    let status_target = f.status_target == 0 ? "Không ổn lắm" : (f.status_target == 1 ? "Ổn" : "Rất tốt");
                                    let class_target = f.status_target == 0 ? "radio-col-red" : (f.status_target == 1 ? "radio-col-orange" : "radio-col-blue");
                                    let tongket = f.summary ? f.summary.scores : '';
                                    let avatar = f.user && f.user.avatar ? f.user.avatar : 'default.jpg';
                                    if(f.children.length > 0){
                                        html_1 = `<span style="padding: 5px" class="pointer showChildOkr"><i class="fa fa-15x fa-caret-right right-`+f.id+`"></i><i class="fa fa-sort-down fa-15x down-`+f.id+`" style="display: none"></i></span>`
                                    } else {
                                        html_1 = `<span></span>`
                                    }
                                    html+=`
                                <tr id="tree-`+f.id+`" class="table-z-c2-col-1 position-`+position+` `+add_class+`" data-position="`+position+`" data-id="`+f.id+`">
                                    <td>
                                        <div class="tt" data-tt-id="jacob" data-tt-parent="root">
                                            <div class="tail"></div>
                                                `+html_1+`
                                                <img src="/images/avatar/`+avatar+`" alt="" class="img-thumb mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="`+f.user.full_name+`">
                                                <span class="title">`+f.title+`</span>

                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-z-c6 btn-z-c6-outline-secondary btn-z-block btnViewKR" data-id="tree-2" data-okr_id="`+f.id+`">
                                            `+f.target.length+` Kết quả
                                        </button>
                                    </td>
                                    <td>
                                        <div class="progress-z-c1">
                                            <div class="progress-z-c1-body">
                                                <div class="progress x-progress c2x-progress">
                                                    <div class="progress-bar x-progress-bar c2x-progress-bar c-bg-success"
                                                         role="progressbar" style="width:  `+f.tien_do+`%" aria-valuenow="15" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-z-c1-footer"><span class="progressOkr">`+f.tien_do+`</span>%</div>
                                        </div>
                                    </td>
                                    <td class="text-success text-center">
                                        +`+f.thay_doi+`%
                                    </td>
                                    <td style="width:140px !important; min-width:140px;">
                                        <div class="demo-radio-button">
                                            <input type="radio" class="with-gap `+class_target+`" checked="">
                                            <label>`+status_target+`</label>
                                        </div>
                                    </td>
                                    <td class="text-success text-center">
                                        `+tongket+`
                                    </td>
                                    <td>
                                        <button class="btn btn-block btn-sm text-white `+showClassStatusOkr(f.status)+`" style="background-color: `+showColorOkr(f.status)+`" type="button" data-id="`+f.id+`">
                                            <i class="fa fa-map-marker"></i> `+showTextStatusOkr(f.status)+`
                                        </button>
                                    </td>
                                </tr>
                            `

                                })
                                // el.prepend(html);
                                el.after(html)
                                $('[data-toggle="tooltip"]').tooltip();
                            }
                        }
                    })
                }
            })
        })
    </script>
    @include('checkin.js.js_checkin')
    @include('checkin.js.js_phan_hoi_lan_1')
    @include('checkin.js.js_phan_hoi_lan_2')
    @include('checkin.js.js_tong_ket')
@endsection
