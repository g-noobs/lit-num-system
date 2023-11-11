<script>
$(function() {
    $('.view_assign_class_btn').on("click", function(e) {
        var btn_id = $(this).data('id');
        $('#user_id_data_class').text(btn_id);

        $('#view_assign_class').modal('show');
        $.ajax({
            type: "GET",
            url: "../PagesContent/UserContent/ActionsUsers/ActionDisplayAssignedClass.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                if (Array.isArray(response)) {
                    // Update the element with the received errors
                    $.each(response, function(index, data) {
                        $("#assign_class_name").append(
                            "<p class='data_clas_name'>" +
                            data.class_name +
                            "</p>");
                        $("#assigne_class_date").append(
                            "<p class='data_clas_date'>" +
                            data.assign_date +
                            "</p>");
                    });
                    
                } else {
                    if (response.hasOwnProperty('error')) {
                        $('#assign_class_error').text(response.error);
                        $('#assign_class_error').show();
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $('#assign_class_error').text(xhr.responseText);
                $('#assign_class_error').show();
            }
        });
    });
});
</script>