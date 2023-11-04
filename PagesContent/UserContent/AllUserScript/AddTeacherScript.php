
<script>
$(function(){
    $("#addUserForm").on("submit", function(e){
        e.preventDefault();

        var formData = new FormData(this);

        var $hideModal = $('#add_user_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionAddTeacher.php';

        <?php include_once("CommonFormAjax.php");?>
    });
});
</script>