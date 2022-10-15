@extends('layouts.master')
@section('head')
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap-switch/switch.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Đổi thưởng
                <small>Số sao bạn có ({{$total_star_con_lai}} <i class="fa fa-star text-yellow"></i>)</small>
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <select name="category_id" data-placeholder="Chọn danh mục" class="select2 form-control">
                        <option value=""></option>
                        @forelse($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <input type="text" name="name" placeholder="Từ khoá tìm kiếm"
                           class="form-control form-control-custom">
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">
            @if (session('message'))
                <x-alert :type="session('type')" :message="session('message')" class="mb-4"/>
            @endif
            <div class="row">
                <div class="col-12">
                    @include('store.reward_exchange.ajax')
                </div>
            </div>

        </section>
        <!-- /.content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <form id="myForm" method="post" action="{{route('orders.store')}}" novalidate>
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Xác nhận đổi quà</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <img src="" alt="" class="thumbnail img-thumbnail">
                                </div>
                                <div class="col-12">
                                    <h5 class="name" style="color: coral">Tên sản phẩm</h5>
                                </div>
                                <div class="col-12">
                                    <p class="description">Giới thiệu sản phẩm</p>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3" style="display: flex;align-items: center; width: 62%">
                                        <span>Số lượng:</span> &emsp;
                                        <div class="input-group-prepend">
                                            <button class="btn btn-default btn-sm" id="minus-btn"><i
                                                        class="fa fa-minus"></i></button>
                                        </div>
                                        <input type="number" id="qty_input" class="form-control form-control-sm"
                                               value="1" min="1" style="background: #fff;height: 30px;" name="quantity" readonly>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-default btn-sm" id="plus-btn"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        &emsp;
                                        <span><span class="quantity bold">222</span> sản phẩm</span>
                                    </div>
                                </div>
                                <div class="col-12 mt-1">
                                    <p>Tổng sao: <span class="totalRate bold">30</span> <i class="fa fa-star text-yellow"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" class="product_id" name="product_id">
                            <input type="hidden" class="rate" name="rate">
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Huỷ</button>
                            <button type="submit" class="btn btn-primary float-right">Đổi quà</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        let curent_rate = 0;

        $(document).on('click','.addOrder', function () {
            let item = $(this).data('item');

            $('.name').html(item.name);
            $('.description').html(item.description);
            $('.thumbnail').attr('src','/images/product/'+item.thumbnail);
            $('.product_id').val(item.id);
            $('.totalRate').html(item.rate);
            $('.quantity').html(item.quantity);
            $('.rate').val(item.rate);
            curent_rate = item.rate;
            $('#myModal').modal('show');
        })


        $('#plus-btn').click(function (e) {
            e.preventDefault();
            let value = parseInt($('#qty_input').val()) + 1;
            $('.totalRate').html(value*curent_rate);
            $('#qty_input').val(value);

        });
        $('#minus-btn').click(function (e) {
            e.preventDefault();
            let value = parseInt($('#qty_input').val()) - 1;
            $('#qty_input').val(value);
            $('.totalRate').html(value*curent_rate);

            if ($('#qty_input').val() == 0) {
                $('#qty_input').val(1);
                $('.totalRate').html(curent_rate);
            }
        });


    </script>
@endsection
