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
            success: function(response) {
                var responseData = JSON.parse(response);

                // Hide the loading spinner
                $("#loadingSpinner").hide();
                

                for (var i = 0; i < responseData.length; i++) {
                    if (responseData[i].hasOwnProperty('success')) {
                        $('#successAlert').text(responseData[i].success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                        }, 1500);
                    } else if (responseData[i].hasOwnProperty('error')) {
                        $('#errorAlert').text(responseData[i].error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                        }, 1500);
                    }
                }
                $('#response').text('Successfully uploaded the CSV file.');
                $('#response').show();
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', status, error);

                // Hide the loading spinner
                $("#loadingSpinner").hide();

                // Show an error message
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                }, 1500);
            }
        });
    });
    $('#uploadCSVForm').on('reset', function(e) {
        // Hide the loading spinner
        $("#loadingSpinner").hide();
    });
});
</script>