<script>
$(document).ready(function() {
    // Function to handle adding additional select elements
    $("#assign_more_class_btn").click(function(e) {
        e.preventDefault();

        // Clone the original select element
        var originalSelect = $(".assign_class").eq(0);
        var clonedSelect = originalSelect.clone();

        // Remove the selected option from the cloned select element
        clonedSelect.find("option:selected").prop("disabled", true);

        // Append the cloned select element to the form
        $(".modal-body .form-group.row").append(clonedSelect);
    });

    // Function to handle form submission
    $("#assign_class_form").submit(function(e) {
        e.preventDefault();

        // Add your form submission logic here

        // For example, you can use AJAX to submit the form data
        $.ajax({
            url: "your_server_endpoint",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                // Handle success response
            },
            error: function(error) {
                // Handle error response
            }
        });
    });
});
</script>