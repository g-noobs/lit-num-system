<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--Script below will be used for search -->
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
</script>

<script>
$(".viewBtn").click(function() {
    var buttonId = $(this).data("id");
    $.ajax({
        url: "dashboard.php",
        method: "POST",
        data: {
            id: buttonId
        },
        success: function(response) {
            window.open("LessonFile.php", "topicPopup", "width=1000,height=1000");
        }
    });
});
</script>



