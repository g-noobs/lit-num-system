<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "tbl_module";
$module_id = $_POST['id'];

if(!empty($module_id)){
    $sql = "SELECT * FROM $table WHERE module_id = '$module_id';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response = array(
                'module_name' => $row['module_name'],
                'module_descrip' => $row['module_description']
            );
        }
    }else{
        $response = array('error' => 'Table Empty');
    }
    echo json_encode($response);
    exit();
}else{
    $response = array('error' => 'No id received');
    echo json_encode($response);
    exit();
}

?>