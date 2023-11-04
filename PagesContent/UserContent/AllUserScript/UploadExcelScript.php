
<script>
$(document).ready(function() {
    $("#uploadCSVForm").on('submit', function(e) {
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
            success: function(responses) {
                // Hide the loading spinner
                $("#loadingSpinner").hide();
                responses = JSON.parse(responses);

                // Process and display each response
                for (var i = 0; i < responses.length; i++) {
                    var response = responses[i];
                    if (response.success) {
                        $('#successAlert').text(response.success);
                        $('#successBanner').show();
                    } else if (response.error) {
                        $('#errorAlert').text(response.error);
                        $('#errorBanner').show();
                    }

                    // Wait for a few seconds and then hide the alert
                    setTimeout(function() {
                        $('#errorBanner').hide();
                        $('#successBanner').hide();
                    }, 1500);
                }
                $('$response').text('Successfully uploaded the CSV file.');
                $('#response').show();
            },
            error: function() {
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                // Hide the loading spinner
                $("#loadingSpinner").hide();
                $('$response').text('Error adding csv file.');
                $('#response').show();
            }
        });
    });
});
$('#uploadCSVForm').on('reset', function(e) {
    // Hide the loading spinner
    $("#loadingSpinner").hide();
});
</script>