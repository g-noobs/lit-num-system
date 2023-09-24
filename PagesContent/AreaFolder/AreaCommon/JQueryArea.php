<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    // jQuery approach to set data-id value as input value
    $(document).ready(function() {
        $('[data-toggle="modal"]').click(function() {
            // Get the data-id value from the trigger element
            const dataId = $(this).data('id');

            // Set the data-id value as the input value
            $('#area_name_input').val(dataId);
        });
    });
</script>