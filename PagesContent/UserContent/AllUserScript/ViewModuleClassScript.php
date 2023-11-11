<script>
$(function() {
    $('.view_assign_class_btn').on("click", function(e) {
        e.preventDefault();
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
                    $("#assign_class_name_data").empty();
                    $('#assign_class_date_data').empty();
                    $('#assign_class_error').empty();

                    // Update the element with the received errors
                    $.each(response, function(index, data) {
                        $("#assign_class_name_data").append(
                            "<p class='data_clas_name'>" +
                            data.class_name +
                            "</p>");
                        $("#assign_class_date_data").append(
                            "<p class='data_clas_date'>" +
                            data.assign_date +
                            "</p>");
                    });

                } else {
                    if (response.hasOwnProperty('error')) {
                        $('#assign_class_error').text(response.error);
                        $('#assign_class_error').show();
                        $("#assign_class_name_data").empty();
                        $('#assign_class_date_data').empty();
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