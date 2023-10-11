<!-- Jquery-- on user.php DOM>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


// *This will disable the personal id input field if selected user is admin-->
<script>
$(document).ready(function() {

    $('#user, #edit_user_option').on('change', function() {
        var selectedUser = $(this).val();

        var $personalIdinput = $('#personal-id, #edit_personal_i');
        var $personalIdFrmGrp = $("#personal_id_form, #edit_personal_id_form");

        if (selectedUser === 'Admin') {
            // Set personal_id as readonly and set its value to a default
            $personalIdinput.prop("disabled", true);
            $personalIdFrmGrp.fadeOut();


        } else {
            // If another option is selected, remove readonly and clear the value
            $personalIdinput.prop("disabled", false);
            $personalIdFrmGrp.fadeIn();
        }
    });
});
</script>


<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';

        if (userType === 'all-active') {
            contentPath = '../PagesContent/UserContent/UserTable/AllActiveUserTable.php';
        } else if (userType === 'teacher') {
            contentPath = '../PagesContent/UserContent/UserTable/TeacherTableContent.php';
        } else if (userType === 'learner') {
            contentPath = '../PagesContent/UserContent/UserTable/StudentTableContent.php';
        } else if (userType === 'admin') {
            contentPath = '../PagesContent/UserContent/UserTable/AdminTableContent.php';
        } else if (userType === 'arch-all') {
            contentPath = '../PagesContent/UserContent/UserTable/AllArchUsersTable.php';
        } else if (userType === 'arch-admin') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchiveAdminTable.php';
        } else if (userType === 'arch-teacher') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchivedTeacherTable.php';
        } else if (userType === 'arch-learner') {
            contentPath = '../PagesContent/UserContent/UserTable/ArchivedStudentTable.php';
        }
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#mainContent").fadeOut(400, function() {
                $(this).empty(); // Empty the div
                $.get(contentPath, function(data) {
                    $("#mainContent").html(data); // Replace with new content
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>

<!-- CSV for hiding and showing upload batch form -->
<script>
$(function() {
    $('#frmCsvGroup').hide();
    $('#csvUploadIcon').click(function() {
        $('#frmCsvGroup').fadeToggle("slow");
    });
});
</script>