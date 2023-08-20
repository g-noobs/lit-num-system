<?php 
$values= array(
    'class_id'=>$_POST['class_id'],
    'class_name'=>$_POST['class_name']
);



$table = "tbl_class";
$sql = "UPDATE $table SET class_name = '{$values['class_name']}' WHERE class_id = '{$values['class_id']}';";

//still follow the usual tracing of php class
include_once("../../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addManyData($sql, "../../../pages/class.php");
?>