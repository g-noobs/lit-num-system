<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();

    $('#exportButton').on('click', function() {
        var tableData = $('#dataTable').html();
        var fileName = "table_data.xls";
        
        $.ajax({
            method: 'POST',
            url: '../PagesContent/ReportsFolder/ActionReportFolder/ExportDataAction.php',
            data: { tableData: tableData,
                    fileName: fileName},
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

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function () {
        $("#exportButton").click(function () {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `UserManagement.xlsx`,
                sheet: {
                    name: 'Usermanagement'
                }
            });
        });
    });
</script>
