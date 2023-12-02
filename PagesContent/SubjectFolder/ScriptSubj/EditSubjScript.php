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
        $('.subjForm').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('id', btn_id);
            var actionUrl = '../PagesContent/SubjectFolder/ActionSubj/ActionEditSubj.php';

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