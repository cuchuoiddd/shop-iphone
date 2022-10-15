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
                                <label class="required">Tên phòng ban</label>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control name" required data-validation-required-message="Tên phòng ban không được bỏ trống">
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control description" name="description" cols="30" rows="4"></textarea>
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