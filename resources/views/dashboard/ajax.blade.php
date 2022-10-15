<div class="row">
    <div class="col-md-6 col-lg-4">
        @include('dashboard.Okrs')
    </div>
    <div class="col-md-6 col-lg-4">
        @include('dashboard.checkin')
    </div>
    <div class="col-md-6 col-lg-4">
        @include('dashboard.CFRs')
    </div>
</div>


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