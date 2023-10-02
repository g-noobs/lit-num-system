<!-- Jquery-- on user.php DOM>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


 Jquery Dropdown Menu-->
<script>
$(document).ready(function() {
    // *This will disable the personal id input field if selected user is admin
    $('#user').on('change', function() {
        var selectedUser = $(this).val();

        if (selectedUser === 'Admin') {
            // Set personal_id as readonly and set its value to a default
            $('#personal-id').prop("disabled", true);
        } else {
            // If another option is selected, remove readonly and clear the value
            $('#personal-id').prop("disabled", false);
        }
    });

    // $This manage the dropdown menu
    $('.custom-dropdown-menu a').on('click', function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';



        if (userType === 'all-active') {

            contentPath = '../PagesContent/UserContent/UserTable/AllActiveUserTable.php';
            $('#modal-title').text('Enter User Information');
            $("button[type='submit']").text('Create a User');
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
                    $(this).fadeIn(400);
                });
            });
        }
        else{
            $("#mainContent").load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            
        }
    });


});
</script>

<!-- Jquery for INput Search-->
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