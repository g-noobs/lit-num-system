<?php
if (isset($_POST["tableData"])) {
    $tableData = $_POST["tableData"];
    $filename = "table_data.xls";
    
    // Set the appropriate headers for Excel download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");

    // Output the table data
    echo $tableData;

    // Return a JSON response with the file URL and name
    $response = array(
        'success' => true,
        'fileUrl' => "export.php",
        'fileName' => $filename
    );

    echo json_encode($response);
} else {
    // Return an error response if data is missing
    $response = array('success' => false);
    echo json_encode($response);
}
?>
