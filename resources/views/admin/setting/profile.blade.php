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
        .cmt .image {
            position: relative;
        }
        .cmt img {
            width: 213px;
            height: 213px;
            border-radius: 50%;
            -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
            box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
        }
        .cmt .pen {
            position: absolute;
            border-radius: 50%;
            border: none;
            background-color: #fff;
            -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
            box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
            width: 34px;
            height: 34px;
            bottom: 5%;
            right: 11%;
        }
        .cmt .pen img {
            width: 18px;
            height: 18px;
            border-radius: unset;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .cmt img {
            width: 213px;
            height: 213px;
            border-radius: 50%;
            -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
            box-shadow: 0 4px 12px rgb(0 0 0 / 13%);
        }
        .select-material{
            border: none !important;
        }
        .profile-user-img{
            height: 180px;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{isset($change_password) ? 'Đổi mật khẩu' : 'Thông tin tài khoản'}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <input type="text" name="name" placeholder="Từ khoá tìm kiếm"
                           class="form-control form-control-custom">
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>
        @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')" class="mb-4"/>
        @endif
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xl-3 col-lg-4">

                    <!-- Profile Image -->
                    <div class="box bg-dark">
                        <div class="box-body box-profile">
                            @if($user->avatar)
                                {{--<img id="blah" src="{{url('/images/avatar/'.$user->avatar)}}" alt="">--}}
                                <img class="profile-user-img rounded-circle img-fluid mx-auto d-block"
                                     src="{{url('/images/avatar/'.$user->avatar)}}" alt="User profile picture">
                            @else
                                <img class="profile-user-img rounded-circle img-fluid mx-auto d-block"
                                     src="{{url('/images/avatar/default.jpg')}}" alt="User profile picture">
                            @endif
                            {{--<img class="profile-user-img rounded-circle img-fluid mx-auto d-block"--}}
                                 {{--src="{{url('/images/image_74.png')}}" alt="User profile picture">--}}

                            <h3 class="profile-username text-center">{{$user->full_name}}</h3>

                            {{--<p class="text-white text-center">{{$user->email}}</p>--}}

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-xl-9 col-lg-8">
                        <div >
                            <form class="col-12" id="formUpdatePass" method="post" action="{{url('/admin/update-password')}}" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 control-label">Mật khẩu cũ</label>

                                    <div class="col-sm-10 controls">
                                        <input type="password" name="old_password" class="form-control" required data-validation-required-message="Không được bỏ trống">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 control-label">Mật khẩu mới</label>

                                    <div class="col-sm-10 controls">
                                        <input type="password" name="new_password" class="form-control new_password" required data-validation-required-message="Không được bỏ trống">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPhone" class="col-sm-2 control-label">Nhập lại mật khẩu</label>

                                    <div class="col-sm-10 controls">
                                        <input type="password" name="re_password" class="form-control re_password" required data-validation-required-message="Không được bỏ trống">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="ml-auto col-sm-10">
                                        <button type="submit" class="btn btn-success updatePass">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.pen', function (e) {
            e.preventDefault();
            $('#imgInp').click();
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#imgInp").change(function () {
            readURL(this);
        });

        $('.updatePass').on('click',function (e) {
            e.preventDefault();
            if($('.new_password').val() !==$('.re_password').val()){
                alertify.error('Mật khẩu không trùng nhau');
            } else {
                $('#formUpdatePass').submit();
                console.log(1);
            }
        })

    </script>
@endsection
