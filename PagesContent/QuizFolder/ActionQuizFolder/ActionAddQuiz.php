<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['quiz_question'])){
        $values = array(
            'quiz_id' => '',
            'quiz_question' => $_POST['quiz_question'],
            'quiz_selectionA' => '', //Correct Answer
            'quiz_selectionB' => '',
            'quiz_selectionC' => '',
            'quiz_selectionD' => '',
            'date_created' => '',
            'topic_id' => $_POST['topic_id']
        );
        
    }
}
// db colomnlist
// quiz_id
// quiz_question
// quiz_selectionA = correct amswer
//quiz_selectionB
//quiz_selectionC
//quiz_selectionD
//date_created
//topic_id

?>