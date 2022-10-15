@extends('layouts.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Settings
                {{--<small>Control panel</small>--}}
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{$settings ? '/admin/settings/'.$settings->id : '/admin/settings' }}" method="post">
                @csrf
                @if($settings)
                    @method('put')
                @endif
                <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Header Title</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control header_title" name="header_title" type="text" value="{{$settings ? $settings->header_title : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Phone</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control phone" name="phone" type="text" value="{{$settings ? $settings->phone : ''}}" required data-validation-required-message="SDT không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Address</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control address" name="address" type="text" value="{{$settings ? $settings->address : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Text Footer</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control text_footer" name="text_footer" type="text" value="{{$settings ? $settings->text_footer : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control email" name="email" type="email" value="{{$settings ? $settings->email : ''}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control copyright" name="copyright" type="text" value="{{$settings ? $settings->copyright : ''}}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="box-footer flexbox">
                    <div class="text-right flex-grow">
                        <button class="btn btn-sm btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
    </script>
@endsection
