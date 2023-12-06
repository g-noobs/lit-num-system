<?php

include_once("../../../Database/SanitizeCrudClass.php");
$archive = new SanitizeCrudClass();
// Retrieve values from POST or set default values
$sy_id =  $_POST['id'];

//if it came from $_POST['id'] then it would be an individual archive then if it came from $_POST['sy_id'] then it would be a
// bulk archive or using radio button


try{
    // Step 1: Archive the school year in tbl_school_year
    $archive_sy_query = "UPDATE tbl_schoolyear 
    SET 
        sy_status = 0
    WHERE sy_id = ?";
    $params = array($sy_id);

    $archive->executePreState($archive_sy_query, $params);

    // Step 2: Archive the class that has reference to the school year
    $archive_class_query = "UPDATE tbl_class
    SET 
        class_status = 0
    WHERE sy_id = ?";
    $archive->executePreState($archive_class_query, $params);
    

    // Step 3: Archive the user that has reference to the of the archived class
    $archive_user_query = "UPDATE tbl_user_info 
    SET status_id = 0 WHERE 
    class_id IN (SELECT class_id FROM tbl_class WHERE sy_id = ?)";
    $archive->executePreState($archive_user_query, $params);


    //step 4: Archive the module that has reference to the school year
    $archive_module_query = "UPDATE tbl_module SET module_status = 0 WHERE sy_id = ?";
    $archive->executePreState($archive_module_query, $params);

    // Step 5: Archive the corresponding rows in tbl_lesson based on reference module_id
    $archive_lesson_query = "UPDATE tbl_lesson SET lesson_status = 0 WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)";
    $archive->executePreState($archive_lesson_query, $params);

    //Step 6: Archive the corresponding rows in tbl_topic based on reference lesson_id
    $archive_topic_query = "UPDATE tbl_topic SET topic_status = 0 WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?))";
    $archive->executePreState($archive_topic_query, $params);

    // Step 7: Archive the corresponding rows in tbl_quiz based on reference topic_id
    $archive_quiz_query = "UPDATE tbl_quiz SET quiz_status = 0 WHERE topic_id IN (SELECT topic_id FROM tbl_topic WHERE lesson_id IN (SELECT lesson_id FROM tbl_lesson WHERE module_id IN (SELECT module_id FROM tbl_module WHERE sy_id = ?)))";

    // add a statment to check if no single error occured
    if($archive->getLastError() === null){
        $response = array("success" => "Successfully archived all entry under school year! ". $sy_id);
    
    }else{
        $response = array("error" => $archive->getLastError());
    }
    echo json_encode($response);
    
}
catch(Exception $e){
    $response = array("error" => $e);
    echo json_encode($response);
}
?>