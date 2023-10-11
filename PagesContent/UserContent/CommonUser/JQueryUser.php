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
$(function() {
    // $This manage the dropdown menu
    $('.custom-dropdown-menu a').on('click', function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';


        if (userType === 'all-active') {

            contentPath = '../PagesContent/UserContent/UserTable/AllActiveUserTable.php';
            $("#user").prop("disabled", false);


        } else if (userType === 'teacher') {
            $('#personal-id').prop("disabled", false);
            contentPath = '../PagesContent/UserContent/UserTable/TeacherTableContent.php';
            updatModalForm('Teacher');

        } else if (userType === 'learner') {
            $('#personal-id').prop("disabled", false);
            contentPath = '../PagesContent/UserContent/UserTable/StudentTableContent.php';
            updatModalForm('Learner');

        } else if (userType === 'admin') {
            contentPath = '../PagesContent/UserContent/UserTable/AdminTableContent.php';
            $('#personal-id').prop("disabled", true);
            updatModalForm('Admin');


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
                $(this).empty().load(contentPath, function() {
                    $(this).html($(contentPath).html()); // Set the HTML content
                    $(this).fadeIn(400);
                });
            });
        }
    });

    function updatModalForm(usertype) {
        // Modal title
        $('#modal-title').text('Enter ' + usertype + ' Information');
        $("#user").val(usertype);
        // Disable the select element
        $("#user").prop("disabled", true);
    }
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