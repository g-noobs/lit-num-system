<!-- Add this script tag to include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Counter to keep track of the number of added selects
    var selectCounter = 1;

    // Handle the "assign_more_class_btn" button click event
    $("#assign_more_class_btn").on("click", function(e) {
        e.preventDefault();

        // Clone the original select element
        var $originalSelect = $(".assign_class:first");
        var $newSelect = $originalSelect.clone();

        // Update the ID and name attributes to ensure uniqueness
        var newSelectId = "assign_class_" + selectCounter;
        var newSelectName = "assign_class_id_" + selectCounter;
        $newSelect.attr("id", newSelectId);
        $newSelect.attr("name", newSelectName);

        // Append the new select to the form
        $(".modal-body .form-group:last").before($newSelect);

        selectCounter++;

        // Disable or remove selected options in other select elements
        $(".assign_class").not($newSelect).find("option:selected").prop("disabled", true);
    });

    // Handle change event for select elements to re-enable selected options
    $(".assign_class").on("change", function() {
        var selectedValue = $(this).val();
        $(".assign_class").not(this).find("option").prop("disabled", false);
        $(".assign_class").not(this).each(function() {
            $(this).find('option[value="' + selectedValue + '"]').prop("disabled", true);
        });
    });
});
</script>