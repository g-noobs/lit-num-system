<script>
$(function(){
    $("#addLessonForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var $hideModal = $('#addLessonModal');
        var actionUrl = '../PagesContent/LessonContent/ActionLesson/ActionAddLesson.php';
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
                    $hideModal.modal('hide');
                    $('#successAlert').text(responseData.success);
                    $('#successBanner').show();
                    setTimeout(function() {
                        $("#successBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);
                }else if (responseData.hasOwnProperty('error')) {
                    $hideModal.modal('hide');
                    $('#errorAlert').text(responseData.error);
                    $('#errorBanner').show();
                    setTimeout(function() {
                        $("#errorBanner").fadeOut("slow");
                        location.reload();
                    }, 1500);
                }
            }
        });
    });
});
</script>