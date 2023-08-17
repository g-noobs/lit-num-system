<?php 
session_start();

$table = "tbl_lesson";

$values = array(
    'lesson_id' => '',
    'lesson_name' => $_POST['lesson_name'],
    'category_id'=>$_POST['level_learning'],
    'topic_id' => '',
    'addedby_ID' => '',
);

//added
$values['addedby_ID']= $_SESSION['id'];

//automated lesson ID
include_once("../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();
$values['lesson_id'] = "LSN".(100001 + (int)$columnCountClass->columnCount("lesson_id",$table));



// Assuming $table variable holds the table name
$sql = "INSERT INTO $table (lesson_id, lesson_name, category_id, topic_id,  added_byID) VALUES ('" .
    implode("','", array_values($values)) .
    "')";



include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addManyData($sql, "../../pages/lesson.php");

?>