<!-- pop modal for error adding -->
<script>
$(document).ready(function() {
    // Check for message
    var msg = <?= json_encode($_GET['msg'] ?? '') ?>;
    if (msg) {
        $('#errorModal').modal('show');
    }
});
</script>

<script>
$(document).ready(function() {
    $('#addModal').submit(function(e) {

        var syDate = $('input[name="sy_name"]').val();

        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;

        if (regex.test(syDate)) {

        } else {
            $('#validationError').modal('show');
            $('#addBtn').modal('hide');
            return false;
        }

        return true;

    });
    $('#editModal').submit(function(e) {

        var syDate = $('input[name="sy_name"]').val();

        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;

        if (regex.test(syDate)) {

        } else {
            $('#validationError').modal('show');
            $('#editModal').modal('hide');
            return false;
        }

        return true;

    });

});
</script>

</script>

<script>
$(document).ready(function() {
    // Attach click handler to edit buttons
    $('[id^="editBtn-"]').click(function() {
        // Get the id from data attribute
        let id = this.id.split("-")[1];
        let name = $(this).closest('tr').find('td:eq(1)').text();
        // Populate the modal fields with the data
        $('#editModal').find('[name="sy_id"]').val(id);
        $('#editModal').find('[name="sy_name"]').val(name);

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