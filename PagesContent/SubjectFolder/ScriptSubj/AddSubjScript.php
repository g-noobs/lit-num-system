<script>
$(function() {
    $("#subjForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "../PagesContent/SubjectFolder/ActionSubj/AddSubjAction.php",
            method: "POST",
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

                    }, 3500);
                } else {
                    if (response.hasOwnProperty('success')) {
                        var msg = response.success;
                        //hide modal
                        $('#add-subj').modal('hide');
                        $('#successAlert').text(msg);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut(
                                "slow"); // Hide the .alert element after 3 seconds
                            location.reload();
                        }, 1500);
                    } else if (response.hasOwnProperty('error')) {
                        var msg = response.error;
                        //hide modal
                        $('#add-subj').modal('hide');
                        $('#errorAlert').text(msg);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut(
                                "slow"); // Hide the .alert element after 3 seconds
                            location.reload();
                        }, 1500);
                    }
                }
            },
            error: function(response) {
                console.log(response);
                var msg = "Possible Ajax issue!"
                //hide modal
                $('#add-subj').modal('hide');
                $('#errorAlert').text(msg);
                $('#errorBanner').show();

                // setTimeout(function() {
                //     $("#errorBanner").fadeOut(
                //         "slow"); // Hide the .alert element after 3 seconds
                //     location.reload();
                // }, 1500);
            }
        });

    });
});
</script>