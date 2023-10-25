<script>
$(function() {
    $(".viewBtn").click(function() {
        var buttonId = $(this).data("id");
        var lessonName = $(this).closest('tr').find('td:eq(2)').text();
        var url = "../PagesContent/LessonContent/ViewLessonFolder/LessonView.php?id=" + buttonId +
            "&name=" + lessonName;
        //open lessonview.php in a new window with size
        window.open(url, "_blank", "width=1000,height=700");
    });
});
</script>