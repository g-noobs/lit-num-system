<?php

include_once "../../../Database/SanitizeCrudClass.php";

$table = "tbl_user_info";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedIds = $_POST['selectedIds'];

    // Update the status for the selected IDs
    $updateQuery = "UPDATE $table SET status_id = ? WHERE user_info_id IN (" . implode(",", $selectedIds) . ")";

    $params = array(0);
    
    // Execute the prepared statement
    $updateData = new SanitizeCrudClass();
    $updateData->executePreState($updateQuery, $params);

    // Check for errors during execution
    if ($updateData->getLastError() === null) {
        $response = array(
            'success' => 'Update successful'
        );
    } else {
        $response = array(
            'error' => 'Error during execution: ' . $updateData->getLastError()
        );
    }
} else {
    $response = array(
        'error' => 'POST ISSUE.'
    );
}
echo json_encode($response);
?>