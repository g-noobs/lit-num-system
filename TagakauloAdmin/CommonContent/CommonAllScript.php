<script>
// Check for message
var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
if (msg) {
    $('#errorModal').modal('show');

}

</script>

