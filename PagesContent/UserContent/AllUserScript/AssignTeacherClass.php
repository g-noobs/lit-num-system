<script>
$(document).ready(function() {
    var $assignClassSelect = $('.assign_class');
    var $assignMoreClassButton = $('#assign_more_class');

    $assignMoreClassButton.click(function() {
        var availableOptions = $assignClassSelect.find('option:not(:disabled)').clone();

        if (availableOptions.length === 0) {
            return; // No available options left
        }

        var $newAssignClassSelect = $(
            '<select name="assign_class_id" class="form-control input-xs assign_class"></select>');
        $newAssignClassSelect.append(availableOptions);

        // Disable the selected option in other selects
        $assignClassSelect.each(function() {
            var selectedOptionValue = $(this).val();
            if (selectedOptionValue) {
                $newAssignClassSelect.find('option[value="' + selectedOptionValue + '"]').prop(
                    'disabled', true);
            }
        });

        // Append the new select to the modal body
        $('.modal-body').find('.form-group.row').append($('<div class="col-xs-8"></div>').append(
            $newAssignClassSelect));

        // Check if there are still available options to decide whether to disable the button
        availableOptions = $assignClassSelect.find('option:not(:disabled)').clone();
        if (availableOptions.length === 0) {
            $assignMoreClassButton.prop('disabled', true);
        }
    });

    // Handle form submission
    $('#assign_class_form').on('submit', function(e) {
        e.preventDefault();
        // Handle the form submission logic here
    });
});
</script>