<?php
    if(isset($_POST['id'])) {
    $lessonId = $_POST['id'];

    include_once "../../../Database/LessonDisplayClass.php";
    $topicDisplay = new LessonDisplayClass();
    $topicDisplay->topicTable($lessonId);
    }
?>