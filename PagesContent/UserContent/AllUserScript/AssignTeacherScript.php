
<script>
$(document).ready(function() {
    // Counter to keep track of added selects
    var selectCounter = 1;

    // Add a new select when the "Add More Class" button is clicked
    $('#assign_more_class_btn').click(function(e) {
        e.preventDefault();

        // Clone the original select element
        var $newSelect = $('.assign_class').first().clone();

        // Generate a unique ID for the new select element
        var newSelectId = 'assign_class_id_' + selectCounter;

        // Update the attributes of the cloned select
        $newSelect.attr('id', newSelectId);
        $newSelect.attr('name', newSelectId);

        // Create a remove button for the new select
        var $removeButton = $(
            '<a href="#" class="remove_class" data-toggle="tooltip" title="Remove Class"><i class="fa fa-minus text-danger"></i></a>'
            );

        // Append the new select and remove button to the modal body
        $('.modal-body .form-group:last').append($newSelect).append($removeButton);

        selectCounter++;
    });

    // Remove a select when the remove button is clicked
    $('.modal-body').on('click', '.remove_class', function(e) {
        e.preventDefault();
        $(this).prev('select').remove(); // Remove the select
        $(this).remove(); // Remove the remove button
    });
});
</script>