<!-- script that will manage the form submit-->
<!-- will be using jquery and ajax-->

<script>
$(function() {
    $("#addTopic").on("submit", function(e) {
        e.preventDefault();
        var btnId = $(this).data("id");
        //Create a FormData object
        var formData = new FormData(this);
        // Append the btnId to the formData
        formData.append("btnId", btnId);
        $.ajax({
            url: "../PagesContent/LessonContent/ActionLesson/AddTopic.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                alert(data);
                $("#addTopic")[0].reset();
                $("#add-topic-panel").hide();
                $("#lesson-table").show();
                window.location.href = "lesson.php";
            }
        });
    });
});
</script>


<!-- script for getting id and name from the lesson table and transfer to script-->
<script>
$(function() {
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

<script>
$(document).ready(function() {
    // Function to add another input group when #addMedia is clicked
    $("#addMedia").click(function() {
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
    $(document).on("click", ".cancelFile", function() {
        // Count the number of input groups inside the container
        var inputGroupCount = $("#input-group-container .input-group").length;

        // Check if there's only one input group
        if (inputGroupCount === 1) {
            // If there's only one input group, hide or disable the cancelFile class as per your requirement
            $(this).closest('.input-group').find('.cancelFile').addClass('disable')
           
        } else {
            // If there are more than one input groups, remove the current input group
            $(this).closest('.input-group').remove();
        }
    });


});
</script>