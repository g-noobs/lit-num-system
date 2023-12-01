<!-- Script for view assigned class -->
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
                        $("#remove_assigned_class").append("<p class='class_assign_id'>"+data.class_id+"</p>");
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
<!-- script to remove assigned class -->
<script>
$(function(){
    $(document).on('click', '.remove_assign_btn',function(){
        var $modal = $('#view_assign_class');
        var assign_class_id = $(this).data('assign-id');

        var action_url = "../PagesContent/UserContent/ActionsUsers/ActionRemoveAssignedClass.php";

        $.ajax({
            type: "POST",
            url: action_url,
            data: {
                id: assign_class_id
            },
            dataType: 'json',
            success:function(response){
                if(response.hasOwnProperty('success')){
                    $modal.modal('hide');
                    $('#successAlert').text(response.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location.reload();
                    }, 8500);
                }else if(response.hasOwnProperty('error')){
                    $modal.modal('hide');
                    $('#errorAlert').text(response.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload();
                    }, 8500);
                }
            },
            error: function(xhr, status, error){
                $modal.modal('hide');
                console.error(xhr.responseText);
                $('#errorAlert').text(xhr.responseText);
                $('#errorBanner').show();
                setTimeout(function() {
                    $("#errorBanner").fadeOut("slow");
                    location.reload();
                }, 8500);
            }
        });
    });
});
</script>


<!-- Script for viewing assigned module -->
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