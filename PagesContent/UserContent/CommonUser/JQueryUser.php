<!-- Jquery-- on user.php DOM>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


// *This will disable the personal id input field if selected user is admin-->


<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';

        if (userType === 'all-active') {
            location.reload();
        } else if (userType === 'teacher') {
            location.reload();
        } else if (userType === 'learner') {
            location.reload();
        } else if (userType === 'admin') {
            location.reload();
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
                $(this).load(contentPath, function() {
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

<!-- Hide personal id tab if user is admin -->
<script>
$(document).ready(function() {
    $('#user, #edit_user_option').on('change', function() {
        var selectedUser = $(this).val();

        var $personalIdinput = $('#personal-id, #edit_personal_id');
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

<!-- Script that will disable the option if for usertype if either learner - teach is selected-->
<script>
$(function(){
    $("#btnAddTeacher, #btnAddAdmin, #btnAddLearner").on("click", function(){
        var userType = $(this).data(user-level);
        // set the value #user and text then disable the option
        $("#user").val(userType);
        $("#user").text(userType);
        $("#user").prop("disabled", true);
    });
});
</script>