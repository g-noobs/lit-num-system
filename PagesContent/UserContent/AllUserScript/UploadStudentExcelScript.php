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
            url: '../PagesContent/UserContent/ActionsUsers/BatchUploadStudent.php',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Hide the loading spinner
                $("#loadingSpinner").hide();
                var response = response;

                for (var i = 0; i < response.length; i++) {
                    if (response[i].hasOwnProperty('success')) {
                        // Create a new success banner for each success message
                        var successBanner = $('<div class="success-banner">')
                            .text(response[i].success)
                            .hide()
                            .appendTo('#successBanner')
                            .show()
                            .delay(1500)
                            .fadeOut("slow");
                    } else if (response[i].hasOwnProperty('error')) {
                        $('#errorAlert').text(response[i].error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                        }, 1500);
                    }
                }

                location.reload();
                $('#response').text('Successfully uploaded data');
                $('#response').show();
                setTimeout(function() {
                    $("#response").fadeOut("slow");
                }, 3500);
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
                location.reload();
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