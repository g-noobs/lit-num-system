<!-- Activate and Archive button -->
<script>
$(document).ready(function() {

    // Click event for the edit icon
    $('.action').click(function() {
        // Get the row data
        var fName = $(this).closest('tr').find('td:eq(3)').text();
        var lName = $(this).closest('tr').find('td:eq(4)').text();

        // get data-id from class action
        var userId = $(this).data('id');

        // assign the data to the id within the modal
        $('#arch_usr_id').text(userId);
        $('.modal-title').text(fName + ' ' + lName);

    });
});