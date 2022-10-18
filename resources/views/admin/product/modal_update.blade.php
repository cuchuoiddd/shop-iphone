<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="FormEdit" method="post" action="" novalidate enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cập nhật sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label required">Tên sản phẩm:</label>
                        <div class="col-sm-4 controls">
                            <input class="form-control name" name="name" type="text" required
                                   data-validation-required-message="Tên sp không được bỏ trống">
                        </div>
                        <label class="col-sm-2 col-form-label">Chọn danh mục:</label>
                        <div class="col-sm-4 controls">
                            <select name="category_id" id="category_id" data-placeholder="Chọn danh mục"
                                    class="select2 form-control category_id">
                                <option value=""></option>
                                @forelse($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hình ảnh:</label>
                        <div class="col-sm-4 controls">
                            <input type="file" class="form-control" name="file">
                        </div>
                        <label class="col-sm-2 col-form-label">Dung lượng:</label>
                        <div class="col-sm-4 controls">
                            <select name="capacity_id" id="" class="form-control select2 capacity_id">
                                @forelse($capacities as $item)
                                    <option value="{{$item->id}}">{{$item->capacity}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10 controls formAdd">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10 controls">
                            <span class="pointer addResult"><i class="fa fa-plus"></i> <b>Thêm Màu</b></span>
                            <input type="hidden" value="{{$colors}}" class="dataColor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 controls">
                            <input type="checkbox" id="md_checkbox1" name="sim_free" value="1"
                                   class="filled-in chk-col-blue sim_free">
                            <label for="md_checkbox1">Sim Free</label>

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