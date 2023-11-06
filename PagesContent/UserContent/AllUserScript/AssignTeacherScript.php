<script>
$(document).ready(function() {
    var $assignClassForm = $('#assign_class_form');
    var $assignClassSelect = $assignClassForm.find('.assign_class');
    var $assignMoreClassBtn = $('#assign_more_class_btn');
    
    // Disable the "Assign Teacher" button initially
    $assignClassForm.find('button[type="submit"]').prop('disabled', true);

    // Add an additional select when the "Assign More Class" button is clicked
    $assignMoreClassBtn.on('click', function() {
        var $newSelect = $assignClassSelect.clone();
        var $removeButton = $('<a href="#" class="remove-class-btn" data-toggle="tooltip" title="Remove Class"><i class="fa fa-times text-danger"></i></a>');
        
        // Add a new select and remove button
        $newSelect.appendTo($assignClassForm.find('.form-group.row'));
        $removeButton.appendTo($newSelect.parent());
        
        // Enable the "Assign Teacher" button if at least one select is added
        $assignClassForm.find('button[type="submit"]').prop('disabled', false);
        
        // Add a click event to the remove button
        $removeButton.on('click', function(e) {
            e.preventDefault();
            $newSelect.remove();
            $removeButton.remove();
            
            // Check if there are any selects left, and disable the button if none
            if ($assignClassForm.find('.assign_class').length === 1) {
                $assignClassForm.find('button[type="submit"]').prop('disabled', true);
            }
        });
    });
});
</script>