<form id="myForm" method="post" action="{{url()->current()}}" novalidate>
    @csrf
    <div class="row">
        <div class="col-7">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Loại ghi nhận</label>
                <div class="col-sm-10 controls">
                    <select name="type" class="form-control changeGN">
                        <option value="0">OKRs</option>
                        <option value="1">Khác</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Người được ghi nhận</label>
                <div class="col-sm-10 controls">
                    <select name="user_cfrs" class="form-control select2" required
                            data-validation-required-message="Người được ghi nhận không được bỏ trống"
                            data-placeholder="Chọn người phản hồi">
                        <option value=""></option>
                        @forelse($users as $item)
                            <option value="{{$item->id}}">{{$item->full_name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>

            <span class="toggle-type_GN">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label required">Chu kỳ</label>
                    <div class="col-sm-10 controls">
                        <select name="time_id" class="form-control select2" required
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
                    <label class="col-sm-2 col-form-label required">OKRs</label>
                    <div class="col-sm-10 controls">
                        <select name="okr_id" class="form-control select2" required
                                data-validation-required-message="Okr không được bỏ trống"
                                data-placeholder="Chọn okr"
                        >
                            <option></option>
                            @forelse($okrs as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </span>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Tiêu chí</label>
                <div class="col-sm-10 controls">
                    <select name="feedback_status_id" class="form-control select2" required
                            data-validation-required-message="Tiêu chí không được bỏ trống"
                            data-placeholder="Chọn tiêu chí"
                    >
                        <option></option>
                        @forelse($secognition as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label required">Nội dung</label>
                <div class="col-sm-10 controls">
                <textarea name="content" rows="4" class="form-control"
                          required data-validation-required-message="Nội dung không được bỏ trống"></textarea>
                </div>
            </div>
            <input type="hidden" name="type_cfrs" value="1">
        </div>
        <div class="col-5">

        </div>


    </div>
    <div class="box-footer">
        <button class="btn btn-primary">Lưu lại</button>
    </div>

</form>
