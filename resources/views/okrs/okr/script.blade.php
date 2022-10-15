<script>
    $('.addResult').on('click',function () {
        let keyClick = $('.formAdd .box').length;
        let data_html = '';
        let data = $('.dataUnit').val();
        data = JSON.parse(data);
        if(data.length > 0){
            data.forEach(f=>{
                data_html+=`
                        <option value="`+f.id+`">`+f.name+`</option>
                    `
            })
        }

        let data_html_parent = '';
        let data_parent = $('.dataTargetOkr').val();
        data_parent = JSON.parse(data_parent);
        if(data_parent.length > 0){
            data_parent.forEach(fe=>{
                data_html_parent+=`
                        <option value="`+fe.id+`">`+fe.name+`</option>
                    `
            })
        }

        let html = `
            <div class="box">
                <div class="box-body">
                    <button type="button" data-id="45" class="btn-delete btn btn-danger"><i class="fa fa-trash"></i></button>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="required">Kết quả chính</label>
                                <input type="text" name="name[]" class="form-control" required
                                       data-validation-required-message="Kết quả không được bỏ trống">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="required">Mục tiêu</label>
                                <input type="text" name="target[]" class="form-control formatNumber" required
                                       data-validation-required-message="Kết quả không được bỏ trống">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="required">Đơn vị</label>
                                <select name="unit_id[]" class="select2 form-control unit_id" required
                                        data-validation-required-message="Đơn vị không được bỏ trống"
                                        data-placeholder="Chọn đơn vị"
                                >
                                    <option></option>
                                    `+data_html+`
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Link kế hoạch</label>
                                <input type="text" name="link_okr[]" class="form-control" placeholder="Link google sheet, nếu có">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Link kết quả</label>
                                <input type="text" name="link_result[]" class="form-control" placeholder="Link google sheet, nếu có">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kết quả chính liên quan (Cấp trên)</label>
                                <select name="parent_id[`+keyClick+`][]" class="select2 form-control" multiple
                                    data-placeholder="Chọn quả chính liên quan"
                                >
                                    <option value=""></option>
                                    `+data_html_parent+`
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `

        $('.formAdd').append(html);
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        $('.select2').select2();

    })
    
    $('.addMapping').on('click',function () {
        let data_html = '';
        let data = $('.dataOkrMapping').val();
        data = JSON.parse(data);
        if(data.length > 0){
            data.forEach(f=>{
                data_html+=`
                        <option value="`+f.id+`">`+f.title+`</option>
                    `
            })
        }
        console.log(12313,data_html);

        let html = `
                <div class="box-body">
                    <select name="mapping_okr_id[]" id="" class="select2 form-control"
                            data-placeholder="Okr liên kết chéo"
                    >
                        <option></option>
                        `+data_html+`
                    </select>
                </div>
            `

        $('.listMapping').append(html);
        $('.select2').select2();
    })

    $(document).delegate('.btn-delete','click',function (e) {
        let parent = $(this).parent();
        let id = $(this).data('id');
        let html = `<input type="hidden" name="delete_target[]" value="`+id+`">`;
        $('.box-footer').append(html);
        parent.remove();
    })
</script>