<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="myForm" method="post" action="" novalidate>
            @csrf
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Họ và tên</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control full_name" name="full_name" type="text" required data-validation-required-message="Họ tên không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Tên đăng nhập</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control username" name="username" type="text" required data-validation-required-message="Tên đăng nhập không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Email</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control email" name="email" type="email" required data-validation-required-message="Email không được bỏ trống">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cấp trên</label>
                                <div class="col-sm-10 controls">
                                    <select name="parent_id" id="" class="form-control select2 parent_id" data-placeholder="Chọn cấp trên">
                                        <option value=""></option>
                                        @forelse($docs as $item)
                                            <option value="{{$item->id}}">{{$item->full_name}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10 controls">
                                    <input class="form-control phone" name="phone" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Phòng ban</label>
                                <div class="col-sm-10 controls">
                                    <select name="department_id" class="form-control select2 department_id" required
                                            data-validation-required-message="Phòng ban không được bỏ trống"
                                            data-placeholder="Chọn phòng ban"
                                    >
                                        <option value=""></option>
                                        @forelse($department as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label required">Vị trí công việc</label>
                                <div class="col-sm-10 controls">
                                    <select name="office_id" id="" class="form-control select2 office_id"  required
                                            data-validation-required-message="Vị trí không được bỏ trống"
                                            data-placeholder="Chọn vị trí"
                                    >
                                        <option value=""></option>
                                        @forelse($office as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phân quyền</label>
                                <div class="col-sm-10 controls">
                                    <select name="role_id" class="form-control role_id">
                                        <option value="{{\App\Constants\SettingConstant::ROLE_NHAN_VIEN}}">Nhân viên</option>
                                        <option value="{{\App\Constants\SettingConstant::ROLE_ADMIN}}">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 controls">
                                    <input type="checkbox" id="md_checkbox" name="status" class="filled-in chk-col-blue status">
                                    <label for="md_checkbox">Khoá tài khoản</label>

                                </div>
                            </div>
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