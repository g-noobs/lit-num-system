<!-- Add this code to your HTML file, preferably just before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Counter to keep track of added selects
    var selectCount = 1;

    // Function to disable selected options in other selects
    function disableSelectedOptions() {
        var selectedValues = [];
        $('.assign_class').each(function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                selectedValues.push(selectedValue);
            }
        });

        $('.assign_class').find('option').prop('disabled', false);

        selectedValues.forEach(function(value) {
            $('.assign_class').not(':eq(' + (selectCount - 1) + ')').find('option[value="' + value +
                '"]').prop('disabled', true);
        });
    }

    // Add an additional select when the button is clicked
    $('#assign_more_class_btn').click(function(e) {
        e.preventDefault();

        var newSelect = $('<select>').attr({
            'name': 'assign_class_id_' + selectCount,
            'class': 'form-control input-xs assign_class'
        });

        $('.assign_class').each(function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                newSelect.append($('<option>', {
                    value: selectedValue,
                    text: $(this).find('option:selected').text()
                }));
            }
        });

        $('#assign_class_form .form-group').append(newSelect);
        selectCount++;

        disableSelectedOptions();
    });

    // Initial setup to disable selected options
    disableSelectedOptions();
});
</script>