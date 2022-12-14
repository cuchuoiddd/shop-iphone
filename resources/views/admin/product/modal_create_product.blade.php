<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="myForm" method="post" action="" novalidate enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Thêm mới sản phẩm</h4>
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
                                    class="select2 form-control">
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
                            <select name="capacity_id" id="" class="form-control select2">
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
                            <div class="box">
                                <div class="box-body">
                                    <button type="button" data-id="45" class="btn-delete btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">Chọn màu</label>
                                                <select name="color_id[]" class="form-control select2" id="">
                                                    @forelse($colors as $item)
                                                        <option value="{{$item->id}}">{{$item->color_name}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="">Giá máy mới</label>
                                                <input type="text" name="new_price[]"
                                                       class="form-control formatNumber">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="">Giá máy cũ</label>
                                                <input type="text" name="old_price[]"
                                                       class="form-control formatNumber">
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
                            <span class="pointer addResult"><i class="fa fa-plus"></i> <b>Thêm Màu</b></span>
                            <input type="hidden" value="{{$colors}}" class="dataColor">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 controls">
                            <input type="checkbox" id="md_checkbox" name="sim_free" value="1"
                                   class="filled-in chk-col-blue sim_free">
                            <label for="md_checkbox">Sim Free</label>

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