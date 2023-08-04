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

<!-- lesson panel or fragment manipulation-->
<script>
$(document).ready(function() {
    $('section.content').hide();

    $('button.next').click(function() {
        var currentSection = $(this).closest('section');
        var nextSection = currentSection.next('section');

        if (nextSection.length == 0) {
            nextSection = $('section.content:first');
        }

        currentSection.hide();
        nextSection.show();
    });

    $('button.back').click(function() {
        var currentSection = $(this).closest('section');
        var prevSection = currentSection.prev('section');

        if (prevSection.length == 0) {
            prevSection = $('section.content:last');
        }

        currentSection.hide();
        prevSection.show();
    });

});
</script>

<!-- manipulation still but outside the form-->
<script>
$(document).ready(function() {
    $('#form-add').hide();

    $('#add-lesson').click(function() {
        $('#lesson-table').hide();
        $('#lesson-info').show();
        $('#form-add').show();
    });
    $('#to-table').click(function() {
        $('#lesson-table').show();
        $('section.content').hide();
        $('#form-add').hide();
    });
});
</script>

<!-- will clear the form if lesson button is clicked-->
<script>
    $(document).ready(function() {
        $('#lesson-btn').click(function() {
    $('#form-add').find('input[type="text"], input[type="number"], textarea').val(''); 
    });
    });
</script>