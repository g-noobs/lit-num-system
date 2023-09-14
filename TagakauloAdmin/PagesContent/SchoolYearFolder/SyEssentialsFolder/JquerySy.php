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


<!-- Jquery for Add and editing school year-->
<script>
$(document).ready(function() {
    $('#errorBanner').hide();
    
    $('#addModal').submit(function(e) {

        var syDate = $('input[name="sy_name"]').val();

        // Update regex to match example
        var regex = /^\d{4}-\d{4}$/;

        if (regex.test(syDate)) {

        } else {
            $("#errorBanner").show(); // Show the .alert element
            setTimeout(function () {
                    $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500); // 3000 milliseconds (3 seconds)

            $('#addModal').modal('hide');
            return false;
        }

        return true;

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
                    // Handle the response from the PHP file
                    console.log(response);
                    location.reload();
                    // You can display or process the response as needed
                }
            });
        } else {
            alert('Please select a radio button.');
        }
    });
});
</script>
