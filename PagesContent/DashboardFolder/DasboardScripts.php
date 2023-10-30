<!-- Morris Donut Chart -->
<script>
$(function() {
    "use strict";
    var admin_count = "";
    var teacher_count = "";
    var student_count = "";



    $.ajax({
        type: "POST",
        url: "../PagesContent/DashboardFolder/ActionUserCount.php",
        success: function(response) {


            var responseData = JSON.parse(response);
            admin_count = responseData.admin;
            teacher_count = responseData.teacher;
            student_count = responseData.student;

            var donut = new Morris.Donut({
                element: 'user-chart',
                resize: true,
                colors: ["#000080", "#FF0000", "#F39C12"],
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