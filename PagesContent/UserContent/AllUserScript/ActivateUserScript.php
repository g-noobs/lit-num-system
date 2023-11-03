<script>
$(document).ready(function() {
    // Check or uncheck all checkboxes when the "Select All" checkbox is clicked
    $("#select-all").click(function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });

    // Handle the update button click event
    $("#archive_btn").click(function() {
        var selectedIds = [];
        // Iterate through all checked checkboxes and collect their values
        $(".checkbox:checked").each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            // Show a modal if no checkboxes are selected
            $('#no_data_selected_modal').modal('show');
        } else {
            $('#activate_modal').modal('show');
            $("#confirm_activate, #confirm_archive").on("click", function(){
                //Ajax code
                var action_url = "";
                <?php include_once "CommonAjax.php" ?>
            });
        }
    });
});
</script>