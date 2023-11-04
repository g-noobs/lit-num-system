<script>
$(document).ready(function() {
    $('#uploadCSVForm').on('submit', function(e) {
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
            success: function(response) {
                var responseData = JSON.parse(response);

                // Hide the loading spinner
                $("#loadingSpinner").hide();

                if (responseData.hasOwnProperty('success')) {
                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                    }, 1500);

                    // Clear the form input after a successful submission
                    $('#file').val(''); // Assuming the input field has the ID 'file'

                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                    }, 1500);
                }
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


