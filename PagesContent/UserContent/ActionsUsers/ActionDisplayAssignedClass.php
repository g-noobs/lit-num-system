<?php 
// include connection class
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "view_teacher_class_info";

// condition to check that get for id is not empty
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM $table WHERE class_assign_status = 1 AND user_info_id = '$id';";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $response[] = array(
                'class_name' => $row['class_name'],
                'assign_date' => $row['assign_date'],
                'class_id' => '<a href="#" class="remove_assign_btn text-danger" data-assgn-id="' . $row['class_assign_teacher_id'] . '" type="button" data-toggle="tooltip"
                title="Removed this Assigned Class"><i class="fa fa-remove"></i></a>'
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