<div class="box box-short">
    <div id="piechart-checkin"></div>
    <ul class="flexbox flex-justified text-center">
        <li class="br-1">
            <div class="font-size-20 text-blue">{{$statusCheckin['dung_han']}}</div>
            <small>Đúng hạn</small>
        </li>

        <li class="br-1">
            <div class="font-size-20 text-danger">{{$statusCheckin['chua_check_in']}}</div>
            <small>Chưa check in</small>
        </li>

        <li class="br-1">
            <div class="font-size-20 text-danger">{{$statusCheckin['late']}}</div>
            <small>Checkin muộn</small>
        </li>

        <li>
            <div class="font-size-20 text-warning">{{$statusCheckin['qua_han']}}</div>
            <small>Quá hạn</small>
        </li>
    </ul>
</div>