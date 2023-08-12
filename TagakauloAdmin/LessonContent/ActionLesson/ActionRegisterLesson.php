<?php
session_start();
include_once("../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

$lesson_id = "LSN-ID".(100001 + $columnCountClass->columnCount("lesson_id","tbl_lesson"));
$objective_id = "OBJ-ID".(100001 + $columnCountClass->columnCount("objective_id","tbl_objective"));
$topic_id = "TPC-ID".(100001 + $columnCountClass->columnCount("topic_id","tbl_topic"));



$added_byID = $_SESSION['id'];

include_once("../../CommonPHPClass/PHPClass.php");
$date = new PHPClass();
$currentDate = $date->getFormattedCurrentDate();

$lesson = array(
 'lesson_id'=>$lesson_id,
 'lesson_name'=>$_POST['lesson_name'],
 'objective_id'=>$objective_id,
 'topic_id'=>$topic_id,
 'added_byID'=>$added_byID
);

$objective = array(
    'objectieve_id'=> $objective_id,
    'objective'=> $_POST['objective']
);

$topic = array(
    'topic_id'=>$topic_id,
    'topic_title'=>$_POST['topic_title'],
    'topic_content'=>'test',
    'image_id'=>'test',
    'audio_id'=>'test',
    'video_id'=>'test'
);

$image = array(
    'image_id'=>'',
    'image_path'=>'',
);

$video= array(
    'video_id'=>'',
    'video_path'=>'',
);

$audio = array(
    'audio_id'=>'',
    'audio_path'=>''
);

$added = array(
    'added_byID'=>$added_byID ,
    'date_added'=>$currentDate,
    'role_id'=>'1'
);
$table = "tbl_lesson";
$sql = "INSERT INTO $table (lesson_id , lesson_name, objective_id, topic_id, added_byID) VALUES ('" .
    implode("','", array_values($lesson)) .
    "');";

$table = 'tbl_objective';
$sql .= "INSERT INTO $table (objective_id, objective) VALUES ('" . implode("','", array_values($objective)) .
"');";

$table = 'tbl_topic';
$sql .= "INSERT INTO $table (topic_id, topic_title,topic_content,image_id,audio_id,video_id) VALUES ('" . implode("','", array_values($topic)) .
"');";


$table = 'tbl_teacher_lesson';
// Get the checked checkbox values as an array
$teacher_lesson_id = "TCH-L-ID:";
$count = 100001 + $columnCountClass->columnCount("teacher_lesson_id ","tbl_teacher_lesson");
   // Loop through checked checkboxes
    foreach($_POST['categories'] as $category_id) {
        $sql .= "INSERT INTO $table (teacher_lesson_id, lesson_id, user_info_id) VALUES ('$teacher_lesson_id
        $count','$lesson_id','$category_id');";
        $count++;
    }

foreach($_POST['class_check'] as $class_id){
    $sql .= "UPDATE tbl_class SET lesson_id = '$lesson_id' WHERE class_id = $class_id";

}


include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addManyData($sql, "../../pages/lesson.php");
?>