<!-- Manage addinng user -->
<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();
        var responseCount = 0; // Initialize the response count
        var formData = new FormData(this);

        var $hideModal = $('#add_learner_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionAddStudent.php';
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);

                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $hideModal.modal('hide');
                    responseCount++; //increment the response count

                    $('#successAlert').text(responseData.success);
                    if (responseCount > 1) {
                        $('#successBanner').text('Re-add'); // Change the banner text
                    } else {
                        $('#successBanner').text('Success');
                    }


                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);


                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    $hideModal.modal('hide');
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        // location.reload();
                    }, 1500);
                }
            },
            error: function() {
                $hideModal.modal('hide');
                // Show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                });
            }

        });
    });
});
</script>