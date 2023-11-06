<script>
$(document).ready(function() {
    $('#assign_more_class').click(function() {
        var $select = $('select.assign_class').first().clone();
        $select.find('option:selected').prop('disabled', true); // Disable selected options
        $('select.assign_class').last().after($select);
    });
});
</script>