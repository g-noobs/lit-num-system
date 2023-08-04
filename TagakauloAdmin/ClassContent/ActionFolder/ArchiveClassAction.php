<?php 
$id = $_POST['class_id'];

$table = "tbl_class";
$query = "UPDATE $table SET class_status = 0 WHERE class_id = '$id'";

include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->updateClass($query, "../../pages/class.php");

?>