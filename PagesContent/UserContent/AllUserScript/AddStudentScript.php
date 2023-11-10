<script>
$(document).ready(function() {

    // Add custom validation method for numbers and letters only
    $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    }, "Please enter only letters and numbers.");
    // Add custom validation method for names without numbers
    $.validator.addMethod("noNumbers", function(value, element) {
        return this.optional(element) || /^[^\d]+$/.test(value);
    }, "Please enter a valid name without numbers.");

    // Add custom validation method for numbers without letters
    $.validator.addMethod("onlyNumbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/.test(value);
    }, "Please enter a valid number without letters.");

    // Initialize the form validation
    $("#addUserForm").validate({
        rules: {
            last_name: {
                noNumbers: true
            },
            first_name: {
                noNumbers: true
            },
            personal_id: {
                alphanumeric: true
            },
            phone_num: {
                onlyNumbers: true
            },
            zip_code: {
                onlyNumbers: true
            },
            guardian_last_name: {
                noNumbers: true
            },
            guardian_first_name: {
                noNumbers: true
            },
            guardian_phone_num: {
                onlyNumbers: true
            }
        },
        messages: {
            // Custom error messages can be added here if needed
        },
        errorPlacement: function(error, element) {
            // Display error messages in the div with the corresponding id
            var errorId = element.attr('name') + "_error";
            error.appendTo("#formError");
        },
        submitHandler: function(form) {
            // Form submission logic goes here
            var formData = new FormData(form);

            var $hideModal = $('#add_user_modal');
            var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionAddStudent.php';

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

                        }, 1500);
                    } else if (responseData.hasOwnProperty('error')) {
                        $hideModal.modal('hide');
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");

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

                    }, 1500);
                }
            });
        }
    });
});
</script>