<!-- Jquery Validate -->
<script src="{{ asset('js/plugins/validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

{{ $js_scripts ?? '' }}

<script type="text/javascript">
    $(document).ready(function(){
    	$(".form-control").attr('autocomplete', 'off');

        // $("select").select2();
        // $("form select").select2(); 

        $(".form-horizontal select").select2({
            placeholder: "Select One Option",
            allowClear: true
        }); 
        
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });   

        $(".date").datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: true,
            autoclose: true,
            // startDate : 0,
            format: "yyyy-mm-dd"
        });         


        var msg;
        var dynamicErrorMsg = function () { return msg; }

        jQuery.validator.addMethod("equalToHundred", function(value, element, param) {
            var target = parseInt($( param[0] ).val());
            var total = parseInt(value) + target;
            msg = " Cat and Exam Weight must be equal to " + param[1];
            return this.optional(element) || (total == param[1]);
        }, dynamicErrorMsg);

        $(".val-form").validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            }
            {{ $val_rules ?? '' }}
        });

        {{ $slot }}

    });

    {{ $additional_functions ?? '' }}

</script>