<?php
$table = "tbl_schoolyear";

$values = array(
    'sy_status' => 0,
    'sy_id' => $_POST['sy_id'],
);
$query = "UPDATE $table 
          SET sy_status = ?
          WHERE sy_id = ?";

$params = array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");

$update=new SanitizeCrudClass();

try{
    $update->executePreState($query, $params);
    $response = array("success" => "Successfully archived school year!");
    echo json_encode($response);
}
catch(Exception $e){
    $response = array("error" => $e);
    echo json_encode($response);
}
?>