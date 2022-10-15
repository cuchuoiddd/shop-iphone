@extends('layouts.master')
@section('content')
    <style>
        .text-right {
            text-align: right;
        }

        .box-short {
            height: 386px;
        }

        .box-long {
            height: 650px;
        }

        .content {
            font-size: 14px;
        }

        .bold {
            font-weight: 600;
        }

        .text-report {
            margin-left: 10px;
            padding-right: 17px;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                DASHBOARD
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
            <div class="response">
                    @include('dashboard.ajax')
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    @include('dashboard.rankStarReceive')
                </div>
                <div class="col-md-6 col-lg-4">
                    @include('dashboard.rankStarTranfer')
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="box box-long">
                        <div class="box-header with-border">
                            <span class="avatar avatar-sm bg-blue"><i class="fa fa-star-half-full"></i></span>
                            <h5 class="box-title bold">GHI NHẬN</h5>
                            <select name="" id="" class="float-right form-control form-control-custom department">
                                <option value="">Chọn phòng ban</option>
                                @forelse($departments as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <span class="rankCFRs">
                            @include('dashboard.rankCFRs')
                        </span>
                    </div>
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
                ['Đúng hạn', {{ $statusCheckin['dung_han'] }}],
                ['Chưa checkin', {{ $statusCheckin['chua_check_in'] }}],
                ['Checkin muộn', {{ $statusCheckin['late'] }}],
                ['Quá hạn', {{ $statusCheckin['qua_han'] }}]
            ]);

            var options = {
                title: 'TÌNH TRẠNG CHECK-IN',
                fontSize: 14,
                with: 350,
                height: 330
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart-checkin'));

            chart.draw(data, options);
        }
    </script>
    <script>
        $('.department').change(function () {
            // $('.departmentValue').val($(this).val());
            let department_id = $(this).val();
            $.ajax({
                url:"/search-cfrs-department",
                data:{department_id:department_id},
                success:function (data) {
                    if(data){
                        $('.rankCFRs').html(data);
                    } else {
                        $('.rankCFRs').html('');
                    }
                }
            })
        })
    </script>
@endsection
