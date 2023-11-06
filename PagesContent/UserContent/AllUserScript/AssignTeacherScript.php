<script>
$(document).ready(function() {
    // Counter to keep track of added selects
    var selectCount = 1;

    // Click event for the "assign_more_class_btn" button
    $("#assign_more_class_btn").on("click", function(e) {
        e.preventDefault();

        // Create a new select element based on the existing select
        var newSelect = $(".assign_class").clone();

        // Change the name and ID attributes to make them unique
        newSelect.attr("name", "assign_class_id_" + selectCount);
        newSelect.attr("id", "assign_class_id_" + selectCount);

        // Create a remove button next to the new select
        var removeButton = $("<a href='#' class='remove_select' data-toggle='tooltip' title='Remove Class'><i class='fa fa-times text-danger'></i></a>");

        // Add the new select and remove button to the modal
        $(".modal-body .form-group:last").after(newSelect);
        newSelect.after(removeButton);

        // Increment the selectCount
        selectCount++;

        // Click event for the remove button
        removeButton.on("click", function() {
            newSelect.remove();
            removeButton.remove();
        });
    });
});
</script>
