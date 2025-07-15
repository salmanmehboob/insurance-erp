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
    var getModelByMake = '<?php echo e(url('get-make-by-model')); ?>';
    var getClientData = '<?php echo e(url('get-client-data')); ?>';


    window.sessionMessages = {
        success: @json(session('success')),
        error: @json(session('error')),
        info: @json(session('info'))
    };
</script>

<script>
    function fetchUnreadCount() {
        $.ajax({
            url: 'chat/get-unread-count', // We'll create this route
            method: 'GET',
            success: function(data) {
                if(data.count > 0) {
                    $('#unread-count').text(data.count).show();
                    // Optional: Add blinking effect
                 } else {
                    $('#unread-count').hide();
                 }
            }
        });
    }

    // Call on page load and every 30 seconds
    fetchUnreadCount();
    setInterval(fetchUnreadCount, 10000);
</script>


@stack('script')


<script src="{{asset('backend/custom/js/ajax_form.js')}}"></script>

<script src="{{asset('backend/custom/js/custom.js')}}"></script>

