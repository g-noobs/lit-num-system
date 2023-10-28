<script>
$(document).ready(function() {
    $('#uploadCSVForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '../PagesContent/UserContent/ActionsUsers/BatchUploadAction.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                try {
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            location.reload();
                        }, 1500);
                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                            location.reload();
                        }, 1500);
                    }
                }
                catch (e) {
                    console.log('Error parsing JSON:', e);
                }
            },error: function(xhr, status, error) {
                console.log('AJAX error:', status, error);
            //     $hideModal.modal('hide');
            //     //show alert banner id = errorBanner
            //     $('#errorAlert').text('An error occurred during the AJAX request.');
            //     $('#errorBanner').show();
            //     setTimeout(function() {
            //         $("#errorBanner").fadeOut("slow");
            //         location.reload();
            //     }, 1500);
            }
        });
    });
});
</script>