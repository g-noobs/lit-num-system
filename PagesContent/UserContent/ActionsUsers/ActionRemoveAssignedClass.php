<?php 
include_once "../../../Database/SanitizeCrudClass.php";

$connection = new Connection();
$conn = $connection->getConnection();

$class_assign_teacher_id = $_POST['id'];
$table = "tbl_teacher_class_assignment";
$values = array(
    'status' => 0,
    'lass_assign_teacher_id' => $class_assign_teacher_id
);

if(!empty($class_assign_teacher_id)){
    $sql = "UPDATE $table SET status = ? WHERE class_assign_teacher_id = ?";
    $params = array_values($values);
    $archive_assignment = new SanitizeCrudClass();
    $archive_assignment->executePreState($sql, $params);
    
    if($archive_assignment->getLastError() === null){
        $response = array('success' => 'Successfully Removed Assigned Class!');
        echo json_encode($response);
        exit();

    }else{
        $response = array('error' => 'Error in Removing Assigned Class!' . $archive_assignment->getLastError());
        echo json_encode($response);
        exit();
    }

}else{
    $response = array('error' => 'POST ISSUE');
    echo json_encode($response);
    exit();
}

?>