<?php 
session_start();

$table = "tbl_lesson";

$values = array(
    'lesson_id' => '',
    'lesson_name' => $_POST['lesson_name'],
    'category_id'=>$_POST['level_learning'],
    'topic_id' => '',
    'added_byID' => '',
);

//added
$values['added_byID']= $_SESSION['id'];

//automated lesson ID
include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();
$values['lesson_id'] = "LSN".(100001 + (int)$columnCountClass->columnCount("lesson_id",$table));

$columns = implode(', ', array_keys($values));

$query = "INSERT INTO $table ($columns)
          VALUES (?,?,?,?,?);";

$params = array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");
$addNewLesson = new SanitizeCrudClass();
$addNewLesson->executePreparedStatement($query, $params, "../../../pages/lesson.php")

?>