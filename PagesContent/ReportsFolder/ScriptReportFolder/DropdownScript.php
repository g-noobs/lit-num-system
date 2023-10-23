<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var dataType = $(this).data('report-type');
        var contentPath = '';

        if (dataType === 'student-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/StudentData.php';
        } else if (dataType === 'teacher-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/TeacherData.php';
        } else if (dataType === 'subject-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/SubjectData.php';
        } else if (dataType === 'lesson-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/LessonData.php';
        } else if (dataType === 'topic-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/TopicData.php';
        } else if (dataType === 'quiz-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/QuizData.php';
        }
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');

        if (contentPath !== '') {
            $("#mainContent").fadeOut(100, function() {
                $(this).empty().load(contentPath, function() {
                    $(this).fadeIn(100);
                });
            });
        }

    });
});
</script>