<?php 
include_once "../../../Database/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$table = "user_info_view";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM $table WHERE user_info_id = '$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response = array(
                    'personal_id' => $row['personal_id'],
                    'full_name_data' => $row['first_name'] . " ". $row['last_name'],
                    'gender_data' => $row['gender'],
                    'email_data' => $row['email'],
                    'phone_num_data' => $row['contact_num'],
                    'full_address_data' => $row['street'] ." ".$row['barangay']." ". $row['municipal_city'] ." ". $row['province'] ." ".
                    $row['postalcode'],
                    'username_data' => $row['uname'],
                    'password_data' => $row['pass']
                );
            }
            echo json_encode($response);
        }
    }
}
?>