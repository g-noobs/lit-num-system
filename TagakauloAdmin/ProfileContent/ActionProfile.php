<?php 
session_start();
$table = "tbl_user_info";
$values = array(
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],

);
$id = $_SESSION['id'];

$columns = implode(", ", array_keys($values));
$placeholders = "'" . implode("', '", array_values($values)) . "'";

$sql = "UPDATE $table SET ";

foreach ($values as $column => $value) {
    $sql .= "$column = '$value', ";
}

$sql = rtrim($sql, ", "); // Remove the trailing comma and space
$sql .= " WHERE user_info_id = '".$id."';";

$uname = $_POST['username'];
$pass = $_POST['password'];

$Credsql = " UPDATE tbl_credentials SET uname = '$uname', pass = '$pass' WHERE user_info_id = '$id';";


include_once("../Database/AddDeleteClass.php");
$edit = new AddDeleteClass();
$edit->updateCreds($Credsql);
$edit->updateAdmin($sql);
?>