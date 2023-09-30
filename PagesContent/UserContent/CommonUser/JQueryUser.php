<!-- Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Jquery Dropdown Menu-->
<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('user-type');
        var contentPath = '';

        if (userType === 'all-active') {
            contentPath = '../PagesContent/UserContent/UserTable/AllActiveUserTable.php';
            $('#modal-title').text('Enter User Information');
            $("button[type='submit']").text('Create a User');

        } else if (userType === 'teacher') {
            contentPath = '../PagesContent/UserContent/UserTable/TeacherTableContent.php';
            updatModalForm('Teacher');

        } else if (userType === 'learner') {
            contentPath = '../PagesContent/UserContent/UserTable/StudentTableContent.php';
            updatModalForm('Learner');

        } else if (userType === 'admin') {
            contentPath = '../PagesContent/UserContent/UserTable/AdminTableContent.php';
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
                $(this).load(contentPath, function() {
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
        $("button[type='submit']").text('Create a User for ' + usertype);
    }
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

<!-- Update modal depending on user type. hide personal id option is admin -->
<script>
$(document).ready(function() {
    // Detect changes in the user select dropdown
    $('#user').on('change', function() {
        var selectedUser = $(this).val();

        if (selectedUser === 'Admin') {
            // Set personal_id as readonly and set its value to a default
            $('#personal_id').find('input[name="personal_id"]').prop('readonly', true).val(
                'default_value');
        } else {
            // If another option is selected, remove readonly and clear the value
            $('#personal_id').find('input[name="personal_id"]').prop('readonly', false).val('');
        }
    });
});
</script>