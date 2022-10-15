{{--<div class="alert {{ $classForType() }}">--}}
    {{--{{ $message }}--}}
{{--</div>--}}

{{--<div class="alert {{$type}}">--}}
    {{--<strong>{{$message}}</strong>--}}
{{--</div>--}}

<div class="alert {{$type}} alert-dismissible fade show" style="top: 117px;text-align: center;max-width: 90%;position: absolute;z-index: 100;right: 20px">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{$message}}
</div>