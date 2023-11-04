
<script>
$(function() {
    $("#addUserForm").on("submit", function(e) {
        e.preventDefault();

        var btn_user_level = $(this).data('user-level');
        var formData = new FormData(this);

        var $hideModal = $('#add_user_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionRegisterAdmin.php';

        <?php include_once("CommonFormAjax.php");?>
    });
});
</script>