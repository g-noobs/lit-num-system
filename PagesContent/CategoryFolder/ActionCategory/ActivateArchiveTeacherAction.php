<?php
include_once "../../../Database/Connection.php";

$table = "tbl_category";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedIds = $_POST['selectedIds'];
    $status = $_POST['status'];

    // Update the status for the selected IDs
    $updateQuery = "UPDATE $table SET category_status = '$status' WHERE category_id IN ('" . implode("','", $selectedIds) . "')";
    $conn= new Connection();
    
    $result = $conn->getConnection()->query($updateQuery);
    if ($result === TRUE) {
        $response = array(
            'success' => 'Data updated successfully.'
        );
    }
    else {
        $response = array(
            'error' => 'Error updating data.'
        );
    }
} else {
    $response = array(
        'error' => 'POST ISSUE.'
    );
}
echo json_encode($response);
?>