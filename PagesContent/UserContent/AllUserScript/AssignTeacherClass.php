<script>
$(document).ready(function() {
    // Counter to keep track of the number of added selects
    var selectCounter = 0;

    // Function to create a new select element
    function createSelect() {
        selectCounter++;
        var newSelect = $('<select>')
            .attr('name', 'assign_class_id_' + selectCounter)
            .addClass('form-control input-xs assign_class')
            .append($('<option>', {
                value: '',
                text: 'Select a class'
            }));

        // Clone and append the options from the original select to the new select
        $('.assign_class option').not(':selected').clone().appendTo(newSelect);

        return newSelect;
    }

    // Click event handler for the "assign_more_class" button
    $('#assign_more_class').click(function(e) {
        e.preventDefault();

        // Create a new select element
        var newSelect = createSelect();

        // Append the new select to the form
        $('.form-group.row:last').append(newSelect);
    });

    // Change event handler for the original select
    $(document).on('change', '.assign_class', function() {
        var selectedValue = $(this).val();

        // Disable the selected option in all other selects
        $('.assign_class').not(this).find('option').prop('disabled', false);
        $('.assign_class').not(this).each(function() {
            $(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
        });
    });
});
</script>