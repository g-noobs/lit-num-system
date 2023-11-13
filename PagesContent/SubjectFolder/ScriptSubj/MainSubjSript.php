<script>
var $modalControl = $('#archive_modal');
// Check or uncheck all checkboxes when the "Select All" checkbox is clicked
$("#select-all").on('click', function() {
    $(".checkbox").prop("checked", $(this).prop("checked"));
});
</script>



<script>
$(document).ready(function() {
    $('.custom-dropdown-menu a').click(function(e) {
        e.preventDefault();
        var userType = $(this).data('module-type');
        var contentPath = '';

        if (userType === 'active-module') {
            location.reload();
        } else if (userType === 'arch-module') {
            contentPath = '../PagesContent/SubjectFolder/SubjectMain/SubjectArchiveTableContent.php';
        } 
        $('.custom-dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
        if (contentPath !== '') {
            $("#mainContent").fadeOut(400, function() {
                $(this).load(contentPath, function() {
                    $(this).fadeIn(400);
                });
            });
        }
    });
});
</script>