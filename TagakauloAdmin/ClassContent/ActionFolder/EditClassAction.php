<?php 
$values= array(
    'class_id'=>$_POST['class_id'],
    'class_name'=>$_POST['class_name']
);



$table = "tbl_class";
$sql = "UPDATE class_name FROM $table WHERE class_id = '{$values['class_id']}';";

//still follow the usual tracing of php class
include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->updateData($sql);
?>