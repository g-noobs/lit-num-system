<!-- pop error Alert -->
<script>
$(document).ready(function() {
    // Check for message
    var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
    if (msg) {
        $("#myAlert").show(); // Show the .alert element
            setTimeout(function () {
                    $("#myAlert").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500); // 3000 milliseconds (3 seconds);
    }
});
</script>