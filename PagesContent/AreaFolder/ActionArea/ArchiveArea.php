<?php
$table = "tbl_area";

$id = $_POST['area_id'];

$sql = "UPDATE $table SET status_id = 0 WHERE area_id = '$id'";

//still follow the usual tracing of php class
include_once("../../../Database/AddDeleteClass.php");
$delete = new AddDeleteClass();
$delete->removeData($sql);
?>

