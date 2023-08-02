<?php 
$values= array(
    'class_id'=>'',
    'class_name'=>$_POST['class_name'],
    'class_status'=>'1'
);

include_once("../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();
$count = $columnCountClass->userCount("class_id","tbl_class");


$values['class_id'] = "CLS".(100001 + $count);

$table = "tbl_class";
$sql = "INSERT INTO $table (class_id , class_name, class_status) VALUES ('" .
    implode("','", array_values($values)) .
    "');";

include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addManyData($sql, "Location: ../../pages/class.php");
?>