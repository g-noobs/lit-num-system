
<script>
$(document).ready(function() {
    var user_teacher_id = 0;

    $('.assign_class_btn').on('click',function() {
        $('#assign_class_modal').modal('show');
        user_teacher_id = $(this).data('id');
    });

    // When the "Assign More Class" button is clicked
    $('#assign_more_class_btn').on('click', function(e) {
        e.preventDefault();
        
        // Clone the original select element
        var originalSelect = $('.assign_class').first();
        var clonedSelect = originalSelect.clone();
        // Append the cloned select to the form
        $('.assign_c').append(clonedSelect);

    });

    $('#assign_class_form').submit(function(e) {
        e.preventDefault();
        var assign_class_id = [];
        //push all the selected values into an array that contains the name from class as assign_class_id
        $('.assign_class').each(function() {
            assign_class_id.push($(this).val());
        });
        // Create a data object with key-value pairs
        var data = {
            assign_class_id: assign_class_id,
            user_teacher_id: user_teacher_id
        };

        $.ajax({
            url: "../PagesContent/UserContent/ActionsUsers/ActionAssignTeacherClass.php",
            method: "POST",
            data: data,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $('#assign_class_form')[0].reset();
                    $('#assign_class_modal').modal('hide');

                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");

                    }, 1500);
                } else if (responseData.hasOwnProperty('error')) {
                    $('#assign_class_modal').modal('hide');
                    $('#assign_class_form')[0].reset();
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");

                    }, 1500);
                }
            },
            error: function() {
                $('#assign_class_modal').modal('hide');
                $('#assign_class_form')[0].reset();
                //show alert banner id = errorBanner
                $('#errorAlert').text('An error occurred during the AJAX request.');
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");

                }, 1500);
            }
        });
    });
});
</script>
