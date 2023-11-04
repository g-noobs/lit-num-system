<script>
$(function(){
    $('.edit').on('click',function(){
        var btn_id = $(this).data('id');
        //this will populate the date to the modal
        $.ajax({
            type: "POST",
            url: "../PagesContent/UserContent/ActionsUsers/ActionPopulateEditData.php",
            data: {id: btn_id},
            success: function(response){
                var responseData = JSON.parse(response);

                $('input[name="personal_id"]').val(responseData.personal_id);
                $('input[name="last_name"]').val(responseData.last_name);
                $('input[name="first_name"]').val(responseData.first_name);
                $('#user_middle_initial').val(responseData.middle_initial);
                $('#gender').val(responseData.gender);
                $('input[name="phone_num"]').val(responseData.phone_num);
                $('input[name="email"]').val(responseData.email);
                $('input[name="street_address"]').val(responseData.street_address);
                $('input[name="barangay_address"]').val(responseData.barangay_address);
                $('input[name="city_address"]').val(responseData.city_address);
                $('input[name="province_address"]').val(responseData.province_address);
                $('input[name="zip_code"]').val(responseData.zip_code);
            },
            error:function(){
                console.log('error');
            }
        });
    });

    $('#add_user_modal').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var $hideModal = $('#add_user_modal');
        var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionEditUserData.php';
        <?php include_once("CommonFormAjax.php");?>
    });
});

</script>