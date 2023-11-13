<script>
var $modalControl = $('#archive_modal');
// Check or uncheck all checkboxes when the "Select All" checkbox is clicked
$("#select-all").on('click', function() {
    $(".checkbox").prop("checked", $(this).prop("checked"));
});
</script>