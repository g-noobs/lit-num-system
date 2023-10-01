<script>
// * Add Class active to a sidebar when clicked
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

<!-- Jquery for Search -->
<script>
$(document).ready(function() {
    $("#userInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            var rowText = $(this).text().toLowerCase();
            var pText = $(this).find("p").text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1 || pText.indexOf(value) > -1);
        });
    });
});
</script>+


<!-- For Logout button for Search -->
<script>
$(function() {
    $('#logoutBtn').on('click', function(e) {
        $.ajax({
            url: '../ActLogoutBtn.php',
            type: 'get',

            success: function(response) {
                console.log(response);
                window.location.href = "../index.php";
            },
            error: arguments => {
                console.log(arguments);
            }
        });
    });
});
</script>