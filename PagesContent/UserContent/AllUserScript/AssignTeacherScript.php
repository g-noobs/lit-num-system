<script>
$(document).ready(function () {
    $("#assign_more_class_btn").click(function (e) {
        e.preventDefault();
        var select = $(".assign_class").clone();

        // Add a remove button to the new select element
        var removeButton = $("<a href='#' class='remove-class'><i class='fa fa-times'></i></a>");
        removeButton.click(function (e) {
            e.preventDefault();
            $(this).closest('.form-group').remove();
        });
        select.after(removeButton);

        // Append the new select element to the container
        $(".assigned-classes").append(select);

        // Reset the selected option in the original select
        $(".assign_class").val($(".assign_class option:first").val());
    });
});

</script>
