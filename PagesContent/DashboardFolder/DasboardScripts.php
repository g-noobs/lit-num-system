<!-- Morris Donut Chart -->
<script>
$(function() {
    "use strict";
    var admin_count = "2";
    var teacher_count = "3";
    var student_count = "4";

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

    // $.ajax({
    //     type: "GET",
    //     url: "../PagesContent/DashboardFolder/ActionUserCount.php",
    //     success: function(response) {


    //         var responseData = JSON.parse(response);
    //         admin_count = responseData.admin;
    //         teacher_count = responseData.teacher;
    //         student_count = responseData.student;

    //         // Create the Morris Donut Chart here

    //     }
    // });
});
</script>