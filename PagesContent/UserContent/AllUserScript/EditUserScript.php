<script>
$(function() {
    // modify button name
    $('#btnAddTeacher').on('click', function(e) {
        e.preventDefault();
        $('#submit_btn').text('Add Teacher');
    });

    $('.edit').on('click', function(e) {
        e.preventDefault();

        $('#submit_btn').text('Update');

        var btn_id = $(this).data('id');
        //this will populate the date to the modal
        $.ajax({
            type: "POST",
            url: "../PagesContent/UserContent/ActionsUsers/ActionPopulateEditData.php",
            data: {
                id: btn_id
            },
            success: function(response) {
                var responseData = JSON.parse(response);

                $('input[name="personal_id"]').val(responseData.personal_id);
                $('input[name="last_name"]').val(responseData.last_name);
                $('input[name="first_name"]').val(responseData.first_name);
                $('input[name="user_middle_initial"]').val(responseData.middle_initial);
                $('input[name="user_middle_initial"]').find('option').each(function() {
                    if ($(this).val() === response.gender) {
                        $(this).prop('selected', true);
                        return false;
                    }
                });
                $('input[name="phone_num"]').val(responseData.phone_num);
                $('input[name="email"]').val(responseData.email);
                $('input[name="street_address"]').val(responseData.street);
                $('input[name="barangay_address"]').val(responseData.barangay);
                $('input[name="city_address"]').val(responseData.municipal_city);
                $('input[name="province_address"]').val(responseData.province);
                $('input[name="zip_code"]').val(responseData.postal_code);
            },
            error: function() {
                console.log('error');
            }
        });

        $('#add_user_modal').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            // Merge additional data with formData
            formData.append('id', btn_id);

            var $hideModal = $('#add_user_modal');
            var actionUrl = '../PagesContent/UserContent/ActionsUsers/ActionEditUserData.php';

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    // Check if the response contains an array of errors
                    if (Array.isArray(response)) {
                        // Clear previous error messages
                        $("#add_user_modal_alert_text").empty();
                        $("#add_user_modal_alert").show();

                        // Update the element with the received errors
                        $.each(response, function(index, error) {
                            $("#add_user_modal_alert_text").append(
                                "<p class='error'>" +
                                error +
                                "</p><br>");
                            console.log(error);
                        });

                        setTimeout(function() {
                            $("#add_user_modal_alert").fadeOut("slow");

                        }, 3500);
                    } else {
                        // Check if the form submission was successful
                        if (response.hasOwnProperty('success')) {
                            $hideModal.modal('hide');
                            $('#successAlert').text(response.success);
                            $('#successBanner').show();
                            setTimeout(function() {
                                $("#successBanner").fadeOut("slow");
                                location.reload();
                            }, 1500);



                        } else if (response.hasOwnProperty('error')) {
                            $hideModal.modal('hide');
                            $('#errorAlert').text(response.error);
                            $('#errorBanner').show();
                            setTimeout(function() {
                                $("#errorBanner").fadeOut("slow");
                                location.reload();
                            }, 1500);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $hideModal.modal('hide');
                    //show alert banner id = errorBanner
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
    });
});
</script>