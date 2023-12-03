<script>
$(function() {
    $('.edit').on('click', function(e) {
        e.preventDefault();
        $('#submit_btn').text('Update Class');
        $modal = $('#add_class_modal');
        var btn_id = $(this).data('id');

        $class_name = $('input[name="class_name"]');
        $sy_id = $('select[name="sy_id"]');

        $.ajax({
            type: "POST",
            url: "../PagesContent/ClassContent/ActionFolder/ActionPopulateClassData.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                $class_name.val(response.class_name);
                $sy_id.find('option').each(function() {
                    if ($(this).val() === response.sy_id) {
                        $(this).prop('selected', true);
                        return false;
                    }
                });
                $modal.modal('show');
            },
            error: function() {
                console.log('error');
            }
        });
        $('#add_class_form').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('id', btn_id);
            var actionUrl = '../PagesContent/ClassContent/ActionFolder/EditClassAction.php';

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

                        }, 8500);
                    } else {
                        // Check if the form submission was successful
                        if (response.hasOwnProperty('success')) {
                            $modal.modal('hide');
                            $('#successAlert').text(response.success);
                            $('#successBanner').show();
                            setTimeout(function() {
                                $("#successBanner").fadeOut("slow");
                                location.reload();
                            }, 8500);



                        } else if (response.hasOwnProperty('error')) {
                            $modal.modal('hide');
                            $('#errorAlert').text(response.error);
                            $('#errorBanner').show();
                            setTimeout(function() {
                                $("#errorBanner").fadeOut("slow");
                                location.reload();
                            }, 8500);
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $modal.modal('hide');
                    //show alert banner id = errorBanner
                    $('#errorAlert').text(
                        'An error occurred during the AJAX request.');
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload();
                    }, 8500);
                }
            });
        });

    });
});
</script>