<script>
$(function() {
    $('#addQuizForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        var actionUrl = '../PagesContent/QuizFolder/ActionQuizFolder/ActionAddQuiz.php';
        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var responseData = JSON.parse(response);
                // Check if the form submission was successful
                if (responseData.hasOwnProperty('success')) {
                    var msg = responseData.success;
                    $('#add_quiz_modal').modal('hide');
                    $('#successAlert').text(msg);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        // location.reload();
                    }, 1500);
                } else if (responseData.hasOwnProperty('error')) {
                    var msg = responseData.error;
                    $('#add_quiz_modal').modal('hide');
                    $('#errorAlert').text(msg);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        // location.reload();
                    }, 1500);
                }
            }
        });

    });
});
</script>


<!-- hide box isntead of remove -->
<script>
$(document).ready(function() {
    // Wait for the document to be fully loaded

    // Attach an event handler to the button that triggers the hide action
    $(".btn-box-tool[data-widget='collapse']").click(function() {
        // Find the parent box element and hide it
        $(this).closest(".box").find(".box-body").slideToggle();
    });
});
</script>

<script>
$(function() {
    $("#addQuizBtn").on("click", function() {
        $("#addQquizSection").show();
    });
});
</script>