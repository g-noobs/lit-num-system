<script>
    // jQuery approach to set data-id value as input value
    $(document).ready(function() {
        $('[data-toggle="modal"]').click(function() {
            // Get the data-id value from the trigger element
            const dataId = $(this).data('id');

            // Set the data-id value as the input value
            $('#category_input').val(dataId);
        });
    });
</script>