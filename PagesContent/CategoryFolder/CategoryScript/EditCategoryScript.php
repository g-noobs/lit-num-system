<script>
$(function() {
    $('.edit').on('click', function(e) {
        e.preventDefault();
        $('#submit_btn').text('Update Category');
        $modal = $('#add_category_modal');

        var btn_id = $(this).data('id');
        var $category_name = $('input[name="category_name"]');
        var $category_description = $('input[name="category_description"]');
        
        $.ajax({
            type: "POST",
            url: "../PagesContent/CategoryFolder/ActionCategory/ActionPopulateCategoryData.php",
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