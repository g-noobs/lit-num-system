<!-- Manage addinng user -->
<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $hideModal = $(this).closest('.modal');
        $.ajax({

            url: '../PagesContent/UserContent/ActionUsers/ActionRegisterUser.php',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $hideModal.hide();
                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location
                    .reload(); // Hide the .alert element after 3 seconds
                    }, 1500);


                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    $hideModal.hide();
                    //show alert banner id = errorBanner
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload(); // Hide the .alert element after 3 seconds
                    }, 1500);
                }
            },
            error: function() {
                $hideModal.modal('hide');
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                    location.reload(); // Hide the .alert element after 3 seconds
                }, 1500);
            }

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

        //if user is eqausl to admin do not show allow to open the #edit-user modal
        if(user == 'Admin'){
            $('#edit-user').modal.hide();
        }
        else{
            // Show the modal
            $('#edit-user').modal('show');
        }

    
        //Edit Form within the modal
        $('#edit_user').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '../PagesContent/UserContent/ActionUsers/ActionEditUser.php',
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data (required for FormData)
                contentType: false, // Don't set content type (required for FormData)
                success: function(response) {
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
                        setTimeout(function() {
                            $("#successBanner").fadeOut(
                                "slow"
                            ); // Hide the .alert element after 3 seconds
                        }, 2500);

                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        var msg = responseData.error;
                        // hide modal
                        $('#edit-user').modal('hide');

                        //assign text to banner and show
                        $('#errorAlert').text(msg);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut(
                                "slow"
                            ); // Hide the .alert element after 3 seconds
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

