<script>
$(function() {
    $("#add_class_form").on("submit", function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        var $hideModal = $('#add_class_modal');
        var actionUrl = '../PagesContent/ClassContent/ActionFolder/ActionAddClass.php';

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
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

                    }, 8500);
                } else {
                    if (responseData.hasOwnProperty('success')) {
                        $("#add_class_form")[0].reset();
                        $hideModal.modal('hide');
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            location.reload();
                        }, 1500);
                    } else if (responseData.hasOwnProperty('error')) {
                        $("#add_class_form")[0].reset();
                        $hideModal.modal('hide');
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                            location.reload();
                        }, 1500);
                    }
                }
            },
            error: function() {
                $("#add_class_form")[0].reset();
                $hideModal.modal('hide');
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                    location.reload();
                }, 1500);
            }

        });
    });
});
</script>