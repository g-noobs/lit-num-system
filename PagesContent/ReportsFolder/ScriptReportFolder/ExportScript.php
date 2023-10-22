<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

<script>
$(document).ready(function() {
    $('#exportButton').on('click', function() {
        var tableData = $('#dataTable').html();
        
        $.ajax({
            method: 'POST',
            url: '../PagesContent/ReportsFolder/ActionReportFolder/ExportDataAction.php',
            data: { tableData: tableData },
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

