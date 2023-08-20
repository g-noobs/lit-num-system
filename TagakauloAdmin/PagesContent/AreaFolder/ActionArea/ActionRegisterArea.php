<?php 
$values = array(
    'area_id' => '',
    'area_name' => $_POST['area_name'],
    'area_address' => $_POST['area_address'],
    'status_id' => '1'
);
$table = 'tbl_area';

include_once("../../../Database/ColumnCountClass.php");

$columnCount = new ColumnCountClass();
$newCount = "AREA".(101 + $columnCount ->columnCount("area_id", $table));
$values['area_id'] = $newCount;


$sql = "INSERT INTO $table (area_id , area_name, area_address, status_id) 
VALUES (?,?,?,?);";

$params = array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");
$addNewData = new SanitizeCrudClass();
$addNewData->executePreparedStatement($sql, $params, "../../../pages/area.php")

?>

