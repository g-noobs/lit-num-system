
<script>
$(document).ready(function() {
    
    var $modalControl = $('#archive_modal');
    // Check or uncheck all checkboxes when the "Select All" checkbox is clicked
    $("#select-all").on('click',function() {

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
        }else{
            $('#archive_modal').modal('show');
        }
    });
});
</script>