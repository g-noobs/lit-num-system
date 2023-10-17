<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.edit').click(function() {
        // Get the row data
        var class_id = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)
        var class_name = $(this).closest('tr').find('td:eq(2)').text();

        // Populate the modal fields with the data
        $('#edit-class').find('[name="class_id"]').val(class_id);
        $('#edit-class').find('[name="class_name"]').val(class_name);


        // Show the modal
        $('#edit-class').modal('show');
    });
});
</script>

<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.archive').click(function() {
        // Get the row data
        var class_id = $(this).closest('tr').find('td:eq(1)')
            .text(); // Assuming the user_info_Id is in the second column (index 1)

        // Populate the modal fields with the data
        $('#archive-class').find('[name="class_id"]').val(class_id);
        // Show the modal
        $('#edit-class').modal('show');
    });
});
</script>

<!-- <script>
$(document).ready(function() {

    $("#add-class-info").hide();

    $("#add-class-btn").click(function() {

        $("#add-class-info").show();
        $("#classTable").hide();
    });

    $("#back").click(function() {
        $("#add-class-info").hide();
        $("#classTable").show();
    });

});
</script> -->

