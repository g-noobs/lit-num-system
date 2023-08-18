<?php 
session_start();
$id = $_SESSION['id'];
$table = "tbl_user_info";
$values = array(
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
    'user_info_id'=>$id
);


$query = "UPDATE $table 
          SET first_name = ?, last_name = ?, gender = ?, email = ?, birthdate = ?
          WHERE user_info_id = ?";

$params = array_values($values);

include_once("../../Database/SanitizeCrudClass.php");
$update=new SanitizeCrudClass();
$update->executePreState($query, $params);



$query2 = "UPDATE tbl_credentials SET uname = ?, pass = ? WHERE user_info_id = ?";

$uname = $_POST['username'];
$pass = $_POST['password'];
$id = $_SESSION['id']; 

$params = [$uname, $pass, $id];

$update->executePreState($query2, $params);

$message = 'Profile updated!'; 
// Pass message as GET parameter
header('Location: ../../pages/profile.php?msg=' . urlencode($message));
?>