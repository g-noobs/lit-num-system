<?php 
session_start();
$values= array(
    'class_id'=>'',
    'class_name'=>$_POST['class_name'],
    'class_status'=>'1'
);

$added_byID = $_SESSION['id'];

include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();
$count = $columnCountClass->columnCount("class_id","tbl_class");


$values['class_id'] = "CLS".(100001 + $count);

$table = "tbl_class";
$query = "INSERT INTO $table (class_id , class_name, class_status) VALUES (?,?,?);";
$params = array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");
$addData = new SanitizeCrudClass();
$addData->executePreState($query, $params);



$teacher_classlearner = array(
    'teacher_id' => $_POST['teacher'],
    'learner_id' => 'none',
    'class_id' => $values['class_id'],
    'area_id'=> $_POST['area'],
    'addedby_ID' => $added_byID,
    'date_createad' => ''
);

include_once("../../../CommonPHPClass/PHPClass.php");
$date = new PHPClass();
$currentDate = $date->getFormattedCurrentDate();

$teacher_classlearner['date_createad'] = $currentDate;

$table = "tbl_teacher_classlearner";
$query = "INSERT INTO $table (teacher_id, learner_id, class_id, area_id, addedby_ID, date_created) VALUES (?,?,?,?,?,?);";
$params = array_values($teacher_classlearner);

include_once("../../../Database/SanitizeCrudClass.php");
$addNewData = new SanitizeCrudClass();
$addNewData->executePreparedStatement($query, $params, "../../../pages/class.php")

?>