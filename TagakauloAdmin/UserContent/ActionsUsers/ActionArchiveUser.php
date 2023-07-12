<?php
$table = "tbl_user_info";

$id = $_POST['userId'];

$sql = "UPDATE $table SET isActive = 0 WHERE user_info_id = '$id'";

//still follow the usual tracing of php class
include_once("../../Database/AddDeleteClass.php");
$delete = new AddDeleteClass();
$delete->removeData($sql);
?>

