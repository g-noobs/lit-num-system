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
$(".viewBtn").click(function() {
    var buttonId = $(this).data("id");
    $.ajax({
        url: "dashboard.php",
        method: "POST",
        data: {
            id: buttonId
        },
        success: function(response) {
            window.open("dashboard.php", "topicPopup", "width=1000,height=1000");
        }
    });
});
</script>

<script>
$(".addBtn").on("click", function() {
    $("#lesson-table").hide();
    $("#add-topic-panel").show();

    var btnId = $(this).data("id");

    $.ajax({
        type: 'POST',
        url: 'LessonTopic.php', // Send the request to the same page
        data: {
            name: 'John',
            id: btnId
        },
        success: function(response) {
            console.log(response);
            // Handle the response data here if needed
        },
        error: function(xhr, status, error) {
            console.error('Error sending data:', error);
        }
    });
});
</script>


<script>
//HIDE topic pane BY default
$("#add-topic-panel").hide();
$("#back-table").click(function() {
    $("#add-topic-panel").hide();
    $("#lesson-table").show();

    // Clear all input fields in the form
    $('form input[type="text"], form input[type="number"], form textarea').val('');

    // Clear select boxes
    $('form select').prop('selectedIndex', 0);

    // Uncheck checkboxes and radios
    $('form input[type="checkbox"], form input[type="radio"]').prop('checked', false);
});
</script>

<!-- lesson panel or fragment manipulation-->
<!-- <script>
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
</script> -->

<!-- manipulation still but outside the form-->
<!-- <script>
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
</script> -->

<!-- will clear the form if lesson button is clicked-->
<!-- <script>
    $(document).ready(function() {
        $('#lesson-btn').click(function() {
    $('#form-add').find('input[type="text"], input[type="number"], textarea').val(''); 
    });
    });
</script> -->