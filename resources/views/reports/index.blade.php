@extends('layouts.master')
@section('content')
    <style>
        .text-right {
            text-align: right;
        }
        .box-short{
            height: 260px;
        }
        .box-long{
            height: 650px;
        }
        .content{
            font-size: 14px;
        }
        .bold{
            font-weight: 600;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BẢNG XẾP HẠNG SAO
                {{--<small>Control panel</small>--}}
            </h1>
            <form id="gridForm" action="{{url()->current()}}">
                <div class="search-custom">
                    <select class="form-control form-control-custom select2" name="time_id"
                            data-placeholder="Chọn chu kỳ">
                        <option value=""></option>
                        @forelse($times as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                        @endforelse
                    </select>
                    <button type="submit" class="btn btn-primary searchData" id="btnSearch"><i class="fa fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-6 col-lg-6">
                    @include('reports.chartStarReceive')
                </div>
                <div class="col-md-6 col-lg-6">
                    @include('reports.chartStarTranfer')
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/loader.js')}}"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Tổng sao lớn hơn 200',10],
                ['Tổng sao từ 100-200',100],
                ['Tổng sao từ 1-100',10],
                ['Tổng sao bằng 0',1],
            ]);

            var options = {
                title: 'THỐNG KÊ SỐ LƯỢNG SAO NHẬN',
                fontSize:14
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_star_receive'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Tổng sao lớn hơn 200',10],
                ['Tổng sao từ 100-200',100],
                ['Tổng sao từ 1-100',10],
                ['Tổng sao bằng 0',1],
            ]);

            var options = {
                title: 'THỐNG KÊ SỐ LƯỢNG SAO CHO',
                fontSize:14
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_star_tranfer'));

            chart.draw(data, options);
        }
    </script>
@endsection
