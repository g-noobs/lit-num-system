<script>
$(function() {
    $("#editUserForm").on("submit",function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var action_url = "../PagesContent/ProfileContent/ActionEditAdmin.php";

        $.ajax({
            url: action_url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                // Check if the form submission was successful
                if (response.hasOwnProperty('success')) {
                    $('#successAlert').text(response.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        //location.reload();
                    }, 2500);
                } else if (response.hasOwnProperty('error')) {
                    $('#errorAlert').text(response.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        //location.reload();
                    }, 2500);
                }
            },
            error: function() {
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                        //location.reload();
                }, 2500);
            }

        });
    });
})
</script>