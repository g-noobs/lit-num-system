<script>
$(function() {
    $last_name = $('input[name="last_name"]');
    $first_name = $('input[name="first_name"]');
    $middle_initial = $('select[name="user_middle_initial"]');
    $gender = $('select[name="gender"]');
    $contact = $('input[name="phone_num"]');
    $email = $('input[name="email"]');
    $username = $('input[name="username"]');
    $password = $('input[name="password"]');
    $confirm_password = $('input[name="confirmPassword"]');

    $.ajax({
        type: "post",
        url: "../PagesContent/ProfileContent/ActionPopulateAdminEdit.php",
        data: 1,
        success: function(response) {
            var responseData = JSON.parse(response);

            $last_name.val(responseData.last_name);
            $first_name.val(responseData.first_name);
            $middle_initial.val(responseData.middle_name);
            $gender.text(responseData.gender);
            $gender.val(responseData.gender);
            $contact.val(responseData.contact_num);
            $email.val(responseData.email);
            $username.val(responseData.username);
            $password.val(responseData.password);
            $confirm_password.val(responseData.password);

            if (responseData.hasOwnProperty('error')) {
                $('#errorAlert').text(responseData.error);
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                    location.reload();
                }, 1500);
            }

        },
        error: function() {
            console.log('error');
            $('#errorAlert').text(
                'An error occurred during the AJAX request.');
            $('#errorBanner').show();
            setTimeout(function() {
                $("#errorBanner").fadeOut("slow");
                location.reload();
            }, 1500);
        }
    });
});
</script>