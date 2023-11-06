<script>
$(document).ready(function() {
    // Function to add a new select input
    $("#assign_more_class_btn").on("click", function(e) {
        e.preventDefault();

        // Clone the original select input
        var $newSelect = $(".assign_class").clone();

        // Add a remove button next to the new select
        $newSelect.addClass("form-control input-xs");
        $newSelect.prepend(
            "<a href='#' class='remove_class' title='Remove Class'><i class='fa fa-times'></i></a>");

        // Append the new select to the form
        $(".modal-body .form-group.row:last").after($newSelect);
    });

    // Function to remove a select input
    $(document).on("click", ".remove_class", function(e) {
        e.preventDefault();
        $(this).parent(".form-group").remove();
        checkEnableButton(); // Check button state after removal
    });



    // Initial check for button state
    checkEnableButton();

    // Trigger button state check on select change
    $(".assign_class").on("change", function() {
        checkEnableButton();
    });
});
</script>