<?php 
$values = array(
    'area_id' => '',
    'area_name' => $_POST['area_name'],
    'area_address' => $_POST['area_address'],
    'status_id' => '1'
);
$table = 'tbl_area';

include_once("../../Database/ColumnCountClass.php");

$columnCount = new ColumnCountClass();
$newCount = "AREA".(101 + $columnCount ->userCount("area_id", $table));
$values['area_id'] = $newCount;


$sql = "INSERT INTO $table (area_id , area_name, area_address, status_id) VALUES ('" .
    implode("','", array_values($values)) .
    "');";

include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addArea($sql);

?>