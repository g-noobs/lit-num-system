<?php 
session_start();

$added_byID = $_SESSION['id'];
$table = 'tbl_category';

$values = array(
    'category_id' => '',
    'category_name' => $_POST['category_name'],
    'category_info' => $_POST['category_info'],
    'addedby_ID' => '',
    'date_added' => '',
    'category_status' => '1'
);

$values['addedby_ID'] = $added_byID;

include_once("../../Database/ColumnCountClass.php");
$columnCount = new ColumnCountClass();
$newCount = "CTG".(101 + $columnCount ->columnCount("category_id", $table));
$values['category_id'] = $newCount;




include_once("../../CommonPHPClass/PHPClass.php");
$date = new PHPClass();
$currentDate = $date->getFormattedCurrentDate();



$query = "INSERT INTO $table (category_id, category_name, category_info, addedby_ID, date_added, category_status) VALUES (?, ?, ?, ?, ?, ?);";
$params =array_values($values);

include_once("../../Database/SanitizeCrudClass.php");
$addNewData = new SanitizeCrudClass();
$addNewData->executePreparedStatement($query, $params, "../../pages/category.php")
?>