<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- class dropdown script -->
<script>
$(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var classType = $(this).data('class-type');
        var contentPath = '';

        if(classType === 'active-class'){
            location.reload();
        }else if(classType === 'archive-class'){
            contentPath = '../PagesContent/ClassContent/TableClass/ArchiveClassTableContent.php';
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

<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.edit').click(function() {
        // Get the row data
        var class_id = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var class_name = $(this).closest('tr').find('td:eq(2)').text();

        // Populate the modal fields with the data
        $('#edit-class').find('[name="class_id"]').val(class_id);
        $('#edit-class').find('[name="class_name"]').val(class_name);


        // Show the modal
        $('#edit-class').modal('show');
    });
});
</script>