
<script>
$(document).ready(function() {
    // Counter for dynamically created selects
    var selectCounter = 1;

    // Assign More Class button click event
    $("#assign_more_class_btn").on("click", function() {
        // Clone the original select
        var $originalSelect = $(".assign_class").first();
        var $clonedSelect = $originalSelect.clone();

        // Update the name and id attributes of the cloned select to make them unique
        var selectName = "assign_class_id_" + selectCounter;
        var selectId = "assign_class_" + selectCounter;

        $clonedSelect.attr("name", selectName);
        $clonedSelect.attr("id", selectId);

        // Disable or remove options that are already selected in other selects
        $(".assign_class").each(function() {
            var selectedValue = $(this).val();
            $clonedSelect.find('option[value="' + selectedValue + '"]').remove();
        });

        // Append the cloned select to the modal body
        $(".modal-body").append($clonedSelect);

        // Increment the select counter
        selectCounter++;
    });
});
</script>
