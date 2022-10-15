<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>

<body class="hold-transition skin-blue-light sidebar-mini fixed">
<div class="wrapper">

    @include('layouts.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')" class="mb-4"/>
    @endif
    @yield('content')
    <!-- /.content-wrapper -->
    @include('layouts.footer')

    @include('layouts.sidebar_right')

</div>
<!-- ./wrapper -->
<div class="loading-custom" style="display: none;">
    <div class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
@include('layouts.script')

@yield('script')
</body>
</html>
