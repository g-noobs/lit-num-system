<script>
$(function() {
    //get the lesson name from the url
    var lessonid = window.location.href.split("=")[1].split("&")[0];
    var lessonName = window.location.href.split("=")[2];
    //replace the %20 with one space
    var lessonName = lessonName.replace(/%20/g, " ");

    $("#test").text(lessonid);
    $("#lesson_name").text(lessonName);

    var responseData = {}; // To store the response from the backend
    var currentArrayIndex = 0; // Index of the currently displayed topic
    var currentIndex = 0; // Index of the currently displayed item
    var pageSize = 6; // Number of items to show per page

    // Function to load data from the backend using AJAX
    function loadData() {
        $.ajax({
            url: '../ActionLesson/ActionLessonView.php', // Replace with the actual backend PHP script
            method: 'POST', // Change to POST if needed
            data: { id: lessonid }, // Pass any required data to your PHP script
            dataType: 'json',
            success: function(response) {
                responseData = response; // Assuming the backend returns data as an object
                loadPage(currentIndex);
                // var responseDataJson = JSON.parse(response);
                // if(responseDataJson.hasOwnProperty('error')){
                //     var msg = responseDataJson.error;
                //     $('#errorAlert').text(msg);
                //     $('#errorBanner').show();
                // }

            },
            error: function() {
                console.error('Failed to load data.');
            }
        });
    }

    // Function to load a page
    function loadPage(index) {
        if (responseData[currentArrayIndex]) {
            var currentArray = responseData[currentArrayIndex];
            if (index < currentArray.length) {
                var currentItem = currentArray[index];

                // Determine the file type based on the file extension
                var fileType = currentItem.split('.').pop().toLowerCase();

                var content = '';

                if (fileType === 'jpg' || fileType === 'jpeg' || fileType === 'png' || fileType === 'gif') {
                    content = '<div class="media"><img src="' + currentItem + '" alt="Image"></div>';
                } else if (fileType === 'mp3' || fileType === 'ogg' || fileType === 'wav') {
                    content = '<audio controls><source src="' + currentItem + '" type="audio/' + fileType + '">Your browser does not support the audio element.</audio>';
                } else if (fileType === 'mp4' || fileType === 'webm' || fileType === 'ogg') {
                    content = '<video controls><source src="' + currentItem + '" type="video/' + fileType + '">Your browser does not support the video element.</video>';
                } else if (fileType === 'pdf') {
                    content = '<embed src="' + currentItem + '" type="application/pdf" width="100%" height="500px" />';
                } else {
                    // Handle other file types or provide a default
                    content = '<p>Unsupported file type</p>';
                }

                $('#gallery').html(content);
            }
        }
    }

    // Initial load
    loadData();

    // Handle next and previous clicks
    $('#next').on('click', function() {
        if (currentIndex < responseData[currentArrayIndex].length - 1) {
            currentIndex++;
            loadPage(currentIndex);
        }
    });

    $('#prev').on('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            loadPage(currentIndex);
        }
    });
});
</script>