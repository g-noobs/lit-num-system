<?php 
// include connection class
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "view_teacher_class_info";

// condition to check that get for id is not empty
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM $table WHERE user_info_id = '$id'";
    $result = $conn->query($sql);

    $class_name = array();
    $assign_date = array();

    if($result->num_rows > 0){
        $response[] = array(
            'class_name' => $row['class_name'],
            'assign_date' => $row['assign_date']
        );
    }else{
        $response = array('error' => 'No Assigned Class yet!');
        
    }

    if(!empty($class_name) && !empty($assign_date)){
        echo json_encode($class_name);
        echo json_encode($assign_date);
    }else{
        echo json_encode($response);
    }
} 
?>