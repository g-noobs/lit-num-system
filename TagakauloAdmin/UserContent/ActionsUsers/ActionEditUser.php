<?php 
include_once "../Database/Connection.php";

$connection = $conn;
$table = "tbl_user_info";

$values = array(
    'user_info_Id' => $_POST['userId'],
    'name' => $_POST['name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
    'isActive' => '1',
    'userType' => $_POST['user']
);

$columns = implode(", ", array_keys($values));
$placeholders = "'" . implode("', '", array_values($values)) . "'";

$sql = "UPDATE $table SET ";

foreach ($values as $column => $value) {
    $sql .= "$column = '$value', ";
}

$sql = rtrim($sql, ", "); // Remove the trailing comma and space
$sql .= " WHERE user_info_Id = '{$values['user_info_Id']}'";

//still follow the usual tracing of php class
include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass($connection);
$addData->updateData($sql);
?>