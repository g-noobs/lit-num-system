<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('report');
        var contentPath = '';

        if (userType === 'student-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/StudentData.php';
        } else if (userType === 'teacher-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/TeacherData.php';
        } else if (userType === 'subject-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/SubjectData.php';
        }else if (userType === 'lesson-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/LessonData.php';
        } else if (userType === 'topic-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/TopicData.php';
        }else if (userType === 'quiz-data') {
            contentPath = '../PagesContent/ReportsFolder/TableReportFolder/QuizData.php';
        } 
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#mainContent").fadeOut(400, function() {
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>