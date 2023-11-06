
<script>
$(document).ready(function() {
    // Initialize a counter to keep track of the number of added selects
    var selectCounter = 1;

    // When the "Assign More Module" button is clicked
    $('#assign_more_module').on('click', function(e) {
        e.preventDefault();
        
        // Clone the original select element
        var originalSelect = $('.assign_module').first();
        var clonedSelect = originalSelect.clone();

        // Modify the cloned select's name and ID to make them unique
        var newSelectName = 'assign_module_id_' + selectCounter;
        var newSelectId = 'assign_module_id_' + selectCounter;
        clonedSelect.attr('name', newSelectName);
        clonedSelect.attr('id', newSelectId);

        // Append the cloned select to the form
        $('.assign_m').append(clonedSelect);

        // Increment the counter
        selectCounter++;
    });
});
</script>
