<script>
$(function() {
    $('#adduserForm').on('submit', function() {

        var formData = new FormData(this);
        console.log(this);

        var $hideModal = $('#add_user_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionAddStudent.php';

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            dataType: 'json',

            success: function(response) {
                if (Array.isArray(response)) {
                    // Clear previous error messages
                    $("#add_user_modal_alert_text").empty();
                    $("#add_user_modal_alert").show();

                    // Update the element with the received errors
                    $.each(response, function(index, error) {
                        $("#add_user_modal_alert_text").append("<p class='error'>" +
                            error +
                            "</p><br>");
                        console.log(error);
                    });

                    setTimeout(function() {
                        $("#add_user_modal_alert").fadeOut("slow");

                    }, 3500);
                } else {
                    // Check if the form submission was successful
                    if (response.hasOwnProperty('success')) {
                        $hideModal.modal('hide');
                        $('#successAlert').text(response.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");

                        }, 1500);
                    } else if (response.hasOwnProperty('error')) {
                        $hideModal.modal('hide');
                        $('#errorAlert').text(response.error);
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