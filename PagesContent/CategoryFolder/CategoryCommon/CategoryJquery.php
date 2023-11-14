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


<!-- category dropdown script -->
<script>
$(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var categoryType = $(this).data('category-type');
        var contentPath = '';

        if(categoryType === 'active-category'){
            location.reload();
        }else if(categoryType === 'archive-category'){
            contentPath = '../PagesContent/CategoryFolder/CategoryArchiveTable.php';
        }
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#categoryMainCont").fadeOut(400, function() {
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>
