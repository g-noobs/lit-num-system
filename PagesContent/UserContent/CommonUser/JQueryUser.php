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
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
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
<!-- Jquery for Edit Icon -->
<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.edit').click(function() {
        // Get the row data
        var userId = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var personalId = $(this).closest('tr').find('td:eq(2)').text();
        var firstName = $(this).closest('tr').find('td:eq(3)').text();
        var lastName = $(this).closest('tr').find('td:eq(4)').text();
        var gender = $(this).closest('tr').find('td:eq(5)').text();
        var user = $(this).closest('tr').find('td:eq(8)').text();

        // Populate the modal fields with the data
        $('#edit-user').find('[name="userId"]').val(userId);
        $('#edit-user').find('[name="personal_id"]').val(personalId);
        $('#edit-user').find('[name="first_name"]').val(firstName);
        $('#edit-user').find('[name="last_name"]').val(lastName);
        $('#edit-user').find('[name="gender"]').val(gender);

        $('#edit-user').find('[name="user"]').val(user);

        // Show the modal
        $('#edit-user').modal('show');
        
        //Edit Form within the modal
        $('#edit_user').on('submit', function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '../PagesContent/UserContent/ActionUsers/ActionEditUser.php',
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data (required for FormData)
                contentType: false, // Don't set content type (required for FormData)
                success: function(response){
                    //Parse the JSON response
                    var reponseData = JSON.parse(response);

                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('message')) {
                        var msg = responseData.message;
                        //reload page
                        window.location.reload();
                        //show and assign message to the banner
                        $('#successAlert').text(msg);
                        $('#successBanner').show();
                        setTimeout(function () {
                            $("#successBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                        }, 2500);

                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        var msg = responseData.error;
                        // hide modal
                        $('#edit-user').modal('hide');

                        //assign text to banner and show
                        $('#errorAlert').text(msg);
                        $('#errorBanner').show();
                        setTimeout(function () {
                            $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                        }, 2500);
                        
                    }
                }
            });
        });
        
    });
});
</script>


<!-- Activate and Archive button -->
<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.action').click(function() {
        // Get the row data
        var userId = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var name = $(this).closest('tr').find('td:eq(2)').text();
        var gender = $(this).closest('tr').find('td:eq(3)').text();
        var date = $(this).closest('tr').find('td:eq(4)').text();
        var user = $(this).closest('tr').find('td:eq(5)').text();

        // Populate the modal fields with the data
        $('#activate-user').find('[name="userId"]').val(userId);
        $('#archive-user').find('[name="userId"]').val(userId);

        // Show the modal
        $('#activate-user').modal('show');
    });
});
</script>

<script>
    // Teacher count script that will redirect to user page teacher
$('#teacher-count').click(function(e) {

    e.preventDefault();

    window.location.href = 'user.php';

    $('.custom-dropdown button').text('Teacher');

    $('.custom-dropdown li a[data-user-type="teacher"]').trigger('click');
});
</script>



