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
                    'birthdate_data' => $row['birthdate'],
                    'user_type_data' => $row['user_level_description'],
                    'user_status_data' => $row['status'],
                    'username_data' => $row['username'],
                    'password_data' => $row['password']
                );
            }
            echo json_encode($response);
        }
    }
}
?>