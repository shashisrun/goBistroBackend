<script>
var msg = "<?php echo Session::get('msg'); ?>"
$(window).on('load', function()
{
    iziToast.success({
        message: msg,
        position: 'topRight'
    });
});
</script><?php /**PATH /home/api.gobistro.in/public_html/resources/views/layouts/msg.blade.php ENDPATH**/ ?>