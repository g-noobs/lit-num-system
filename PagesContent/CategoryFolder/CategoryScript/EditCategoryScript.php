<script>
$(function() {
    $('.edit').on('click', function(e) {
        e.preventDefault();
        $('#submit_btn').text('Update Category');

        var btn_id = $(this).data('id');
        $category_name = $('input[name="category_name"]');
        $category_description = $('select[name="category_description"]');
        
        $.ajax({
            type: "POST",
            url: "../PagesContent/CategoryFolder/ActionFolder/ActionPopulateCategoryData.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                $category_name.val(response.category_name);
                $category_description.val(response.category_description);
                $modal.modal('show');
            },
            error: function() {
                console.log('error');
            }
        });
    });
});
</script>