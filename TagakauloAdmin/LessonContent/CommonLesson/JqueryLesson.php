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
$(document).ready(function() {

    $('section.content').not(':first').hide();

    $('button').click(function() {
        var currentSection = $(this).closest('section');
        var nextSection = currentSection.next('section');

        if (nextSection.length == 0) {
            // If there is no next section, loop back to first
            nextSection = $('section.content:first');
        }

        currentSection.hide();
        nextSection.show();
    });

});
</script>