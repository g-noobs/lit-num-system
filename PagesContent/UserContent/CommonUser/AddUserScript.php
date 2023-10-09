<!-- Manage addinng user -->
<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $hideModal = $('#add-user');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionRegisterUser.php';
        $.ajax({
            url: '../PagesContent/UserContent/ActionsUsers/ActionRegisterUser.php',
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $("#mainContent").load(" #mainContent > *");
                    $hideModal.modal('hide');
                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                    }, 1500);


                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    $('#add-user').modal('hide');
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");

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
                }, 1500);
            }

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
    });
});
</script>