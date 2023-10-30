<!-- Morris Donut Chart -->
<script>
$(function() {
    var admin_count = "";
    var teacher_count = "";
    var student_count = "";

    $.ajax({
        type: "GET",
        url: "../PagesContent/DashboardFolder/ActionUserCount.php",
        success: function(response) {
            console.log(response); 
            var responseData = JSON.parse(response);
            admin_count = responseData.admin;
            teacher_count = responseData.teacher;
            student_count = responseData.student;

            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'user-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [{
                        label: "Admin",
                        value: admin_count
                    },
                    {
                        label: "Teacher",
                        value: teacher_count
                    },
                    {
                        label: "Learner",
                        value: student_count
                    }
                ],
                hideHover: 'auto'
            });
        }
    });
});
</script>