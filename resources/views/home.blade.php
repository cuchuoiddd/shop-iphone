<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container-custom">
    <div class="text-header">
        <img src="{{url('/images/demo/Group9.png')}}" alt="">
        <p class="fz-12 bold">スマホ・iPhone・ゲーム機なら、高価買取に自信あり！</p>
    </div>
    <div class="header">
        <div class="row row-custom">
            <div class="col-5 p-0 d-flex">
                <nav class="navbar navbar-dark">
                    <div class="">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                            <img src="{{url('images/demo/Frame.png')}}" alt="">
                        </button>
                        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                             aria-labelledby="offcanvasDarkNavbarLabel">
                            <div class="offcanvas-header">
                                <div class="offcanvas-title w-100" id="offcanvasDarkNavbarLabel">
                                    <p class="text-white fz-18 text-title">Chọn loại sản phẩm</p>
                                </div>
                            </div>
                            <div class="offcanvas-body fz-18">
                                <div class="list-group">
                                    <div href="#" class="list-group-item list-group-item-action position-relative parent active">
                                        <span class="fz-18">A second link item
                                            <img src="{{url('images/demo/right1.png')}}" alt="" style="display: none">
                                            <img src="{{url('images/demo/top.png')}}" alt="" style="display: block">
                                        </span>
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action child">Iphone 14 Pro Max
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action child">Iphone 14</a>
                                            <a href="#" class="list-group-item list-group-item-action child">Iphone 14 Plus</a>
                                            <a href="#" class="list-group-item list-group-item-action child">Iphone 14</a>
                                        </div>
                                    </div>
                                    <div href="#" class="list-group-item list-group-item-action position-relative d-flex align-items-center parent">
                                        <span class="fz-18">A fourth link item
                                            <img src="{{url('images/demo/right1.png')}}" alt="">
                                            <img src="{{url('images/demo/top.png')}}" alt="" style="display: none">

                                        </span>
                                    </div>
                                    <div href="#" class="list-group-item list-group-item-action position-relative d-flex align-items-center parent">
                                        <span class="fz-18">A fourth link item
                                            <img src="{{url('images/demo/right1.png')}}" alt="">
                                            <img src="{{url('images/demo/top.png')}}" alt="" style="display: none">

                                        </span>
                                    </div>
                                    <div href="#" class="list-group-item list-group-item-action position-relative d-flex align-items-center parent">
                                        <span class="fz-18">A fourth link item
                                            <img src="{{url('images/demo/right1.png')}}" alt="">
                                            <img src="{{url('images/demo/top.png')}}" alt="" style="display: none">

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="logo">
                    <img src="{{url('images/demo/logo.png')}}" alt="">
                </div>
            </div>
            <div class="col-7 p-0 align-self-center">
                <div class="info">
                    <div class="phone">
                        <img src="{{url('images/demo/phone.png')}}" alt="">
                        <span class="text-white fz-13">050-3196-8661</span>
                    </div>
                    <div class="address d-flex align-items-start">
                        <img src="{{url('images/demo/address.png')}}" alt="">
                        <span class="text-white fz-13">116-0014東京都荒川区東日暮 6-46-11 フアーストクビル201</span>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="banner-slide position-relative">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{url('/images/demo/Group1.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('/images/demo/Group9.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('/images/demo/Group1.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <img src="{{url('/images/demo/left_small.png')}}" alt="">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <img src="{{url('/images/demo/right_small.png')}}" alt="">
            </button>
        </div>
    </div>
    <div class="text-content">
        <p class="fz-13 text-danger font-thin">
            新品iphoneの保証期間が残り8ケ月未満の場合は減額となります！
            スムーズに買取するポイント:バッテリー20％以上にする
            ※ネットワーク利用制限については,△の場合が減額となります。
        </p>
    </div>
    <div class="filter">
        <ul class="list-group list-group-horizontal justify-content-center">
            {{--<li class="list-group-item fz-14 bold active">すべて</li>--}}
            <li class="list-group-item fz-14">
                <img src="{{url('/images/demo/l1.png')}}" alt="">
            </li>
            <li class="list-group-item fz-14 bold">128BG</li>
            <li class="list-group-item fz-14 bold">128BG</li>
            <li class="list-group-item fz-14 bold">128BG</li>
            <li class="list-group-item fz-14 bold">128BG</li>
        </ul>
    </div>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 item">
                    <div class="row">
                        <div class="image">
                            <img src="{{url('/images/demo/ip14.png')}}" width="126" height="126" alt="">
                        </div>
                        <div class="name fz-14 font-medium">Iphone 14 Pro Max
                            128GB</div>
                        <div class="dung-luong">
                            <span class="sim-free fz-12">Simfree未開封</span>
                            <span class="price fz-12">128GB</span>
                        </div>
                        <div class="row new-price">
                            <div class="col-4 fz-14">新品</div>
                            <div class="col-8 fz-16">169,000円</div>
                        </div>
                        <div class="row old-price">
                            <div class="col-4 fz-14">中古</div>
                            <div class="col-8 fz-16">	114,000円</div>
                        </div>
                        <div class="color">
                            <span class="font-medium" style="color: #4f4f4f">Màu</span>
                            <span>Đen</span>
                        </div>
                        <div class="color-code"></div>
                    </div>
                </div>
                <div class="col-6 col-md-4 item">Ngon ngay</div>
                <div class="col-6 col-md-4 item">Ngon ngay</div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>
<script src="{{asset('js/script.js')}}"></script>
</html>