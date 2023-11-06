<script>
$(document).ready(function() {
    $("#assign_more_class_btn").on("click", function() {
        // Clone the select element and remove the selected options
        var newSelect = $(".assign_class").first().clone();
        newSelect.find("option:selected").prop("selected", false);
        newSelect.find("option[value='']").prop("selected", true); // Select an empty option

        // Add the cloned select to the modal
        newSelect.appendTo($(".assign_class").parent());

        // Disable the previously selected option in other selects
        $(".assign_class").not(newSelect).each(function() {
            var selectedValue = newSelect.find("option:selected").val();
            $(this).find("option[value='" + selectedValue + "']").prop("disabled", true);
        });
    });

    // Handle form submission and validation here
});
</script>