<?php 
session_start();
$table = "tbl_user_info";
$values = array(
    'name' => $_POST['name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
);

$columns = implode(", ", array_keys($values));
$placeholders = "'" . implode("', '", array_values($values)) . "'";

$sql = "UPDATE $table SET ";

foreach ($values as $column => $value) {
    $sql .= "$column = '$value', ";
}

$sql = rtrim($sql, ", "); // Remove the trailing comma and space
$sql .= " WHERE user_info_id = '{$_SESSION['id']}'";

include_once("../Database/AddDeleteClass.php");
$edit = new AddDeleteClass();
$edit->updateAdmin($sql);
?>