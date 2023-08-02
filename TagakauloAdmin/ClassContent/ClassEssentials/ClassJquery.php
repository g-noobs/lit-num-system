<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Jquery for INput Search-->
<script>
$(document).ready(function() {
    $("#userInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("tbody tr").filter(function() {
            var rowText = $(this).text().toLowerCase();
            var pText = $(this).find("p").text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1 || pText.indexOf(value) > -1);
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // Click event for the edit icon
    $('.edit').click(function() {
        // Get the row data
        var class_id = $(this).closest('tr').find('td:eq(1)').text(); // Assuming the user_info_Id is in the second column (index 1)
        var class_name = $(this).closest('tr').find('td:eq(2)').text();

        // Populate the modal fields with the data
        $('#edit-class').find('[name="class_id"]').val(class_id);
        $('#edit-class').find('[name="class_name"]').val(class_name);


        // Show the modal
        $('#edit-class').modal('show');
    });
});
</script>


