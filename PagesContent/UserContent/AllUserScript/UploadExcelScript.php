<script>
$(document).ready(function () {
    $('#uploadCSVForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        // Display a loading spinner
        $("#loadingSpinner").show();

        $.ajax({
            type: 'POST',
            url: '../PagesContent/UserContent/ActionsUsers/BatchUploadAction.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Split the response into separate JSON objects based on newlines
                var responses = response.split('\n');

                // Hide the loading spinner
                $("#loadingSpinner").hide();

                responses.forEach(function (responseData) {
                    try {
                        responseData = responseData.trim();
                        if (responseData === "") {
                            return; // Skip empty lines
                        }

                        var parsedResponse = JSON.parse(responseData);
                        if (parsedResponse.hasOwnProperty('success')) {
                            // Create a new success banner for each success message
                            var successBanner = $('<div class="success-banner">')
                                .text(parsedResponse.success)
                                .hide()
                                .appendTo('#successBanner')
                                .show()
                                .delay(1500)
                                .fadeOut("slow");
                        } else if (parsedResponse.hasOwnProperty('error')) {
                            $('#errorAlert').text(parsedResponse.error);
                            $('#errorBanner').show();
                            setTimeout(function () {
                                $("#errorBanner").fadeOut("slow");
                            }, 1500);
                        }
                    } catch (error) {
                        console.error('Error parsing JSON:', error);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.log('AJAX error:', status, error);

                // Hide the loading spinner
                $("#loadingSpinner").hide();

                // Show an error message
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function () {
                    $("#errorBanner").fadeOut("slow");
                }, 1500);
            }
        });
    });
    $('#uploadCSVForm').on('reset', function (e) {
        // Hide the loading spinner
        $("#loadingSpinner").hide();
    });
});


</script>