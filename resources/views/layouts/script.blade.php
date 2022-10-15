<!-- jQuery 3 -->
<script src="{{asset('assets/vendor_components/jquery/dist/jquery.min.js')}}"></script>

<!-- popper -->
<script src="{{asset('assets/vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.0-->
<script src="{{asset('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>

<!-- InputMask -->
<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('assets/vendor_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- bootstrap datepicker -->
<script src="{{asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- SlimScroll -->
<script src="{{asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{asset('assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>

<!-- bootstrap color picker -->
<script src="{{asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

<!-- bootstrap time picker -->
<script src="{{asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>

<!-- Sweet-Alert  -->
<script src="{{asset('assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>

<!-- Alertify -->
<script src="{{asset('assets/vendor_plugins/alertify/alertify.min.js')}}"></script>

<!-- Minimalelite Admin App -->
<script src="{{asset('js/template.js')}}"></script>

<!-- Minimalelite Admin for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>

<!-- Minimalelite Admin for advanced form element -->
<script src="{{asset('js/pages/advanced-form-element.js')}}"></script>

<!-- Form validator JavaScript -->
<script src="{{asset('js/pages/validation.js')}}"></script>

<script>
    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token()}}');
        }
    });
</script>

<!-- custom -->
<script src="{{asset('js/custom.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".alert").fadeTo(1500, 500).slideUp(500, function(){
            $(".alert").slideUp(2000);
        });
    });
</script>