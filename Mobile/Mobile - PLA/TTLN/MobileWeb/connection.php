<?php
$host = "25.29.203.47:3307"; //change ip host here
$username = "admin"; //change username
$password = "admin"; //change password
$database = "db_tagakaulo"; //change database name if applicable

$db_con = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    $response["error"] = true;
    $response["message"] = "Failed to connect to the database";
    echo json_encode($response);
    exit;
}
?>