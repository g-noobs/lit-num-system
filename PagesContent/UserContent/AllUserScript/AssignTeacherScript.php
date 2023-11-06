

<script>
$(document).ready(function() {
    // Initialize a counter to keep track of added selects
    var selectCounter = 1;
    
    // Clone the initial select and reset its selected option
    function createNewSelect() {
        var newSelect = $(".assign_class:first").clone();
        newSelect.find("option:selected").prop("selected", false);
        newSelect.find("option:first").prop("selected", true);
        newSelect.attr("name", "assign_class_id_" + selectCounter);
        selectCounter++;
        return newSelect;
    }
    
    // Add a new select when the "Assign More Class" button is clicked
    $("#assign_more_class_btn").click(function() {
        var newSelect = createNewSelect();
        $(".form-group:last").append(newSelect);
        
        // Disable the button if all options are selected
        if ($(".assign_class option:not(:selected)").length === 0) {
            $("#assign_more_class_btn").prop("disabled", true);
        }
    });

    // Handle disabling or removing options from other selects
    $(".assign_class").change(function() {
        var selectedValue = $(this).val();
        $(".assign_class").not(this).find("option").prop("disabled", false);
        $(".assign_class").not(this).find("option[value='" + selectedValue + "']").prop("disabled", true);
    });
});
</script>
