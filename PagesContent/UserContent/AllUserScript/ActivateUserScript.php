<script>
$(document).ready(function() {

    var $modalControl = $('#activate_modal');
    // Check or uncheck all checkboxes when the "Select All" checkbox is clicked
    $("#select-all").click(function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });

    // Handle the update button click event
    $("#activate_btn").click(function() {

        var selectedIds = [];
        // Iterate through all checked checkboxes and collect their values
        $(".checkbox:checked").each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            // Show a modal if no checkboxes are selected
            $('#no_data_selected_modal').modal('show');
        } else {
            $modalControl.modal('show');
            $("#confirm_activate").on("click", function() {
                //Ajax code
                var action_url =
                    "../PagesContent/UserContent/ActionsUsers/ActivateArchiveTeacherAction.php";
                $.ajax({
                    type: "POST",
                    url: action_url,
                    data: {
                        selectedIds: selectedIds,
                        status: 1
                    },
                    success: function(response) {
                        $modalControl.modal('hide');
                        
                    },
                    error: function(xhr, status, error) {
                        $modalControl.modal('hide');
                        alert('Error: ' +
                        error); // Display the specific error message
                    }
                });
            });
        }
    });
});
</script>