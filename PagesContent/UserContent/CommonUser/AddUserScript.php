<!-- Manage addinng user -->
<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $hideModal = $('#add-user');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionRegisterUser.php';
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $hideModal.modal('hide');
                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);


                    // You can redirect to a different page or perform other actions here
                } else if (responseData.hasOwnProperty('error')) {
                    $hideModal.modal('hide');
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);
                }
            },
            error: function() {
                $hideModal.modal('hide');
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                    location.reload();
                }, 1500);
            }

        });
    });
});
</script>

<!-- Script that will disable the option if for usertype if either learner - teach is selected-->
<script>
$(function(){
    $("#btnAddTeacher, #btnAddAdmin, #btnAddLearner").on("click", function(){
        var userType = $(this).data('user-level');
        
        // Enable the corresponding option and disable the rest
        $("#user option").prop("disabled", true); // Disable all options
        $("#user option[value='" + userType + "']").prop("disabled", false); // Enable the selected option

        // Set the value and text to the selected userType
        $("#user").val(userType);
        $("#user option:selected").text(userType);

        if(userType === 'Admin'){
            // Set personal_id as readonly and set its value to a default
        $("#personal-id").prop("disabled", true);
            $("#personal-id").fadeOut();
        }
    });
});
</script>
