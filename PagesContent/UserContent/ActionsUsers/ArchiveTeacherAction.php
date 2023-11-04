<?php

include_once "../../../Database/SanitizeCrudClass.php";

$table = "tbl_user_info";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedIds = $_POST['selectedIds'];

    // Update the status for the selected IDs
    $updateQuery = "UPDATE $table SET status_id = 0 WHERE user_info_id IN (";

    // Build the parameter array for the IN clause
    $params = array();
    foreach ($selectedIds as $id) {
        $params[] = (int)$id;
        $updateQuery .= "?,";
    }
    // Remove the trailing comma and close the parentheses
    $updateQuery = rtrim($updateQuery, ',') . ")";

    // Execute the prepared statement
    $updateData = new SanitizeCrudClass();
    $updateData->executePreState($updateQuery, $params);

    // Check for errors during execution
    if ($updateData->getLastError() === null) {
        $response = array(
            'error' => 'Error during execution: ' . $updateData->getLastError()
        );
    } else {
        $response = array(
            'success' => 'Update successful'
        );
    }
} else {
    $response = array(
        'error' => 'POST ISSUE.'
    );
}
echo json_encode($response);
?>