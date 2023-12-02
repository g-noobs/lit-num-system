<script>
$(function() {
    $('.edit').on('click', function() {
        e.preventDefault();
        $('#submit_btn').text('Update Class');
        $modal = $('#add-subj');
        var btn_id = $(this).data('id');

        $class_name = $('input[name="class_name"]');
        $sy_id = $('select[name="sy_id"]');

        $.ajax({
            type: "POST",
            url: "../PagesContent/ClassContent/ActionFolder/ActionPopulateClassData.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                $class_name.val(response.class_name);
                $sy_id.find('option').each(function() {
                    if ($(this).val() === response.sy_id) {
                        $(this).prop('selected', true);
                        return false;
                    }
                });
            },
            error: function() {
                console.log('error');
            }
        });

    });


});
</script>