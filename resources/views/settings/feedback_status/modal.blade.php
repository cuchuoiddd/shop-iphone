<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="myForm" method="post" action="" novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Medium model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="required">Tên tiêu chí</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control name" required
                                           data-validation-required-message="Tên chu kỳ không được bỏ trống">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Loại tiêu chí</label>
                                <div class="controls">
                                    <select name="type" id="" class="form-control type">
                                        <option value="0" >Check-in</option>
                                        <option value="1" >Ghi nhận</option>
                                        <option value="2" >Phản hồi khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label>Số sao</label>
                                <div class="controls">
                                    <input type="number" name="rate" class="rate form-control pull-right">
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Chọn phòng ban</label>
                                <div class="controls">
                                    <select name="department_id" id="" class="form-control select2 department_id" data-placeholder="Chọn phòng ban">
                                        <option value=""></option>
                                        @forelse($departments as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <div class="controls">
                                    <textarea name="description" class="form-control description" id="" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Thứ tự hiển thị</label>
                                <div class="controls">
                                    <input type="number" name="position" class="position form-control pull-right">
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