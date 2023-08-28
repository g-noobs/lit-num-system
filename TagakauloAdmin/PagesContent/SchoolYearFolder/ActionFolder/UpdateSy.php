<?php 
$table = "tbl_schoolyear";

$values = array(
    'sy_name' => trim($_POST['sy_name']),
    'sy_id' => $_POST['sy_id']
);


//Class used for checkin duplicate
include_once("../../../Database/SchoolYearClass.php");
$isValid = new SchoolYearClass();
$data = trim($_POST['sy_name']);
$column = 'sy_name';
$isValid -> validateColumn($table, $column, $data);

include_once("../../../Database/SanitizeCrudClass.php");
$updateSchoolYear = new SanitizeCrudClass();

if($isValid){
    $query = "UPDATE $table 
          SET sy_name =? WHERE sy_id = ?";
    $params = array_values($values);
    try{
        $message = "Edited";
        $updateSchoolYear->executePreparedStatement($query, $params, '../../../pages/schoolyr.php');
    }
    catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062) {
    
            // Duplicate entry
            $message = $data." already exists. Please try again";  
            header('Location: ../../../pages/schoolyr.php?msg='.urlencode($message));
            exit();
      
          } else {
      
            // Some other error
            throw $e;
          }
    }
}
?>