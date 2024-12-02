<script src="{{asset('backend/js/app.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.repeater/jquery.repeater.min.js"></script>
<!-- Sweet Alert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Notify JS -->
<script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    var urlPath = '<?php echo url(""); ?>';
    var CSRF_TOKEN = '<?php echo csrf_token(); ?>';


    window.sessionMessages = {
        success: @json(session('success')),
        error: @json(session('error')),
        info: @json(session('info'))
    };
</script>

@stack('script')


<script src="{{asset('backend/custom/js/ajax_form.js')}}"></script>

<script src="{{asset('backend/custom/js/custom.js')}}"></script>

