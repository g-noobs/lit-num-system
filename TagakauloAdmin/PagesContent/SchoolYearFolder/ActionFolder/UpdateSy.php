<?php 
$table = "tbl_schoolyear";

$sy_name = $_POST['sy_name_edit'];
$parts = explode('-', $sy_name);
if(count($parts) === 2) {
    $start_year = trim($parts[0]); // Trim any leading/trailing whitespace
    $end_year = trim($parts[1]);
  }

$values = array(
    'sy_start' => $start_year,
    'sy_end' => $end_year,
    'sy_id' => $_POST['sy_id']
);


//Class used for checkin duplicate
include_once("../../../Database/SchoolYearClass.php");
$isValid = new SchoolYearClass();
$data = trim($_POST['sy_start']);
$column = 'sy_start';
$isValid -> validateColumn($table, $column, $data);

include_once("../../../Database/SanitizeCrudClass.php");
$updateSchoolYear = new SanitizeCrudClass();

if($isValid){
    $query = "UPDATE $table 
          SET sy_start =?, sy_end=? WHERE sy_id = ?";
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