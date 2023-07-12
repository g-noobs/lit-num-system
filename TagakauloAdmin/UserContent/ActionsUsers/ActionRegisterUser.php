<?php 
include_once "../Database/Connection.php";

$connection = $conn;
$table = "tbl_user_info";

$values = array(
    'name' => $_POST['name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
    'isActive' => '1',
    'userType' => $_POST['user']
);

// Assuming $table variable holds the table name
$sql = "INSERT INTO $table (name, gender, email, birthdate, isActive, userType) VALUES ('" .
    implode("','", array_values($values)) .
    "');";

$sql2 = ";";

$finalSql = $sql.$sql2;

//still follow the usual tracing of php class
include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addData($sql);

$includ_once("../../CommonPHPClass/PHPClass.php");
$phpClass = new PHPClass();

$username = $values['name'];
$password = $phpClass->generatePassword(10);

include_once("../../Database/CreateUser.php");
$newUser = new Credentials();
$newUser->userCreds($username, $password);


?>

