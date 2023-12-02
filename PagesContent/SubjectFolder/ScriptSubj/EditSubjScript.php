<script>
$(function() {
    $('.edit').on('click', function(e){
        e.preventDefault();
        $modal = $('#add-subj');
        $modal.modal('show');
        var btn_id = $(this).data('id');
        
        $module_name = $('input[name="subj_name_add"]');
        $module_descrip = $('textarea[name="subj_add_desc"]');

        $.ajax({
            type: "POST",
            url: "../PagesContent/SubjectFolder/ActionSubj/ActionPopulateSubjData.php",
            data:{
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                $module_name.val(response.module_name);
                $module_descrip.val(response.module_descrip);
            },
            error: function() {
                console.log('error');
            }
        });
    });
});
</script>