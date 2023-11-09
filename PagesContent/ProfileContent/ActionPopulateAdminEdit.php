<?php
session_start();
include_once "../../Database/Connection.php";
$connection = new Connection();

$table = "user_info_view";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM $table WHERE user_info_id = '$id';";
    $result = $connection->getConnection()->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $response = array(
                'last_name' => $row['last_name'],
                'first_name' => $row['first_name'],
                'middle_name' =>$row['middle_name'],
                'gender' => $row['gender'],
                'contact_num' => $row['contact_num'],
                'email' => $row['email'],
                'username' => $row['uname'],
                'password' => $row['pass']
            );
        }
    }
}else{
    $response = array('error' => 'Possible post issue');
}
echo json_encode($resonse);
?>