
<!-- script for getting id and name from the lesson table and transfer to script-->
<script>
$(function(){
    $(".addBtn").on("click", function() {
    $("#add-topic-panel").show();
    var lessonName = $(this).closest('tr').find('td:eq(2)').text();
    var btnId = $(this).data("id");

    $("#lesson-table").hide();
    $("#topic-name").html("Add a new topic for lesson: <strong>" + lessonName + "</strong>");
});
});


</script>

<script>
//HIDE topic pane BY default
$("#add-topic-panel").hide();
$("#back-table").click(function() {
    $("#add-topic-panel").hide();
    $("#lesson-table").show();

    window.location.href = "lesson.php";
});

$("#reset-cancel").on("click", function() {
    $("#add-topic-panel").hide();
    $("#lesson-table").show();
    //will go back to lesson.php
    window.location.href = "lesson.php";
});
</script>

<!-- <script>
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
</script> -->
<!-- Adding topic Script-->
<script>
$(document).ready(function() {
    // Function to add another input group when #addMedia is clicked
    $("#addMedia").click(function () {
        var newInputGroup = '<div class="input-group">' +
                            '<input type="file" class="form-control" name="file[]" multiple required>' +
                            '<span class="input-group-btn">' +
                            '<a href="#" class="btn text-danger cancelFile"><i class="fa fa-remove"></i></a>' +
                            '</span>' +
                            '<br></div>';
        
        // Append the new input group to the container
        $("#input-group-container").append(newInputGroup);
    });

    // Function to remove an input group when its "href" link is clicked
    $(document).on("click", ".cancelFile", function () {
        $(this).closest('.input-group').remove();
    });
    
});
</script>