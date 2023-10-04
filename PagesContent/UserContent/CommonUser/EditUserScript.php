<!-- Jquery for Edit Icon -->
<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.edit').click(function() {
        // Get the row data
        var userId = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var edit_personal_id = $(this).closest('tr').find('td:eq(2)').text();
        var edit_first_name = $(this).closest('tr').find('td:eq(3)').text();
        var edit_last_name = $(this).closest('tr').find('td:eq(4)').text();
        var edit_gender = $(this).closest('tr').find('td:eq(5)').text();
        var edit_user = $(this).closest('tr').find('td:eq(8)').text();

        // Populate the modal fields with the data
        $('#edit-user').find('[name="userId"]').val(userId);
        $('#edit-user').find('[name="edit_personal_id"]').val(edit_personal_id);
        $('#edit-user').find('[name="edit_first_name"]').val(edit_first_name);
        $('#edit-user').find('[name="edit_last_name"]').val(edit_last_name);
        $('#edit-user').find('[name="edit_gender"]').val(edit_gender);

        $('#edit-user').find('[name="edit_user"]').val(edit_user);
    });

    //Edit Form within the modal
    $('#edit_user_form').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                
                url: '../PagesContent/UserContent/ActionsUsers/ActionEditUser.php',
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data (required for FormData)
                contentType: false, // Don't set content type (required for FormData)
                success: function(response) {
                    //Parse the JSON response
                    var responseData = JSON.parse(response);

                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        var msg = responseData.success;
                        //hide modal
                        $('#edit-user').modal('hide');

                        //show and assign message to the banner
                        $('#successAlert').text(msg);
                        $('#successBanner').show();

                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                            window.location.reload();
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
                            $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                            window.location.reload();
                        }, 2500);

                    }
                },
                // error: function(jqXHR, textStatus, errorThrown) {
                //     // Handle errors here
                //     $('#edit-user').modal('hide');
                //     console.log('ERRORS: ' + textStatus);
                //     // STOP LOADING SPINNER
                // }
            });
        });
});
</script>