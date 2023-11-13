<script>
$(function() {
    $("#editUserForm").on("submit",function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var action_url = "../PagesContent/ProfileContent/ActionEditAdmin.php";

        $.ajax({
            url: action_url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                // Check if the response contains an array of errors
                if (Array.isArray(response)) {
                    // Clear previous error messages
                    $("#add_user_modal_alert_text").empty();
                    $("#add_user_modal_alert").show();

                    // Update the element with the received errors
                    $.each(response, function(index, error) {
                        $("#add_user_modal_alert_text").append("<p class='error'>" + error +
                            "</p><br>");
                        console.log(error);
                    });

                    setTimeout(function() {
                        $("#add_user_modal_alert").fadeOut("slow");

                    }, 3500);
                }
                // Check if the form submission was successful
                if (response.hasOwnProperty('success')) {
                    $('#successAlert').text(response.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        //location.reload();
                    }, 2500);
                } else if (response.hasOwnProperty('error')) {
                    $('#errorAlert').text(response.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        //location.reload();
                    }, 2500);
                }
            },
            error: function() {
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                        //location.reload();
                }, 2500);
            }

        });
    });
})
</script>