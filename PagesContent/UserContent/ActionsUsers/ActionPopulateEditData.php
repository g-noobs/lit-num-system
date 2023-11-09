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
                    'last_name' => $row['last_name'],
                    'first_name' => $row['first_name'],
                    'middle_initial' => $row['middle_name'],
                    'gender' => $row['gender'],
                    'phone_num' => $row['contact_num'],
                    'email' => $row['email'],
                    'street' => $row['street'],
                    'barangay' => $row['barangay'],
                    'municipal_city' => $row['municipal_city'],
                    'province' => $row['province'],
                    'postal_code' => $row['postalcode'],
                );
            }
            echo json_encode($response);
        }
    }
}
?>
