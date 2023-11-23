<script>
$(document).ready(function() {
    $('#uploadCSVForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        // Display a loading spinner
        $("#loadingSpinner").show();
        $('#response').hide();

        $.ajax({
            type: 'POST',
            url: '../PagesContent/UserContent/ActionsUsers/BatchUploadAction.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Hide the loading spinner
                $("#loadingSpinner").hide();

                if (Array.isArray(response)) {
                    // Clear previous error messages
                    $("#alert_container").empty();
                    $("#alert_container").show();

                    $.each(response, function(index, item) {
                        if (item.hasOwnProperty('error')) {
                            $("#alert_container").append(
                                "<div class='alert alert-danger alert-dismissible fade in errorBanner'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Error!</b><span>" +
                                item.error + "</span></div>");
                            $('.errorBanner').fadein();
                            console.log(item.error);
                        } else if (item.hasOwnProperty('success')) {
                            $("#alert_container").append(
                                "<div class='alert alert-success alert-dismissible fade in errorBanner'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Error!</b><span>" +
                                item.success + "</span></div>");
                            $('.successBanner').fadein();
                            
                        }
                    });

                    setTimeout(function() {
                        $("#alert_container").fadeOut("slow");
                        $('.errorBanner').fadeout();
                    }, 6500);
                } else {
                    // Check if the form submission was successful
                    if (response.hasOwnProperty('success')) {
                        $hideModal.modal('hide');
                        $('#successAlert').text(response.success);
                        $('#successBanner').show();
                        // setTimeout(function() {
                        //     $("#successBanner").fadeOut("slow");
                        //     location.reload();
                        // }, 1500);



                    } else if (response.hasOwnProperty('error')) {
                        $hideModal.modal('hide');
                        $('#errorAlert').text(response.error);
                        $('#errorBanner').show();
                        // setTimeout(function() {
                        //     $("#errorBanner").fadeOut("slow");
                        //     location.reload();
                        // }, 1500);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', status, error);

                // Hide the loading spinner
                $("#loadingSpinner").hide();

                // Show an error message
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                // setTimeout(function() {
                //     $("#errorBanner").fadeOut("slow");
                // }, 1500);
                // location.reload();
                $('#response').text('Seomething went wrong');
                $('#response').show();
                setTimeout(function() {
                    $("#response").fadeOut("slow");
                }, 3500);
            }
        });
    });
    $('#uploadCSVForm').on('reset', function(e) {
        // Hide the loading spinner
        $("#loadingSpinner").hide();
    });
});
</script>