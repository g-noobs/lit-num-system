<!-- Archive button -->
<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('#archIconBtn').click(function(e) {
        e.preventDefault();
        // Get the row data
        var userId = $(this).data('id');
        var fName = $(this).closest('tr').find('td:eq(3)').text();
        var lName = $(this).closest('tr').find('td:eq(4)').text();

        // get data-id from class action
        
        // assign the data to the id within the modal
        $('#arch_usr_id').text(userId);
        $('#arch_usr_name').text(fName + ' ' + lName);

        // On Click on Ajax archive user
        $('#archUserBtn').on('click', function(e){
            e.preventDefault();

            var arch_user_id = userId;
            var usr_status = '0';
            ajaxProcess(arch_user_id, usr_status);
        });
    });

    $('#actvIconBtn').on('click', function(e){
        e.preventDefault();

        var userId = $(this).data('id');
        var fName = $(this).closest('tr').find('td:eq(3)').text();
        var lName = $(this).closest('tr').find('td:eq(4)').text();

        
        // assign the data to the id within the modal
        $('#arch_usr_id').text(userId);
        $('#arch_usr_name').text(fName + ' ' + lName);

        // On Click on Ajax activate user
        $('#actvUsrBtn').on('click', function(e){
            e.preventDefault();

            var act_usr_id = userId;
            var usr_status = '1';
            ajaxProcess(act_usr_id, usr_status);
        });
    });

    function ajaxProcess(usr_id,usr_status){
            $.ajax({
                url: '../PagesContent/UserContent/ActionsUsers/UpdateUserStatus.php',    
                type: 'POST',
                data: {
                        id: usr_id,
                        status: usr_status},
                success: function(response){
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            // location
                            //     .reload(); // Hide the .alert element after 3 seconds
                        }, 1500);


                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");// Hide the .alert element after 3 seconds
                        }, 1500);
                    }
                    
                }
            });
        }
});
</script>


