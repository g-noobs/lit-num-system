<!-- pop modal for error adding -->


<!-- <script>
$(function() {
    $('#errorBanner').hide();
    // Check for message
    var msg = ;
    if (msg == 'Success') {
        //show errroBanner
        $('#successBanner').show();
        //add  the message to ther id errorAlert
        $('#successAlert').text(msg);
        setTimeout(function () {
                    $("#successBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500);
    }
    else if(msg == 'Error'){
        $('#errorBanner').show();
        //add  the message to ther id errorAlert
        $('#errorAlert').text(msg);
        setTimeout(function () {
                    $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500);
    }
    msg = "";

}); 
</script> -->


<!-- Jquery for Add and editing school year-->
<script>
$(document).ready(function() {
    $('#errorBanner').hide();
    
    $('#form_addsy').submit(function(e) {
        e.preventDefault();
            
        // Create a FormData object to send the form data including files
        var formData = new FormData(this);

        var syDate = $('input[name="sy_name"]').val();
        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;

        if (regex.test(syDate)) {
            $.ajax({
                url: '../PagesContent/SchoolYearFolder/ActionFolder/'+'RegisterSy.php',
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data (required for FormData)
                contentType: false, 
                success:function(response){
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        $('#addModal').modal('hide');
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function () {
                                $("#successBanner").fadeOut("slow");
                                location.reload(); // Hide the .alert element after 3 seconds
                            }, 1500); 
                        
                        
                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        $('#addModal').modal('hide');
                        //show alert banner id = errorBanner
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function () {
                                $("#errorBanner").fadeOut("slow");
                                location.reload(); // Hide the .alert element after 3 seconds
                            }, 1500); 
                    }
                },
                error: function () {
                    alert('An error occurred during the AJAX request.');
                }
            });

        } else {
            $('#addModal').modal('hide');
            $("#errorBanner").show(); // Show the .alert element
            setTimeout(function () {
                    $('#errorAlert').text('Incorrect input format!');
                    $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500); // 3000 milliseconds (3 seconds
        }

        

    });

    $('#editModal').submit(function(e) {

        var syDate = $('input[name="sy_name_edit"]').val();

        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;

        if (regex.test(syDate)) {

        } else {
            $('#validationError').modal('show');
            $(this).modal('toggle');
            return false;
        }

        return true;

    });

});
</script>

</script>

<!-- Jquery for Edit -->
<script>
$(document).ready(function() {
    // Attach click handler to edit buttons
    $('[id^="editBtn-"]').click(function() {
        // Get the id from data attribute
        let id = this.id.split("-")[1];
        let name = $(this).closest('tr').find('td:eq(2)').text();
        // Populate the modal fields with the data
        $('#editModal').find('[name="sy_id"]').val(id);
        $('#editModal').find('[name="sy_name_edit"]').val(name);

    });
    $('[id^="archiveBtn-"]').click(function() {
        // Get the id from data attribute
        let id = this.id.split("-")[1];
        let name = $(this).closest('tr').find('td:eq(1)').text();
        // Populate the modal fields with the data
        $('#archiveModal').find('[name="sy_id"]').val(id);
        $('#archiveModal').find('[name="sy_name"]').val(name);

    });
});
</script>

<script>
$(document).ready(function() {
    $('#update-sy').hide();
    $('input[name="radioGroup"]').hide();
    $("#set-sy").click(function(){
        $("#update-sy").fadeToggle("slow");
        $('input[name="radioGroup"]').fadeToggle("slow");
    });
    

});
</script>

<script>
$(document).ready(function() {
    $('#update-sy').on('click', function() {
        // Find the selected radio button
        var selectedRadio = $('input[name="radioGroup"]:checked');

        if (selectedRadio.length > 0) {
            var selectedId = selectedRadio.val(); // Get the selected radio button's value

            // Send selectedId to a PHP file using AJAX
            $.ajax({
                type: 'POST',
                url: '../PagesContent/SchoolYearFolder/ActionFolder/RadioBtnProcess.php', // Update this with the actual PHP file's URL
                data: { sy_id: selectedId }, // Sending the selectedId to the PHP file
                success: function(response) {
                
                    $('successAlert').text('Successfully set the school year!');
                    $('#successBanner').show();
                    setTimeout(function () {
                            $("#successBanner").fadeOut("slow");
                            location.reload();
                        }, 1500); // Hide the .alert element after 2 seconds

                    }
            });
        } else {
            //show alert banner id = errorBanner
            $('#errorAlert').text('Please select a school year!');
            $('#errorBanner').show();
            setTimeout(function () {
                    $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2000); 
        }
    });
});
</script>
