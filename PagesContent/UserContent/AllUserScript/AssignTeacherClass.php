<script>
$(document).ready(function() {
    $('#assign_more_class').click(function() {
        var $assignClassSelect = $(
            '<select name="assign_class_id" class="form-control input-xs assign_class"></select>');
        var $assignClassOption = $('.assign_class option').clone();

        $assignClassSelect.append($assignClassOption);

        // Disable the selected option in other selects
        $('select.assign_class').each(function() {
            var selectedOptionValue = $(this).val();
            if (selectedOptionValue) {
                $assignClassSelect.find('option[value="' + selectedOptionValue + '"]').prop(
                    'disabled', true);
            }
        });

        // Append the new select to the modal body
        $('.modal-body').find('.form-group.row').append($('<div class="col-xs-8"></div>').append(
            $assignClassSelect));
    });

    // Handle form submission
    $('#assign_class_form').on('submit', function(e) {
        e.preventDefault();
        // Handle the form submission logic here
    });
});
</script>