<script>
// Check for message
var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
if (msg) {
    $('#errorModal').modal('show');

}

</script>
<script>
$(document).ready(function() {
    var currentUrl = window.location.pathname;
    var currentPage = currentUrl.substring(currentUrl.lastIndexOf("/") + 1);
    // Loop through each anchor tag in the sidebar menu
    $(".sidebar-menu li a").each(function() {
        var menuUrl = $(this).attr("href");
        
        
        // Check if the current URL matches the menu URL
        if (currentPage === menuUrl) {
            $("sidebar-menu li.active").removeClass("active");
            // Add the 'active' class to the parent <li> element
            $(this).closest("li").addClass("active");
        }
    });
});
</script>

