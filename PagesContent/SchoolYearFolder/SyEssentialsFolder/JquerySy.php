<!-- Jquery for Add and editing school year-->
<script>
$(document).ready(function() {
    $('#errorBanner').hide();

    $('#form_addsy').submit(function(e) {
        e.preventDefault();

        // Create a FormData object to send the form data including files
        var format = $('input[name="sy_name"]').val();
        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;
        var actionPage = 'RegisterSy.php';
        var modalId = '#addModal';
        var formData = new FormData(this);

        regexAjax(actionPage, modalId, format, regex, formData);
    });
    // End of add modal

    $('#form_editsy').submit(function(e) {
        e.preventDefault();
        var format = $('input[name="sy_name_edit"]').val();

        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;
        var actionPage = 'UpdateSy.php';
        var modalId = '#editModal';
        var formData = new FormData(this);

        regexAjax(actionPage, modalId, format, regex, formData);
    });
    // End of edit modal



    // Regex plus Ajax function --> This will check the format that will make sure that the input is YYYY-YYYY
    // Ajax will manage php action and alert banner
    function regexAjax(actionPage, modalId, format, regex, formData) {

        if (regex.test(format)) {
            $.ajax({
                url: '../PagesContent/SchoolYearFolder/ActionFolder/' + actionPage,
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data (required for FormData)
                contentType: false,
                success: function(response) {
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        $(modalId).modal('hide');
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            location.reload(); // Hide the .alert element after 3 seconds
                        }, 1500);


                        // You can redirect to a different page or perform other actions here
                    } else if (responseData.hasOwnProperty('error')) {
                        $(modalId).modal('hide');
                        //show alert banner id = errorBanner
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                            location.reload(); // Hide the .alert element after 3 seconds
                        }, 1500);
                    }
                },
                error: function() {
                    $(modalId).modal('hide');
                    //show alert banner id = errorBanner
                    $('#errorAlert').text('An error occurred during the AJAX request.');
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload(); // Hide the .alert element after 3 seconds
                    }, 1500);
                }
            });
        } else {
            $(modalId).modal('hide');
            $("#errorBanner").show(); // Show the .alert element
            setTimeout(function() {
                $('#errorAlert').text('Incorrect input format!');
                $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
            }, 2500); // 3000 milliseconds (3 seconds
        }
    }
});
</script>



<!-- Jquery for Edit archive button that will automatically populate data -->
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
    //Archive individually school year item
    $('.archiveBtn').click(function() {
        // Get the id from data attribute
        $modal = $('#archiveModal');
        let id = $(this).data('id');
        let name = $(this).closest('tr').find('td:eq(1)').text();
        // Populate the modal fields with the data
        $('#school_year').text(name);
        $modal.modal('show');

        $('#ArchBtnSubmit').click(function(e) {
            e.preventDefault();
            console.log("Archive button clicked");
            $.ajax({
                url: '../PagesContent/SchoolYearFolder/ActionFolder/ArchiveSy.php',
                type: 'POST',
                data: {
                    sy_id: id
                },
                success: function(response) {
                    console.log("Success response:", response);
                    var responseData = JSON.parse(response);
                    // Check if the form submission was successful
                    if (responseData.hasOwnProperty('success')) {
                        $modal.modal('hide');
                        $('#successAlert').text(responseData.success);
                        $('#successBanner').show();
                        setTimeout(function() {
                            $("#successBanner").fadeOut("slow");
                            location
                        .reload(); // Hide the .alert element after 3 seconds
                        }, 1500);
                    } else {
                        $modal.modal('hide');
                        //show alert banner id = errorBanner
                        $('#errorAlert').text(responseData.error);
                        $('#errorBanner').show();
                        setTimeout(function() {
                            $("#errorBanner").fadeOut("slow");
                            location
                        .reload(); // Hide the .alert element after 3 seconds
                        }, 1500);
                    }
                },
                error: function() {
                    console.log("Error occurred during AJAX request.");
                    $modal.modal('hide');
                    //show alert banner id = errorBanner
                    $('#errorAlert').text(
                        'An error occurred during the AJAX request.');
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location
                    .reload(); // Hide the .alert element after 3 seconds
                    }, 1500);
                }
            });
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // show and hide update button for sy status
    $('#update-sy').hide();
    $('input[name="radioGroup"]').hide();
    $("#set-sy").click(function() {
        $("#update-sy").fadeToggle("slow");
        $('input[name="radioGroup"]').fadeToggle("slow");
    });
});
</script>

<script>
// Radio button update status
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
                data: {
                    sy_id: selectedId
                }, // Sending the selectedId to the PHP file
                success: function(response) {

                    $('successAlert').text('Successfully set the school year!');
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location.reload();
                    }, 1500); // Hide the .alert element after 2 seconds

                }
            });
        } else {
            //show alert banner id = errorBanner
            $('#errorAlert').text('Please select a school year!');
            $('#errorBanner').show();
            setTimeout(function() {
                $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
            }, 2000);
        }
    });
});
</script>