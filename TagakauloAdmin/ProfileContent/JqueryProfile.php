<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var editMode = false; // Flag to track the edit mode status

    // Hide the update button initially
    $('#update-btn').hide();
    $('input, select').prop('readonly', true).prop('disabled', true);

    // Function to toggle the edit mode
    function toggleEditMode() {
        if (editMode) {
            // If edit mode is active, hide the update button and disable the inputs
            $('#update-btn').hide();
            $('input, select').prop('readonly', true).prop('disabled', true);
        } else {
            // If edit mode is inactive, show the update button and enable the inputs
            $('#update-btn').show();
            $('input, select').prop('readonly', false).prop('disabled', false);
        }
        editMode = !editMode; // Toggle the edit mode flag
    }

    // Enable input and show the update button when edit icon is clicked
    $('#edit-icon').click(function() {
        toggleEditMode();
    });

    // Hide the update button when the update button is clicked
    $('#update-btn').click(function() {
        $(this).hide();
    });
});
</script>




<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('#edit-icon').click(function() {
        // Get the row data
        var userId = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var name = $(this).closest('tr').find('td:eq(2)').text();
        var gender = $(this).closest('tr').find('td:eq(3)').text();
        var email = $(this).closest('tr').find('td:eq(4)').text();
        var date = $(this).closest('tr').find('td:eq(5)').text();
        var user = $(this).closest('tr').find('td:eq(6)').text();

        // Populate the modal fields with the data
        $('#activate-user').find('[name="userId"]').val(userId);
        $('#archive-user').find('[name="userId"]').val(userId);

        // Show the modal
        $('#activate-user').modal('show');
    });
});
</script>