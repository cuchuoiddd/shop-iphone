@extends('layouts.master')
@section('head')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">
@endsection
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
            <form action="{{$settings ? '/admin/settings/'.$settings->id : '/admin/settings' }}" method="post" enctype="multipart/form-data">
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
                                <label class="col-sm-2 col-form-label required">Logo</label>
                                <div class="col-sm-10 controls">
                                    <input type="file" name="file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Text Content</label>
                                <div class="col-sm-10 controls">
                                    {{--<input class="form-control text_content" name="text_content" type="text" value="{{$settings ? $settings->text_content : ''}}">--}}
                                    <div class="box">
                                        <div class="box-body">
                                            <form>
                                                <textarea class="textarea" placeholder="Place some text here"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;
                                                    border: 1px solid #dddddd; padding: 10px;" name="text_content">
                                                    {{$settings ? $settings->text_content : ''}}
                                                </textarea>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.box -->
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
                        <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
    <!-- Minimalelite Admin for editor -->
    <script>
        $('.textarea').wysihtml5();
    </script>
@endsection
