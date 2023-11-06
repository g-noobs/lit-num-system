
<script>
$(document).ready(function() {
    // Initialize a counter to keep track of the number of added selects
    var selectCounter = 1;
    var user_teacher_id = 0;

    $('.assign_class_btn').on().click(function() {
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

    $('#assign_class_form').on().submit(function(e) {
        e.preventDefault();
        var assign_class_id = [];
        //push all the selected values into an array that contains the name from class as assign_class_id
        $('.assign_class').each(function() {
            assign_class_id.push($(this).val());
        });

        $.ajax({
            url: "../Database/AssignClass.php",
            method: "POST",
            data: assign_class_id, user_teacher_id,
            success: function(data) {
                $('#assign_class_form')[0].reset();
                $('#assign_class_modal').modal('hide');
                $('#response').html(data);
                $('#response').fadeIn('slow');
                $('#response').fadeOut('slow');
                setTimeout(function() {
                    $('#response').html('');
                }, 5000);
                $('#mainContent').load('../PagesContent/UserContent/UserTable/TeacherTableContent.php');
            }
        });
    });
});
</script>
