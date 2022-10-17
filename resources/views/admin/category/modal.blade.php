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
                            {{--<div class="form-group">--}}
                                {{--<label>Tên cty</label>--}}
                                {{--<input type="text" class="form-control" required--}}
                                       {{--data-validation-required-message="Tên cty không được bỏ trống">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="required">Tên danh mục</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control name" required data-validation-required-message="Tên danh mục không được bỏ trống">
                                </div>

                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select name="parent_id" id="" class="parent_id select2 form-control" data-placeholder="Chọn danh mục cha">
                                    <option></option>
                                    @forelse($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                    @endforelse
                                </select>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="required">Vị trí hiển thị</label>
                                <div class="controls">
                                    <input type="number" name="position" class="form-control position">
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
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