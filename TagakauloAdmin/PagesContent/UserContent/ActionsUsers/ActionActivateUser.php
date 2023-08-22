<?php
$table = "tbl_user_info";

$id = $_POST['userId'];
$status = 1;

$sql = "UPDATE $table SET status_id = 1 WHERE user_info_id = '$id'";

$query = "UPDATE $table SET status_id = ? WHERE user_info_id = ?";
$params = [$status, $id];

//still follow the usual tracing of php class
include_once("../../../Database/SanitizeCrudClass.php");
$archive = new SanitizeCrudClass();
$archive->executePreparedStatement($query, $params, "../../../pages/user.php");
?>

