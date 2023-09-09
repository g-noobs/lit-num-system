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
            window.open("LessonFile.php", "topicPopup", "width=1000,height=1000");
        }
    });
});
</script>

<script>
$(".addBtn").on("click", function() {
    $("#add-topic-panel").show();
    var btnId = $(this).data("id");
    $.ajax({
        url: "lesson.php",
        method: "POST",
        data: {
            id: btnId
        },
        success: function(response) {
            $("#lesson-table").hide();
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

<script>
$(function() {
    //by default it will hide the panels and only show the pdf panel
    $('.panel').hide();
    $('#panel-pdf').show();


    $('ul li').on('click', function() {
        //remove the active class from the button
        $('ul li.active').removeClass('active');

        //add the active class to the selected button
        $(this).addClass('active');

        //store the attributes of the stored button
        var panelToShow = $(this).attr('data-panelid');
        //hidee all panels
        $('.container-fluid .panel').hide('fast');
        $('#' + panelToShow).show('fast');


    });
});
</script>