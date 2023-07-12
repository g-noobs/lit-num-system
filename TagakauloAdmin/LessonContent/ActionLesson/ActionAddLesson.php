<?php 



$table = "tbl_lesson";

$values = array(
    'lesson_name' => $_POST['lesson_name'],
    'objective_id' => $_POST['objective_id'],
    'topic_id' => $_POST['topic_id'],
    'date_added' => $_POST['date_added'],
    'addedby_ID' => '1',
);

// Assuming $table variable holds the table name
$sql = "INSERT INTO $table (lesson_name, objective_id, topic_id,date_added, addedby_ID) VALUES ('" .
    implode("','", array_values($values)) .
    "')";

include_once("../../Database/AddDeleteClass.php");
$addData = new AddDeleteClass();
$addData->addLesson($sql);

?>