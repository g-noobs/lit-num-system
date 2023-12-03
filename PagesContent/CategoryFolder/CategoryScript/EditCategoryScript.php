<script>
$(function() {
    $('.edit').on('click', function(e) {
        e.preventDefault();
        $('#submit_btn').text('Update Category');
        var $modal = $('#add_category_modal');

        var btn_id = $(this).data('id');
        var $category_name = $('input[name="category_name"]');
        var $category_description = $('textarea[name="category_description"]');

        $.ajax({
            type: "POST",
            url: "../PagesContent/CategoryFolder/ActionCategory/ActionPopulateCategoryData.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                $category_name.val(response.category_name);
                $category_description.val(response.category_description);
                $modal.modal('show');
            },
            error: function() {
                console.log('error');
            }
        });
        $('#add_category_form').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('id', btn_id);
        var actionUrl = '../PagesContent/CategoryFolder/ActionCategory/ActionEditCategory.php';
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
                    if (response.hasOwnProperty('success')) {
                        $("#add_category_form")[0].reset();
                        $modal.modal('hide');
                        $('#successAlert').text(response.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            location.reload();
                        }, 1500);
                    } else if (response.hasOwnProperty('error')) {
                        $("#add_category_form")[0].reset();
                        $modal.modal('hide');
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