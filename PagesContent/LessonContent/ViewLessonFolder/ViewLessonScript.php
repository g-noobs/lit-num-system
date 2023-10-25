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
    var topics = []; // To store the topic keys
    var currentTopicIndex = 0; // Index of the currently displayed topic

    // Function to load data from the backend using AJAX
    function loadData() {
        $.ajax({
            url: '../ActionLesson/ActionLessonView.php', // Replace with the actual backend PHP script
            method: 'POST', // Change to POST if needed
            data: { id: lessonid }, // Pass any required data to your PHP script
            dataType: 'json',
            success: function(data) {
                responseData = data;
                topics = Object.keys(data);
                loadTopic(currentTopicIndex);
                loadSidebarMenu();
            },
            error: function() {
                console.error('Failed to load data.');
            }
        });
    }

    // Function to load a topic
    function loadTopic(index) {
        var currentTopic = topics[index];
        var mediaPaths = responseData[currentTopic];

        if (mediaPaths) {
            var content = '';

            mediaPaths.forEach(function(mediaPath) {
                var fileType = mediaPath.split('.').pop().toLowerCase();

                if (fileType === 'jpg' || fileType === 'jpeg' || fileType === 'png' || fileType ===
                    'gif') {
                    content += '<div class="media"><img src="' + mediaPath + '" alt="Image"></div>';
                } else if (fileType === 'mp3' || fileType === 'ogg' || fileType === 'wav') {
                    content += '<audio controls><source src="' + mediaPath + '" type="audio/' +
                        fileType + '">Your browser does not support the audio element.</audio>';
                } else if (fileType === 'mp4' || fileType === 'webm' || fileType === 'ogg') {
                    content += '<video controls><source src="' + mediaPath + '" type="video/' +
                        fileType + '">Your browser does not support the video element.</video>';
                } else if (fileType === 'pdf') {
                    content += '<embed src="' + mediaPath +
                        '" type="application/pdf" width="100%" height="500px" />';
                } else {
                    // Handle other file types or provide a default
                    content += '<p>Unsupported file type</p>';
                }
            });

            $('#gallery').html(content);
        }
    }

    // Function to load the sidebar menu dynamically
    function loadSidebarMenu() {
        var topicMenu = $('#side-menu');

        topics.forEach(function(topic, index) {
            var listItem = $('<li>').text(topic);

            listItem.on('click', function() {
                currentTopicIndex = index;
                loadTopic(currentTopicIndex);
            });

            topicMenu.append(listItem);
        });
    }

    // Initial load
    loadData();

    // Handle next and previous topic clicks
    $('#next').on('click', function() {
        if (currentTopicIndex < topics.length - 1) {
            currentTopicIndex++;
            loadTopic(currentTopicIndex);
        }
    });

    $('#prev').on('click', function() {
        if (currentTopicIndex > 0) {
            currentTopicIndex--;
            loadTopic(currentTopicIndex);
        }
    });
});
</script>