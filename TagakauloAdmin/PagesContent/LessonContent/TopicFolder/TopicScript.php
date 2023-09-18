
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