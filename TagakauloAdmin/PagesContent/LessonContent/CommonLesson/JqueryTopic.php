<!-- script that will manage the form submit-->
<!-- will be using jquery and ajax-->


<!-- script for getting id and name from the lesson table and transfer to script-->
<script>
$(function() {
    var btnId;
    $(".addBtn").on("click", function() {
        $("#add-topic-panel").show();
        var lessonName = $(this).closest('tr').find('td:eq(2)').text();
        btnId = $(this).data("id");

        $("#lesson-table").hide();
        $("#topic-name").html("Add a new topic for lesson: <strong>" + lessonName + "</strong>");
    //will add a callback
    });
    //Alert banner if error occurs
    $("#addTopic").on("submit", function(e) {
        $("errorBanner").hide();
        e.preventDefault(); 
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
                $("#add-topic-panel").show();
                $("#lesson-table").hide();

                $("errorBanner").show();
                $("errorAlert").text(data);
                setTimeout(function () {
                    $("#errorBanner").fadeOut("slow"); // Hide the .alert element after 3 seconds
                }, 2500);
            }
        });
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
    var $addFileContainer = $("#addFileContainer");
    var $firstFormGroup = $($addFileContainer ).find(".form-group:first");
    $("#addMedia").click(function() { 
        // Append the new input group to the container
        $($addFileContainer).append($firstFormGroup.clone());
    });

    // Function to remove an input group when its "href" link is clicked
    $(document).on("click", ".cancelFile", function() {
        // Count the number of form-groups in addFileContainer
        var formGroupCount = $(".col-sm-6 .row .form-group").length;

        // Check if there's only one input group
        if (formGroupCount === 1) {
            // If there's only one input group, hide or disable the cancelFile class as per your requirement
            $(this).closest('.form-group').find('.cancelFile').addClass('disable')
           
        } else {
            // If there are more than one input groups, remove the current input group
            $(this).closest('.form-group').remove();
        }
    });


});
</script>