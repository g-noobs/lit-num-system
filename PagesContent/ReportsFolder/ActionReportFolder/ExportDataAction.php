<?php
if(isset($_POST["tableData"])) {
    $tableData = $_POST["tableData"];
    $filename = "table_data.xls";

    // Set the appropriate headers for Excel download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");

    // Output the table data
    echo $tableData;
}
?>