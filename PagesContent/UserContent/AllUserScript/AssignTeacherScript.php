
<script>
$(document).ready(function() {
    // Initialize a counter to keep track of the number of added selects
    var selectCounter = 1;

    // When the "Assign More Class" button is clicked
    $('#assign_more_class_btn').on('click', function(e) {
        e.preventDefault();
        
        // Clone the original select element
        var originalSelect = $('.assign_class').first();
        var clonedSelect = originalSelect.clone();

        // Modify the cloned select's name and ID to make them unique
        var newSelectName = 'assign_class_id_' + selectCounter;
        var newSelectId = 'assign_class_id_' + selectCounter;
        clonedSelect.attr('name', newSelectName);
        clonedSelect.attr('id', newSelectId);

        // Append the cloned select to the form
        $('.assign_c').append(clonedSelect);

        // Increment the counter
        selectCounter++;
    });
});
</script>
