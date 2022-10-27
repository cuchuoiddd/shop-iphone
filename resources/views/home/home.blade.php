<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$setting->title ?: 'Gold Group' }}</title>
    <link rel="shortcut icon" type="image/ico" href="{{$setting->logo}}">

    <link rel="stylesheet" href="{{asset('assets/home/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/home/owl.carousel.min.css')}}">
    <link rel="stylesheet"
          href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">

    <script src="{{asset('assets/vendor_components/jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('assets/home/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/home/owl.carousel.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="container-custom">
    <div class="text-header">
        <img src="{{url('/images/demo/Group9.png')}}" alt="">
        <p class="fz-12 font-medium">{{$setting->header_title}}</p>
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
                    <img src="{{url($setting->logo)}}" style="height: 94px;" alt="">
                </div>
            </div>
            <div class="col-7 align-self-center">
                <div class="info">
                    <div class="phone">
                        <img src="{{url('images/demo/phone.png')}}" alt="">
                        <span class="text-white fz-13">{{$setting->phone}}</span>
                    </div>
                    <div class="address d-flex align-items-start">
                        <img src="{{url('images/demo/address.png')}}" alt="">
                        <span class="text-white fz-13">{{$setting->address}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header d-none d-sm-block">
        <div class="row align-items-center" style="height: 100%;">
            <div class="col-1"></div>
            <div class="col-4"><img src="{{url($setting->logo)}}" alt=""></div>
            <div class="col-2 d-flex align-items-center">
                <img class="me-2" src="{{url('/images/demo/phone.png')}}" alt=""/>
                <span class="text-white fz-16">{{$setting->phone}}</span>

            </div>
            <div class="col-5 d-flex align-items-center">
                <img class="me-2" src="{{url('/images/demo/address.png')}}" alt="">
                <span class="text-white fz-16">{{$setting->address}}</span>
            </div>
        </div>
    </div>

    <div class="banner-slide-moblie position-relative d-none">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($banner as $key=> $item)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img src="{{url($item->image)}}" class="d-block w-100" height="150" alt="...">
                    </div>
                @empty
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <img src="{{url('/images/demo/left_small.png')}}" alt="">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <img src="{{url('/images/demo/right_small.png')}}" alt="">
            </button>
        </div>
    </div>

    <div class="agdsg banner-slide d-none d-sm-block">
        <div class="owl-carousel">
            @forelse($banner as $item)
                <div><img src="{{url($item->image)}}" style="width: 1089px;height: 334px" alt=""></div>
            @empty
            @endforelse
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
                        <span class="fz-13 text-danger font-thin">
                            {!! $setting->text_content !!}
                        </span>
                    </div>
                    <div class="filter">
                        <div class="row gx-1 text-center">
                            <div class="filter-item col pointer fz-14 font-medium active" data-id="">
                                <span>すべて</span>
                            </div>
                            @forelse($capacity as $item)
                                <div class="filter-item col fz-14 font-medium pointer" data-id="{{$item->id}}">
                                    <span>{{$item->capacity}}</span>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                    <div class="row gy-2 gx-2 response">
                        @include('home.ajax')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer d-none d-md-block mt-5">
        <div class="container text-center">
            <div class="row">
                <div class="logo">
                    <img src="{{url($setting->logo)}}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="text-footer fz-16">
                    {{$setting->text_footer}}
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
                    <p>{{$setting->email}}</p>
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
                    <p>{{$setting->address}}</p>
                </div>
            </div>
            <hr>
            <div class="row" style="padding-bottom: 40px">
                <p class="">
                    <span class="text-white">Copyright © 2022</span> <span
                            class="copyright">{{$setting->copyright}}</span> <span class="text-white">All Rights Reserved.</span>
                </p>
            </div>
        </div>
    </div>
</div>
<form action="{{url()->current()}}" id="gridForm">
    <input type="hidden" class="capacity_id" name="capacity_id">
    <input type="hidden" class="category_id" name="category_id">
</form>
</body>
<script src="{{asset('js/script.js')}}"></script>
</html>