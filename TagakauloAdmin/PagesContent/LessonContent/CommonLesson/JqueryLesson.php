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
    var lessonName = $(this).closest('tr').find('td:eq(2)').text();
    var url = "../PagesContent/LessonContent/ViewLessonFolder/LessonView.php" + "?id=" + buttonId + "&name=" + lessonName;
    window.open(url, "topicPopup","width=1000,height=1000");
    
    //@ $.ajax({
    //     url: "../PagesContent/LessonContent/ActionLesson/ActionLessonView.php",
    //     method: "POST",
    //     data: {
    //         id: buttonId,
    //         name: lessonName
    //     },
    //     success: function(response) {

    //         //open LessonView.php in a new window
    //         window.open(url, "topicPopup","width=1000,height=1000");
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) {
    //         alert(xhr.status);
    //         alert(thrownError);
    //     }
    // });
});
</script>




