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
            $('#no_data_selected_modal').modal('show');
        } else {
            $modalControl.modal('show');
            $("#confirm_archive").on("click", function() {
                //Ajax code
                var action_url ="../PagesContent/UserContent/ActionsUsers/ArchiveTeacherAction.php";
                $.ajax({
                    type: "POST",
                    url: action_url,
                    data: {
                        selectedIds: selectedIds
                    },
                    success: function(response) {
                        $modalControl.modal('hide');
                        alert(response); // Display a response message
                    },
                    error: function() {
                        $modalControl.modal('hide');
                        alert('Error');
                    }
                });
            });
        }
    });
});
</script>