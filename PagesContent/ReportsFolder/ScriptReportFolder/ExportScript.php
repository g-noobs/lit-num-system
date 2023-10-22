<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script> -->

<script>
$(document).ready(function() {
    $('#exportButton').on('click', function() {
        // Retrieve the table data as HTML
        var tableData = $('#dataTable').html();
        var fileName = 'quiz_data.xml';
        
        // Send the table data to the server using AJAX
        $.ajax({
            method: 'POST',
            url: '../PagesContent/ReportsFolder/ActionReportFolder/ExportScript.php', // Create an export.php script to handle XML export
            data: { tableData: tableData,
                    fileName: fileName },
            dataType: 'json',
            success: function(response) {
                // Check if the export was successful
                if (response.success) {
                    // Trigger the file download
                    var link = document.createElement('a');
                    link.href = response.fileUrl;
                    link.download = response.fileName;
                    link.click();
                } else {
                    alert('Export failed.');
                }
            },
            error: function() {
                alert('Export failed.');
            }
        });
    });
});
</script>


