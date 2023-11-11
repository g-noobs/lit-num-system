<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        var $hideModal = $('#add_user_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionRegisterAdmin.php';

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Check if the response contains an array of errors
                if (Array.isArray(response)) {
                    // Clear previous error messages
                    $("#add_user_modal_alert").empty();
                    $("#add_user_modal_alert").show();

                    // Update the element with the received errors
                    $.each(response, function(index, error) {
                        $("#add_user_modal_alert_text").append("<div class='error'>" + error +
                            "</div><br>");
                        console.log(error);
                    });

                    setTimeout(function() {
                        $("#add_user_modal_alert").fadeOut("slow");

                    }, 3500);
                } else {
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        $hideModal.modal('hide');
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");

                        }, 1500);



                    } else if (responseData.hasOwnProperty('error')) {
                        $hideModal.modal('hide');
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");

                        }, 1500);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
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