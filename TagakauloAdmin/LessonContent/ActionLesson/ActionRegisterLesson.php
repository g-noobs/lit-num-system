<?php
session_start();
include_once("../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();
$lesson_id = "LSN-ID".(100001 + $columnCountClass->columnCount("lesson_id","tbl_lesson"));
$objective_id = "OBJ-ID".(100001 + $columnCountClass->columnCount("objective_id","tbl_objective"));
$topic_id = "TPC-ID".(100001 + $columnCountClass->columnCount("topic_id","tbl_topic"));
$count = 100001 + $columnCountClass->columnCount("teacher_lesson_id ","tbl_teacher_lesson");
$teacher_lesson_id = "TCH-L-ID:". $count;
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
    'topic_title'=>'',
    'topic_content'=>'',
    'content_imagepath_id'=>'',
    'audio_id'=>'',
    'video_id'=>''
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

$table = 'tbl_teacher_lesson';
// Get the checked checkbox values as an array
$categories = $_POST['categories'];
// Loop through checked values
if(!empty($categories)){
    foreach($categories as $category_id) {
        $sql .= "INSERT INTO $table (teacher_lesson_id, lesson_id, teacher_id) VALUES(".$teacher_lesson_id.",".$lesson_id.",".$category_id.");";
        $teacher_lesson_id = "TCH-L-ID:". ($count + 1);
      }
}
else{
    echo "non selected";
}
include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addManyData($sql, "../../pages/lesson.php");

?>