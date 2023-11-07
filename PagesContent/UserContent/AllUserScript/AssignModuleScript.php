<script>
$(document).ready(function() {
    var user_teacher_id = 0;

    $('.assign_module_btn').on('click',function() {
        $('#assign_module_modal').modal('show');
        user_teacher_id = $(this).data('id');
    });

    // When the "Assign More Module" button is clicked
    $('#assign_more_module_btn').on('click', function(e) {
        e.preventDefault();

        // Clone the original select element
        var originalSelect = $('.assign_module').first();
        var clonedSelect = originalSelect.clone();
        // Append the cloned select to the form
        $('.assign_m').append(clonedSelect);

    });
    $('#assign_module_form').submit(function(e){
        e.preventDefault();
        var assign_module_id = [];
        //push all the selected value into an array that contains the name from module as assign_module_id
        $('.assign_module').each(function(){
            assign_module_id.push($(this).val());
        });
        // Create a data object with key-value pairs
        var data = {
            assign_module_id: assign_module_id,
            user_teacher_id: user_teacher_id
        };

        $.ajax({
            url: "../PagesContent/UserContent/ActionsUsers/ActionAssignTeacherModule.php",
            method: "POST",
            data: data,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    $('#assign_module_form')[0].reset();
                    $('#assign_module_modal').modal('hide');

                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");

                    }, 1500);
                } else if (responseData.hasOwnProperty('error')) {
                    $('#assign_module_modal').modal('hide');
                    $('#assign_module_form')[0].reset();
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");

                    }, 1500);
                }
            }
        });
    });

});
</script>