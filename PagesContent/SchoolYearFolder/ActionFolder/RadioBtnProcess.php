<?php 
include_once("../../../Database/SanitizeCrudClass.php");

if(isset($_POST['sy_id'])) {
    $selectedId = $_POST['sy_id'];

    // Retrieve data from the database using the selected ID
    $table = "tbl_schoolyear";
    $status = 0;
    $query = "UPDATE $table SET sy_status = ?;";
    $updateAllSy = new SanitizeCrudClass();
    $params = array($status);


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