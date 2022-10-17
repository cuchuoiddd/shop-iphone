@php $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; @endphp
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <!-- sidebar menu-->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="user-profile treeview menu-open">
                <a href="index.html">
                    <img src="/images/avatar/{{\Illuminate\Support\Facades\Auth::user()->avatar?:'../images/user5-128x128.jpg'}}" alt="user">
                    <span>{{\Illuminate\Support\Facades\Auth::user()->full_name}}</span>
                    <span class="pull-right-container">
                      {{--<i class="fa fa-angle-right pull-right"></i>--}}
                    </span>
                </a>
            </li>

            <li class="{{ $url == route('admin.settings.index') ? 'active' : '' }}">
                <a href="{{route('admin.settings.index')}}">
                    <i class="fa fa-user"></i> <span>Settings</span>
                </a>
            </li>
            <li class="{{ $url == route('admin.categories.index') ? 'active' : '' }}">
                <a href="{{route('admin.categories.index')}}">
                    <i class="fa fa-money"></i> <span>Danh mục sản phẩm</span>
                </a>
            </li>

            <li class="{{ $url == route('admin.products.index') ? 'active' : '' }}">
                <a href="{{route('admin.products.index')}}">
                    <i class="fa fa-envelope-open"></i> <span>Danh sách sản phẩm</span>
                </a>
            </li>
            <li class="{{ $url == route('admin.banners.index') ? 'active' : '' }}">
                <a href="{{route('admin.banners.index')}}">
                    <i class="fa fa-table"></i> <span>Quản lý Banner</span>
                </a>
            </li>
            <li class="{{ $url == route('admin.capacities.index') ? 'active' : '' }}">
                <a href="{{route('admin.capacities.index')}}">
                    <i class="fa fa-table"></i> <span>Quản lý Dung lượng</span>
                </a>
            </li>
            <li class="{{ $url == route('admin.colors.index') ? 'active' : '' }}">
                <a href="{{route('admin.colors.index')}}">
                    <i class="fa fa-table"></i> <span>Quản lý Màu sắc</span>
                </a>
            </li>
        </ul>
    </section>
</aside>