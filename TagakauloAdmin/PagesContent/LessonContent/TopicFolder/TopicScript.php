
<script>
    $(document).ready(function() {
        $("#userInputTopic").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function() {
                var rowText = $(this).text().toLowerCase();
                var pText = $(this).find("p").text().toLowerCase();
                $(this).toggle(rowText.indexOf(value) > -1 || pText.indexOf(value) > -1);
            });
        });
    });
    </script>

<!-- Script for pulling and viewing content-->
<script>
    $(function(){
        var arrays = []; // Array to store arrays received from the backend
        var currentArrayIndex = 0; // Index of the currently displayed array
        var currentIndex = 0; // Index of the currently displayed item
        var pageSize = 6; // Number of items to show per page

        // Function to load data from the backend using AJAX
        function loadData() {
            $.ajax({
                url: 'backend.php', // Replace with the actual backend URL
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Assume the backend returns data as an array of arrays
                    arrays = data;
                    loadPage(currentIndex);
                },
                error: function() {
                    console.error('Failed to load data.');
                }
            });
        }

        // Function to load a page
        function loadPage(index) {
            var currentArray = arrays[currentArrayIndex];
            if (index >= 0 && index < currentArray.length) {
                var content = '<div class="media"><img src="' + currentArray[index] + '" alt="Image"></div>';
                $('#gallery').html(content);
            }
        }
        // Initial load
        loadData();

        // Handle next and previous clicks
        $('#next').on('click', function() {
            var currentArray = arrays[currentArrayIndex];
            if (currentIndex < currentArray.length - 1) {
                currentIndex++;
                loadPage(currentIndex);
            } else if (currentArrayIndex < arrays.length - 1) {
                // Switch to the next array if available
                currentArrayIndex++;
                currentIndex = 0;
                loadPage(currentIndex);
            }
        });

        $('#prev').on('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                loadPage(currentIndex);
            } else if (currentArrayIndex > 0) {
                // Switch to the previous array if available
                currentArrayIndex--;
                currentIndex = arrays[currentArrayIndex].length - 1;
                loadPage(currentIndex);
            }
        });

    });
</script>