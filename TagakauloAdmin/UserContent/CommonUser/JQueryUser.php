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
            contentPath = '../UserContent/UserTable/AllActiveUserTable.php';
        } else if (userType === 'teacher') {
            contentPath = '../UserContent/UserTable/TeacherTableContent.php';
        } else if (userType === 'learner') {
            contentPath = '../UserContent/UserTable/StudentTableContent.php';
        } else if (userType === 'admin') {
            contentPath = '../UserContent/UserTable/AdminTableContent.php';
        }else if (userType === 'arch-all') {
            contentPath = '../UserContent/UserTable/AllArchUsersTable.php';
        }else if (userType === 'arch-admin') {
            contentPath = '../UserContent/UserTable/ArchiveAdminTable.php';
        } else if (userType === 'arch-teacher') {
            contentPath = '../UserContent/UserTable/ArchivedTeacherTable.php';
        } else if (userType === 'arch-learner') {
            contentPath = '../UserContent/UserTable/ArchivedStudentTable.php';
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
        var userId = $(this).closest('tr').find('td:eq(1)').text(); // Assuming the user_info_Id is in the second column (index 1)
        var persID = (this).closest('tr').find('td:eq(2)').text();
        
        var name = $(this).closest('tr').find('td:eq(3)').text();
        var nameParts = name.split(' ');
        var first_name = nameParts[0];
        var last_name = nameParts[1];

        var gender = $(this).closest('tr').find('td:eq(4)').text();
        var email = $(this).closest('tr').find('td:eq(5)').text();
        var date = $(this).closest('tr').find('td:eq(6)').text();
        var user = $(this).closest('tr').find('td:eq(7)').text();

        // Populate the modal fields with the data
        $('#edit-user').find('[name="userId"]').val(userId);
        $('#edit-user').find('[name="personal_id"]').val(persID);
        $('#edit-user').find('[name="first_name"]').val(first_name);
        $('#edit-user').find('[name="last_name"]').val(last_name);
        $('#edit-user').find('[name="gender"]').val(gender);
        $('#edit-user').find('[name="email"]').val(email);
        $('#edit-user').find('[name="date"]').val(date);
        $('#edit-user').find('[name="user"]').val(user);

        // Show the modal
        $('#edit-user').modal('show');
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
        var email = $(this).closest('tr').find('td:eq(4)').text();
        var date = $(this).closest('tr').find('td:eq(5)').text();
        var user = $(this).closest('tr').find('td:eq(6)').text();

        // Populate the modal fields with the data
        $('#activate-user').find('[name="userId"]').val(userId);
        $('#archive-user').find('[name="userId"]').val(userId);

        // Show the modal
        $('#activate-user').modal('show');
    });
});
</script>

<!--Hide the option to Enter Personal ID if Admin is selected from the option-->
<script>
$(document).ready(function() {
    // Function to toggle visibility of the "personal-id" form-group
    function togglePersonalIdForm() {
        var selectedOption = $('#user').val();
        if (selectedOption === 'Admin') {
            $('#personal-id').hide();
        } else {
            $('#personal-id').show();
        }
    }

    // Call the function on document ready
    togglePersonalIdForm();

    // Bind the function to the change event of the "user" select element
    $('#user').on('change', function() {
        togglePersonalIdForm();
    });
});
</script>



