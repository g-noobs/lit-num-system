<script>
$(function(){
    $("#subjForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "../PagesContent/SubjectFolder/ActionSubj/AddSubjAction.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);
                if (responseData.hasOwnProperty('success')) {
                    var msg = responseData.success;
                    //hide modal
                    $('#add-subj').modal('hide');

                    $('#successAlert').text(msg);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut(
                        "slow"); // Hide the .alert element after 3 seconds
                        location.reload();
                    }, 1500);
                } else if (responseData.hasOwnProperty('error')) {
                    var msg = responseData.error;
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
            },
            error: function(response) {
                console.log(response);
                var msg = "Possible Ajax issue!"
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
        });

    });
});
</script>