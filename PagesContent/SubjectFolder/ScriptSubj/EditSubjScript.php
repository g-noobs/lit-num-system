<script>
$(function() {
    $('.edit').on('click', function(e){
        e.preventDefault();
        $('#submit_btn').text('Update Module');
        $modal = $('#add-subj');
        
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
                $modal.modal('show');
            },
            error: function() {
                console.log('error');
            }
        });
    });
});
</script>