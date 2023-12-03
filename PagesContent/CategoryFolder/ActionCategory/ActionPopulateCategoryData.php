<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "tbl_category";
$id = $_POST['id'];

if(!empty($id)){
    $sql = "SELECT * FROM $table WHERE category_id = '$id';";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response = array(
                'category_name' => $row['category_name'],
                'category_description' => $row['category_info']
            );
        }
    }else{
        $response = array('error' => 'Table Empty');
    }
    //sent response to populate data for Edit
    echo json_encode($response);
    exit();
}else{
    $response = array('error' => 'No data received');
    echo json_encode($response);
    exit();
}
?>