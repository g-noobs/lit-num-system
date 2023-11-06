<script>
$(document).ready(function() {
    var $assignClassSelect = $('.assign_class');
    var $assignMoreClassBtn = $('#assign_more_class_btn');

    $assignMoreClassBtn.on('click', function(e) {
        e.preventDefault();

        var selectedOption = $assignClassSelect.find('option:selected');
        if (selectedOption.length === 0) {
            // All options are selected, disable the button
            $assignMoreClassBtn.prop('disabled', true);
        } else {
            // Enable the button
            $assignMoreClassBtn.prop('disabled', false);

            // Remove the selected option from other select elements
            $('.assign_class option').show();
            selectedOption.each(function() {
                var value = $(this).val();
                $('.assign_class option[value="' + value + '"]').hide();
            });
        }

        // Clone the original select and append it
        var clonedSelect = $assignClassSelect.clone();
        $assignClassSelect.after(clonedSelect);
    });
});
</script>