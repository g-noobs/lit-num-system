<?php 
include_once("../../../Database/SanitizeCrudClass.php");

if(isset($_POST['sy_id'])) {
    $selectedId = $_POST['sy_id'];

    // Retrieve data from the database using the selected ID
    try{
    // Step 1: Archive the school year in tbl_school_year
    $archive_sy_query = "UPDATE tbl_schoolyear 
    SET 
        sy_status = 0
    WHERE sy_id = ?";
    $archive_sy_stmt = $conn->prepare($archive_sy_query);
    $archive_sy_stmt->bind_param("i", $selectedId);
    $archive_sy_stmt->execute();

    //statement to check if excute is successful
    if($archive_sy_stmt->affected_rows > 0){
        $response = array("success" => "Successfully archived school year!");
        echo json_encode($response);
    }
    else{
        $response = array("error" => "Failed to archive school year!");
        echo json_encode($response);
    }

    // Step 2: Archive the class that has reference to the school year
    $archive_class_query = "UPDATE tbl_class
    SET 
        class_status = 0
    WHERE sy_id = ?";
    $archive_class_stmt = $conn->prepare($archive_class_query);
    $archive_class_stmt->bind_param("i", $selectedId);
    $archive_class_stmt->execute();

    //statment to check if execute is successful
    if($archive_class_stmt->affected_rows > 0){
        $response = array("success" => "Successfully archived school year!");
        echo json_encode($response);
    }
    else{
        $response = array("error" => "Failed to archive school year!");
        echo json_encode($response);
    }

    // Step 3: Archive the user that has reference to the of the archived class
    $archive_user_query = "UPDATE tbl_user_info 
    SET status_id = 0 WHERE 
    class_id IN (SELECT class_id FROM tbl_class WHERE sy_id = ?)";
    $archive_user_query = $conn->prepare($archive_user_query);
    $archive_user_query->bind_param("i", $selectedId);
    $archive_user_query->execute();

    if($archive_user_query->affected_rows > 0){
        $response = array("success" => "Successfully archived school year!");
        echo json_encode($response);
    }
    else{
        $response = array("error" => "Failed to archive school year!");
        echo json_encode($response);
    }
    //step 4: Archive the module that has reference to the school year


    
}
catch(Exception $e){
    $response = array("error" => $e);
    echo json_encode($response);
}

    $updateAllSy->executePreState($query,$params);

    if($updateAllSy->getLastError() === null){
        $status = 1;
        $query ="UPDATE $table SET sy_status = ? WHERE sy_id = ?";
        $params = array($status, $selectedId);
        $updateCurrentSy = new SanitizeCrudClass();
        $updateCurrentSy->executePreState($query,$params);
    }
}
?>