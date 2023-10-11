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


<script>
$(document).ready(function() {
    var userId = '';
    var fName = '';
    var lName = '';

    // Store user data when clicking the icon
    $('.archIconBtn').click(function(e) {
        e.preventDefault();
        // Get the row data
        userId = $(this).data('id');
        fName = $(this).closest('tr').find('td:eq(3)').text();
        lName = $(this).closest('tr').find('td:eq(4)').text();

        $('#arch_usr_id').text(userId);
        $('#arch_usr_name').text(fName + ' ' + lName);

    });

    $('.actvIconBtn').on('click', function(e) {
        e.preventDefault();

        userId = $(this).data('id');
        fName = $(this).closest('tr').find('td:eq(3)').text();
        lName = $(this).closest('tr').find('td:eq(4)').text();

        $('#act_usr_id').text(userId);
        $('#act_usr_name').text(fName + ' ' + lName);

    });

    // Update user data when clicking the "Update" button
    $('#actvUsrBtn').on('click', function(e) {
        e.preventDefault();
        if (userId !== '') {
            var act_usr_id = userId;
            var usr_status = '1';
            ajaxProcess(act_usr_id, usr_status);
        }
    });

    $('#archUserBtn').on('click', function(e) {
        e.preventDefault();
        if (userId !== '') {
            var arch_user_id = userId;
            var usr_status = '0';
            ajaxProcess(arch_user_id, usr_status);
        }
    });

    // Clear variables and modal when it is dismissed
    $('#activateUserModal, #archiveUserModal').on('hidden.bs.modal', function() {
        userId = '';
        fName = '';
        lName = '';
        $('#act_usr_id').text('');
        $('#act_usr_name').text('');
        $('#arch_usr_id').text('');
        $('#arch_usr_name').text('');
    });

    function ajaxProcess(usr_id, usr_status) {
        var hideModal = $('#activateUserModal, #archiveUserModal');
        $.ajax({
            url: '../PagesContent/UserContent/ActionsUsers/UpdateUserStatus.php',
            type: 'POST',
            data: {
                id: usr_id,
                status: usr_status
            },
            success: function(response) {
                // reload div where the table is #mainContent
                $("#mainContent").load(" #mainContent > *");

                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    hideModal.modal("hide");
                    $('#successAlert').text(usr_id + ' has been ' + responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut(
                            "slow"); // Hide the .alert element after 1.5 seconds

                        location.reload();
                    }, 1500);

                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    hideModal.modal("hide");
                    $('#errorAlert').text(responseData.error + ' for ' + usr_id);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut(
                            "slow"); // Hide the .alert element after 1.5 seconds
                        location.reload();
                    }, 1500);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                hideModal.modal('hide');
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    }
});
</script>



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