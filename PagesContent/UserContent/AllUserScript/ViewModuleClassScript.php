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
                    $('#remove_assigned_class').empty();

                    // Update the element with the received errors
                    $.each(response, function(index, data) {
                        $("#assign_class_name_data").append(
                            "<p class='data_class_name'>" +
                            data.class_name +
                            "</p>");
                        $("#assign_class_date_data").append(
                            "<p class='data_class_date'>" +
                            data.assign_date +
                            "</p>");
                        $("#remove_assigned_class").append(data.class_id);
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
                $("#assign_class_name_data").empty();
                $('#assign_class_date_data').empty();
                $('#assign_class_error').text(xhr.responseText);
                $('#assign_class_error').show();
            }
        });
    });
});
</script>

<script>
$(function() {
    $('.view_assign_module_btn').on('click', function(e) {
        e.preventDefault();
        var btn_id = $(this).data('id');
        $('#user_id_data_module').text(btn_id);
        $('#view_assign_module').modal('show');

        $.ajax({
            type: "GET",
            url: "../PagesContent/UserContent/ActionsUsers/ActionDisplayAssignedModule.php",
            data: {
                id: btn_id
            },
            dataType: 'json',
            success: function(response) {
                if (Array.isArray(response)) {
                    $("#assign_module_name_data").empty();
                    $('#assign_module_date_data').empty();
                    $('#assign_module_error').empty();

                    // Update the element with the received errors
                    $.each(response, function(index, data) {
                        $("#assign_module_name_data").append(
                            "<p class='data_clas_name'>" +
                            data.module_name +
                            "</p>");
                        $("#assign_module_date_data").append(
                            "<p class='data_clas_date'>" +
                            data.assign_date +
                            "</p>");
                    });

                } else {
                    if (response.hasOwnProperty('error')) {
                        $('#assign_module_error').text(response.error);
                        $('#assign_module_error').show();
                        $("#assign_module_name_data").empty();
                        $('#assign_module_date_data').empty();
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                $("#assign_module_name_data").empty();
                $('#assign_module_date_data').empty();
                $('#assign_module_error').text(xhr.responseText);
                $('#assign_module_error').show();
            }
        });
    });
});
</script>