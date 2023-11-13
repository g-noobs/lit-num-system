<script>
$(function(){
    $('.data_info_btn').on('click', function(){
        var btn_id = $(this).data('id');

        $('#user_id_data').text(btn_id);
        $.ajax({
            type: "POST",
            url: "../PagesContent/UserContent/ActionsUsers/ActionDisplayUserData.php",
            data: {id: btn_id},
            success: function(response){
                var responseData = JSON.parse(response);

                $('#personal_id_data').text(responseData.personal_id);
                $('#full_name_data').text(responseData.full_name_data);
                $('#gender_data').text(responseData.gender_data);
                $('#email_data').text(responseData.email_data);

                $('#phone_num_data').text(responseData.phone_num_data);
                $('#full_address_data').text(responseData.full_address_data);
                
                $('#username_data').text(responseData.username_data);
                $('#password_data').text(responseData.password_data);
            },
            error:function(){
                console.log('error');
            }
        });
    });
});
    
</script>