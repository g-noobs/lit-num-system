<?php

include_once "../../../Database/Connection.php";

$table = "tbl_user_info";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedIds = $_POST['selectedIds'];
    $status = $_POST['status'];

    // Update the status for the selected IDs
    $updateQuery = "UPDATE $table SET status_id = '$status' WHERE user_info_id IN ('" . implode("','", $selectedIds) . "')";

    

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
// } else {
//     $response = array(
//         'error' => 'POST ISSUE.'
//     );
// }
echo json_encode($response);
?>