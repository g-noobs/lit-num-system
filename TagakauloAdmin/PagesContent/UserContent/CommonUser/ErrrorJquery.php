<!-- pop modal for error adding -->
<script>
$(document).ready(function() {
    // Check for message
    var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
    if (msg) {
        $('#errorModal').modal('show');
    }
});
</script>