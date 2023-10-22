<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

<script>
$(document).ready(function() {
    $('#exportButton').on('click', function() {
        var tableData = $('#dataTable').html();

        // Send the table data to the export.php script
        $.post('../PagesContent/ReportsFolder/ActionReportFolder/ExportDataAction.php', { tableData: tableData }, function(response) {
            // Trigger the file download
            window.location = 'data:application/vnd.ms-excel,' + encodeURIComponent(response);
        });
    });
});
</script>


