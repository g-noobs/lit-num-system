<script>
$(document).ready(function() {
    // Handle the click event for the "Assign More Class" button
    $("#assign_more_class_btn").click(function(e) {
        e.preventDefault();

        // Clone the select element and append it to the form
        var originalSelect = $(".assign_c select");
        var newSelect = originalSelect.clone();
        $(".form-group.row").append(newSelect);
    });
});
</script>