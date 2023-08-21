<?php
$table = "tbl_user_info";

$id = $_POST['userId'];

$sql = "UPDATE $table SET status_id = 1 WHERE user_info_id = '$id'";

$query = "UPDATE $table SET status_id = ? WHERE user_info_id = ?";
$params = [$id, $status];

//still follow the usual tracing of php class
include_once("../..../Database/SanitizeCrudClass.php");
$activateUser = new SanitizeCrudClass();
$archive->executePreparedStatement($query, $params, "../../../pages/user.php");
?>

