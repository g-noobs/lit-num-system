<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "tbl_class";
$class_id = $_POST['id'];

if(!empty($clas_id)){
    $sql = "SELECT * FROM $table WHERE class_id = '$class_id';";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response = array(
                'class_name' => $row['class_name'],
                'sy_id' => $row['sy_id']
            );
        }
    }else{
        $response = array('error' => 'Table Empty');
    }
    //sent response to populate data for Edit
    echo json_encode($response);
    exit();
}else{
    $response = array('error' => 'No id received');
    echo json_encode($response);
    exit();
}
?>