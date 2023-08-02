<?php 
session_start();
$values = array(
    'user_info_id'=>'',
    'personal_id' =>$_POST['personal_id'],
    'first_name' => $_POST['first_name'],
    'last_name' =>$_POST['last_name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
    'status_id' => '1',
    'user_level_id' => '',
    'added_byID'=>''
);

if ($_POST['user']=== "Admin") {
    $values['user_level_id'] = '0';
    $username = $values['email'];
} else if ($_POST['user'] === "Teacher") {
    $values['user_level_id'] = '1';
    $username = $values['personal_id'];
} else if ($_POST['user']=== "Learner") {
    $values['user_level_id'] = '2';
    $username = $values['personal_id'];
}

include_once("../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

// modify user id plus the column count
$values['user_info_id'] = "USR".(100001 + $columnCountClass->userCount("user_info_Id","tbl_user_info"));

//place value for id
$values['added_byID']= $_SESSION['id'];

//Password generation
include_once("../../CommonPHPClass/PHPClass.php");
$phpClass = new PHPClass();

$credentials_id = "CRED".(100001 + (int)$columnCountClass->userCount("credentials_id","tbl_credentials"));

$password = $phpClass->generatePassword(10);
$user_info_id = $values['user_info_id'];



$table = "tbl_user_info";
// Assuming $table variable holds the table name
$sql = "INSERT INTO $table (user_info_id , personal_id, first_name, last_name, gender, email, birthdate, status_id, user_level_id,added_byID) VALUES ('" .
    implode("','", array_values($values)) .
    "');";
$table = "tbl_credentials";
$sql .= "INSERT INTO $table(credentials_id,uname,pass,user_info_id )VALUES ('".$credentials_id."', '".$username."','".$password."','".$user_info_id ."');";


//still follow the usual tracing of php class
include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addMany($sql);
?>

