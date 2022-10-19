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
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    {{--<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/css/docs.theme.min.css">--}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container-custom">
    <div class="text-header">
        <img src="{{url('/images/demo/Group9.png')}}" alt="">
        <p class="fz-12 font-medium">スマホ・iPhone・ゲーム機なら、高価買取に自信あり！</p>
    </div>
    <div class="header-mobile d-none">
        <div class="row row-custom">
            <div class="col-5 d-flex padding-custom">
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
                            @include('home.menu_bar')
                        </div>
                    </div>
                </nav>
                <div class="logo">
                    <img src="{{url('images/demo/logo1.png')}}" style="height: 94px;" alt="">
                </div>
            </div>
            <div class="col-7 align-self-center">
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
    <div class="header d-none d-sm-block">
        <div class="row align-items-center" style="height: 100%;">
            <div class="col-1"></div>
            <div class="col-4"><img src="{{url('/images/demo/logo1.png')}}" alt=""></div>
            <div class="col-2 d-flex align-items-center">
                <img class="me-2" src="{{url('/images/demo/phone.png')}}" alt="" />
                <span class="text-white fz-16">050-3196-8661</span>

            </div>
            <div class="col-5 d-flex align-items-center">
                <img class="me-2" src="{{url('/images/demo/address.png')}}" alt="">
                <span class="text-white fz-16">116-0014東京都荒川区東日暮里6-46-11 フアーストクビル201</span>
            </div>
        </div>
    </div>

    <div class="banner-slide-moblie position-relative d-none">
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

    <div class="agdsg banner-slide d-none d-sm-block">
        <div class="owl-carousel">
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
            <div><img src="{{url('images/demo/Group1.png')}}" style="width: 1089px;height: 334px" alt=""></div>
        </div>
    </div>


    <div class="content">
        <div class="container container-custom d-flex justify-content-center">
            <div class="row row-custom">
                <div class="col-md-3 d-none d-md-block menu-bar">
                    @include('home.menu_bar')
                </div>
                <div class="col-md-9 col-12" style="padding: 1rem;">
                    <div class="text-content">
                        <p class="fz-13 text-danger font-thin">
                            新品iphoneの保証期間が残り8ケ月未満の場合は減額となります！
                            スムーズに買取するポイント:バッテリー20％以上にする
                            ※ネットワーク利用制限については,△の場合が減額となります。
                        </p>
                    </div>
                    <div class="filter">
                        {{--<ul class="list-group list-group-horizontal justify-content-center">--}}
                            {{--<li class="list-group-item fz-14 bold active">すべて</li>--}}
                            {{--<li class="list-group-item fz-14">--}}
                                {{--<img src="{{url('/images/demo/l1.png')}}" alt="">--}}
                            {{--</li>--}}
                            {{--<li class="list-group-item fz-14 bold">128BG</li>--}}
                            {{--<li class="list-group-item fz-14 bold">128BG</li>--}}
                            {{--<li class="list-group-item fz-14 bold">128BG</li>--}}
                            {{--<li class="list-group-item fz-14 bold">128BG</li>--}}
                        {{--</ul>--}}
                        <div class="row gx-1 text-center">
                            <div class="filter-item col active">
                                <span>すべて</span>
                            </div>
                            <div class="filter-item col fz-14 font-medium">
                                <span>128BG</span>
                            </div>
                            <div class="filter-item col fz-14 font-medium">
                                <span>128BG</span>
                            </div>
                            <div class="filter-item col fz-14 font-medium">
                                <span>128BG</span>
                            </div>
                            <div class="filter-item col fz-14 font-medium">
                                <span>128BG</span>
                            </div>
                        </div>
                    </div>
                    <div class="row gy-2 gx-2">
                        <div class="col-6 col-md-4">
                            <div class="item">
                                <div class="image">
                                    <img src="{{url('/images/demo/ip14.png')}}" width="126" height="126" alt="">
                                </div>
                                <div class="name fz-14 font-medium">Iphone 14 Pro Max
                                    128GB</div>
                                <div class="dung-luong d-flex">
                                    <span class="sim-free fz-12">Simfree未開封</span>
                                    <span class="price fz-12">128GB</span>
                                </div>
                                <div class="d-flex new-price">
                                    <div class="fz-14 text">新品</div>
                                    <div class="fz-16 font-bold number">169,000円</div>
                                </div>
                                <div class="d-flex old-price">
                                    <div class="fz-14 text">中古</div>
                                    <div class="fz-16 font-bold number">114,000円</div>
                                </div>
                                <div class="color text-center">
                                    <span class="font-medium" style="color: #4f4f4f">Màu</span>
                                    <span>Đen</span>
                                </div>
                                <div class="color-code">
                                    <ul class="list-group list-group-horizontal justify-content-center align-items-center">
                                        <li class="list-group-item d-flex active"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="item">
                                <div class="image">
                                    <img src="{{url('/images/demo/ip14.png')}}" width="126" height="126" alt="">
                                </div>
                                <div class="name fz-14 font-medium">Iphone 14 Pro Max
                                    128GB</div>
                                <div class="dung-luong d-flex">
                                    <span class="sim-free fz-12">Simfree未開封</span>
                                    <span class="price fz-12">128GB</span>
                                </div>
                                <div class="d-flex new-price">
                                    <div class="fz-14 text">新品</div>
                                    <div class="fz-16 font-bold number">169,000円</div>
                                </div>
                                <div class="d-flex old-price">
                                    <div class="fz-14 text">中古</div>
                                    <div class="fz-16 font-bold number">114,000円</div>
                                </div>
                                <div class="color text-center">
                                    <span class="font-medium" style="color: #4f4f4f">Màu</span>
                                    <span>Đen</span>
                                </div>
                                <div class="color-code">
                                    <ul class="list-group list-group-horizontal justify-content-center align-items-center">
                                        <li class="list-group-item d-flex active"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="item">
                                <div class="image">
                                    <img src="{{url('/images/demo/ip14.png')}}" width="126" height="126" alt="">
                                </div>
                                <div class="name fz-14 font-medium">Iphone 14 Pro Max
                                    128GB</div>
                                <div class="dung-luong d-flex">
                                    <span class="sim-free fz-12">Simfree未開封</span>
                                    <span class="price fz-12">128GB</span>
                                </div>
                                <div class="d-flex new-price">
                                    <div class="fz-14 text">新品</div>
                                    <div class="fz-16 font-bold number">169,000円</div>
                                </div>
                                <div class="d-flex old-price">
                                    <div class="fz-14 text">中古</div>
                                    <div class="fz-16 font-bold number">114,000円</div>
                                </div>
                                <div class="color text-center">
                                    <span class="font-medium" style="color: #4f4f4f">Màu</span>
                                    <span>Đen</span>
                                </div>
                                <div class="color-code">
                                    <ul class="list-group list-group-horizontal justify-content-center align-items-center">
                                        <li class="list-group-item d-flex active"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="item">
                                <div class="image">
                                    <img src="{{url('/images/demo/ip14.png')}}" width="126" height="126" alt="">
                                </div>
                                <div class="name fz-14 font-medium">Iphone 14 Pro Max
                                    128GB</div>
                                <div class="dung-luong d-flex">
                                    <span class="sim-free fz-12">Simfree未開封</span>
                                    <span class="price fz-12">128GB</span>
                                </div>
                                <div class="d-flex new-price">
                                    <div class="fz-14 text">新品</div>
                                    <div class="fz-16 font-bold number">169,000円</div>
                                </div>
                                <div class="d-flex old-price">
                                    <div class="fz-14 text">中古</div>
                                    <div class="fz-16 font-bold number">114,000円</div>
                                </div>
                                <div class="color text-center">
                                    <span class="font-medium" style="color: #4f4f4f">Màu</span>
                                    <span>Đen</span>
                                </div>
                                <div class="color-code">
                                    <ul class="list-group list-group-horizontal justify-content-center align-items-center">
                                        <li class="list-group-item d-flex active"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                        <li class="list-group-item d-flex"><button class="color-button" style="background-color: red"></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer d-none d-md-block mt-5">
        <div class="container text-center">
            <div class="row">
                <div class="logo">
                    <img src="{{url('/images/demo/logo1.png')}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="text-footer fz-16">
                    iPhoneを高値で買う
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="icon">
                        <img src="" alt="">
                    </div>
                    <div class="">
                        MAIL
                    </div>
                    <p>goldgroup@gmail.com</p>
                </div>
                <div class="col-4">
                    <div class="icon">
                        <img src="" alt="">
                    </div>
                    <div class="">CALL</div>
                    <p>050-3196-8661</p>
                </div>
                <div class="col-4">
                    <div class="icon">
                        <img src="" alt="">
                    </div>
                    <div class="">FIND US</div>
                    <p>116-0014東京都荒川区東日暮里6-46-11
                        フアーストクビル201</p>
                </div>
            </div>
            <hr>
            <div class="row" style="padding-bottom: 40px">
                <p class="">
                    <span class="text-white">Copyright © 2022</span> <span class="copyright">Goldgroup Co., Ltd.</span> <span class="text-white">All Rights Reserved.</span>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('js/script.js')}}"></script>
</html>