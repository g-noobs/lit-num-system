<script>
$(function() {
    // Check or uncheck all checkboxes when the "Select All" checkbox is clicked
    $("#select-all").click(function() {
        $(".checkbox").prop("checked", $(this).prop("checked"));
    });

    $(".checkbox:checked").each(function() {
        selectedIds.push($(this).val());
    });
    if (selectedIds.length === 0) {
        // Show a modal if no checkboxes are selected
        $('#no_data_selected_modal').modal('show');
    }

});
</script>