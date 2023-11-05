<script>
$(document).ready(function() {
    var selectedIds = [];

    var $modalControl = $('#archive_modal');
    // Check or uncheck all checkboxes when the "Select All" checkbox is clicked
    $("#select-all").click(function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });

    // Handle the update button click event
    $("#archive_btn").click(function() {
        
        // Iterate through all checked checkboxes and collect their values
        $(".checkbox:checked").each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            // Show a modal if no checkboxes are selected
            $modalControl.modal('show');
        }
        $('#archive_modal').modal('show');
        $("#confirm_archive").on("click", function() {
            //Ajax code
            var action_url =
            "../PagesContent/UserContent/ActionsUsers/ArchiveTeacherAction.php";
            <?php include_once "ActivateArchiveAjax.php";?>
        });
    });
});
</script>