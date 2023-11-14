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
        var classType = $(this).data('class-type');
        var contentPath = '';

        if(classType === 'active-class'){
            location.reload();
        }else if(classType === 'archive-class'){
            contentPath = '../PagesContent/ClassContent/TableClass/ArchivedClassContent.php';
        }
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#classTable").fadeOut(400, function() {
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>
