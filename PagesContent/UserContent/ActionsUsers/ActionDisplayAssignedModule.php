<?php 
// include connection class
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "view_teacher_module_info";

// condition to check that get for id is not empty
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM $table WHERE user_info_id = '$id';";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $response[] = array(
                'module_name' => $row['module_name'],
                'assign_date' => $row['assign_date']
            );
        }
    }else{
        $response = array('error' => 'No Assigned Class yet!');
    }
} else{
    $response = array('error' => 'GET ISSUE');
}

echo json_encode($response);
?>