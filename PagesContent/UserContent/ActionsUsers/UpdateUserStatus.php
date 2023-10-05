<?php
$table = "tbl_user_info";
$status = $_POST['status'];
$id = intval($_POST['id']);

$query = "UPDATE $table SET status_id = ? WHERE user_info_id = ?";
$params = [$status, $id];

include_once("../../../Database/SanitizeCrudClass.php");
$update = new SanitizeCrudClass();
$update->executePreState($query, $params);

//Check and return true if the user is successfully archived
if($update){
    if ($status == 0) {
        $response = array('success' => 'User archived');
    } else {
        $response = array('success' => 'User activated');
    }

    echo json_encode($response);
}
else{
    $response = array('error' => 'Error in updating status');
    echo json_encode($response);
}

?>