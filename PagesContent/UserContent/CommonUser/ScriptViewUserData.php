<script>
$(function(){
    $('.data_info_btn').on('click', function(){
        var btn_id = $(this).data('id');

        $('#user_id_data').text(id);
        $.ajax({
            type: "POST",
            url: "../PagesContent/UserContent/ActionsUsers/ActionDisplayUserData.php",
            data: {id: btn_id},
            success: function(response){
                var responseData = JSON.parse(response);

                $('#personal_id_data').append(responseData.personal_id);
                $('#full_name_data').append(responseData.full_name_data);
                $('#gender_data').append(responseData.gender_data);
                $('#email_data').append(responseData.email_data);
                $('#birthdate_data').append(responseData.birthdate_data);
                $('#user_type_data').append(responseData.user_type_data);
                $('#user_status_data').append(responseData.user_status_data);
                $('#username_data').append(responseData.username_data);
                $('#password_data').append(responseData.password_data);
            },
            error:function(){
                console.log('error');
            }
        });
    });
});
    
</script>