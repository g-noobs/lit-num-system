<script>
$(function() {
    $('#add_class_btn').on('click', function(e) {
        e.preventDefault();
        $("#add_class_form").on("submit", function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            var $modal = $('#add_class_modal');
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
                            $("#add_user_modal_alert_text").append(
                                "<p class='error'>" +
                                error +
                                "</p><br>");
                            console.log(error);
                        });

                        setTimeout(function() {
                            $("#add_user_modal_alert").fadeOut("slow");

                        }, 8500);
                    } else {
                        if (response.hasOwnProperty('success')) {
                            $("#add_class_form")[0].reset();
                            $modal.modal('hide');
                            $('#successAlert').text(response.success);
                            $('#successBanner').show();
                            setTimeout(function() {
                                $("#successBanner").fadeOut("slow");
                                location.reload();
                            }, 1500);
                        } else if (response.hasOwnProperty('error')) {
                            $("#add_class_form")[0].reset();
                            $modal.modal('hide');
                            $('#errorAlert').text(response.error);
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
                    $modal.modal('hide');
                    //show alert banner id = errorBanner
                    $('#errorAlert').text(
                        'An error occurred during the AJAX request.');
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);
                }

            });
        });
    });

});
</script>

