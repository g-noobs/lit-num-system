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


    $response = array("success" => "Successfully archived school year!". $sy_id);
    echo json_encode($response);
}
catch(Exception $e){
    $response = array("error" => $e);
    echo json_encode($response);
}
?>