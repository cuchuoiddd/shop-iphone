@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-12 ">
                    <div class="row">

                        <div class="col-sm-6 col-lg-3">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="flexbox mb-1">
                                        <div>
                                            <p class="text-info font-size-26 font-weight-300 mb-0">1025</p>
                                            Products Sold
                                        </div>
                                        <div class="text-info font-size-40"><i class="mdi mdi-basket-fill"></i></div>
                                    </div>
                                    <div class="progress progress-xxs mt-10 mb-0">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-lg-3">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="flexbox mb-1">
                                        <div>
                                            <p class="text-warning font-size-26 font-weight-300 mb-0">$658</p>
                                            Net Profit
                                        </div>
                                        <div class="text-warning font-size-40"><i class="mdi mdi-chart-line"></i></div>
                                    </div>
                                    <div class="progress progress-xxs mt-10 mb-0">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                             style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-lg-3">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="flexbox mb-1">
                                        <div>
                                            <p class="text-success font-size-26 font-weight-300 mb-0">452</p>
                                            New Customers
                                        </div>
                                        <div class="text-success font-size-40"><i class="mdi mdi-account-plus"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-xxs mt-10 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-lg-3">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="flexbox mb-1">
                                        <div>
                                            <p class="text-danger font-size-26 font-weight-300 mb-0">90.89 %</p>
                                            Customer Satisfaction
                                        </div>
                                        <div class="text-danger font-size-40"><i class="mdi mdi-heart"></i></div>
                                    </div>
                                    <div class="progress progress-xxs mt-10 mb-0">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                             style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-12 col-xl-6">
                    <!-- AREA CHART -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Revenue</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart" id="line-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


                <div class="col-12 col-xl-6">
                    <!-- AREA CHART -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Download Count</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart" id="bar-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>


                <div class="col-12 col-xl-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Current Visitors</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="usa" style="height: 275px"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">World Map</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="world-map-markers" style="height: 275px"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xl-4 col-12">
                    <div class="box">
                        <div class="box-body bg-blue">
                            <div class="flexbox mb-20">
                                <h6 class="text-uppercase text-white">Today</h6>
                                <h6 class="text-white"><i class="ion-android-arrow-dropup"></i> %20</h6>
                            </div>
                            <div id="lineToday">1,4,3,7,6,4,8,9,6,8,12</div>
                        </div>

                        <div class="box-body">
                            <ul class="flexbox flex-justified align-items-center">
                                <li class="text-center">
                                    <div class="font-size-20 text-success">%60</div>
                                    <small class="text-uppercase">Direct sale</small>
                                </li>

                                <li class="text-center">
                                    <div class="font-size-20 text-info">%40</div>
                                    <small class="text-uppercase">Online sale</small>
                                </li>

                                <li class="text-center">
                                    <div class="font-size-20 text-warning">%40</div>
                                    <small class="text-uppercase">Whole sale</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-xl-4 col-12">
                    <div class="box box-inverse pull-up" style="background-color: #3b5998">
                        <div class="box-header no-border">
                            <span class="fa fa-facebook font-size-30"></span>
                            <div class="box-tools pull-right">
                                <h5 class="box-title box-title-bold">Facebook feed</h5>
                            </div>
                        </div>

                        <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                            <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly
                                incubate cross functional action.</p>
                            <div class="flexbox">
                                <time class="text-white" datetime="2017-11-21 20:00">21 November, 2017</time>
                                <span><i class="fa fa-heart"></i> 75</span>
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box box-inverse box-carousel slide pull-up" data-ride="carousel"
                         style="background-color: #00aced">
                        <div class="box-header no-border">
                            <span class="fa fa-twitter font-size-30"></span>
                            <div class="box-tools pull-right">
                                <h5 class="box-title box-title-bold">Carousel feed</h5>
                            </div>
                        </div>

                        <div class="carousel-inner">
                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item active">
                                <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly
                                    incubate cross functional action.</p>
                                <div class="flexbox">
                                    <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                                    <span><i class="fa fa-heart"></i> 62</span>
                                </div>
                            </blockquote>

                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item">
                                <p>Uniquely revolutionize leveraged catalysts for change for world-class web services.
                                    Efficiently underwhelm competitive.</p>
                                <div class="flexbox">
                                    <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                                    <span><i class="fa fa-heart"></i> 45</span>
                                </div>
                            </blockquote>

                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15 carousel-item">
                                <p>Enthusiastically optimize cross-media manufactured products without process-centric
                                    web services. Conveniently.</p>
                                <div class="flexbox">
                                    <time class="text-white" datetime="2017-11-22 20:00">22 November, 2017</time>
                                    <span><i class="fa fa-heart"></i> 65</span>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="box box-inverse bg-red pull-up">
                        <div class="box-header no-border">
                            <span class="fa fa-google-plus font-size-30"></span>
                            <div class="box-tools pull-right">
                                <h5 class="box-title box-title-bold">Google Plus</h5>
                            </div>
                        </div>

                        <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                            <p>Holisticly benchmark plug imperatives for multifunctional deliverables. Seamlessly
                                incubate cross functional action.</p>
                            <div class="flexbox">
                                <time class="text-white" datetime="2017-11-21 20:00">21 November, 2017</time>
                                <span><i class="fa fa-heart"></i> 75</span>
                            </div>
                        </blockquote>
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-12">
                    <!-- PRODUCT LIST -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recently Products</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        <img src="../images/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">iphone 7plus
                                            <span class="label label-warning pull-right mt-5">$300</span></a>
                                        <span class="product-description">
							  12MP Wide-angle and telephoto cameras.
							</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="../images/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">Apple Tv
                                            <span class="label label-info pull-right mt-5">$400</span></a>
                                        <span class="product-description">
							  Library | For You | Browse | Radio
							</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="../images/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">MacBook Air<span
                                                    class="label label-danger pull-right mt-5">$450</span></a>
                                        <span class="product-description">
							  Make big things happen. All day long.
							</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                                <li class="item">
                                    <div class="product-img">
                                        <img src="../images/default-50x50.gif" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">iPad Pro
                                            <span class="label label-success pull-right mt-5">$289</span></a>
                                        <span class="product-description">
							  Anything you can do, you can do better.
							</span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Products</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-12">
                    <!-- Widget: user widget style 3 -->
                    <div class="box box-widget widget-user-3">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-img text-white"
                             style="background: url('../images/img1.jpg') center center;" data-overlay="5">
                            <div class="info-user">
                                <h3 class="widget-user-username">Michael Jorden</h3>
                                <h6 class="widget-user-desc">Developer</h6>
                            </div>
                            <div class="widget-user-image clearfix">
                                <img class="rounded-circle" src="../images/user7-128x128.jpg" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav d-block nav-stacked">
                                <li class="nav-item"><a href="#" class="nav-link">Sales <span
                                                class="pull-right badge bg-blue">1310</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Projects <span
                                                class="pull-right badge bg-green">120</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Followers <span
                                                class="pull-right badge bg-yellow">8K</span></a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Tasks <span
                                                class="pull-right badge bg-red">58</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.widget-user -->

                    <div class="flexbox flex-justified text-center bg-white mb-20">
                        <div class="no-shrink py-30">
                            <span class="ion ion-social-facebook font-size-50" style="color: #3b5998"></span>
                        </div>

                        <div class="py-25 bg-blue">
                            <div class="font-size-30">+250</div>
                            <span>Likes</span>
                        </div>
                    </div>

                </div>
                <!-- /.col -->

                <div class="col-xl-4 col-12">
                    <!-- DIRECT CHAT DANGER -->
                    <div class="box direct-chat direct-chat-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Direct Chat</h3>

                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="1 New Messages" class="badge bg-success">1</span>
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                        data-widget="chat-pane-toggle">
                                    <i class="fa fa-comments"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="direct-chat">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">James Anderson</span>
                                        <span class="direct-chat-timestamp pull-right">April 14, 2017 18:00 </span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user1-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is simply dummy text industry.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Michael Jorden</span>
                                        <span class="direct-chat-timestamp pull-left">April 14, 2017 18:00</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user3-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is...
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">James Anderson</span>
                                        <span class="direct-chat-timestamp pull-right">April 14, 2017 18:00 </span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user1-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is simply dummy text industry.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Michael Jorden</span>
                                        <span class="direct-chat-timestamp pull-left">April 14, 2017 18:00</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user3-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is...
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">James Anderson</span>
                                        <span class="direct-chat-timestamp pull-right">April 14, 2017 18:00 </span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user1-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is simply dummy text industry.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">Michael Jorden</span>
                                        <span class="direct-chat-timestamp pull-left">April 14, 2017 18:00</span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="../images/user3-128x128.jpg"
                                         alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Lorem Ipsum is...
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="../images/user1-128x128.jpg"
                                                 alt="User Image">

                                            <div class="contacts-list-info">
							<span class="contacts-list-name">
							  Pavan kumar
							  <small class="contacts-list-date pull-right">April 14, 2017</small>
							</span>
                                                <span class="contacts-list-email">info@.multipurpose.com</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="../images/user7-128x128.jpg"
                                                 alt="User Image">

                                            <div class="contacts-list-info">
							<span class="contacts-list-name">
							  Sonu Sud
							  <small class="contacts-list-date pull-right">March 14, 2017</small>
							</span>
                                                <span class="contacts-list-email">sonu@gmail.com</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contatcts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                           class="form-control">
                                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">Send</button>
                      </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>

            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
<script>
    console.log('ngon ngay');
</script>
@endsection
