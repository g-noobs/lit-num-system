<?php 
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

$table = "tbl_schoolyear";
//Class used for checkin duplicate
include_once("../../../Database/CommonValidationClass.php");
$validCol = new CommonValidationClass();
$data = trim($_POST['sy_start']);
$column = 'sy_start';
$isValid = $validCol -> validateColumns($table, $column, $data);

include_once("../../../Database/SanitizeCrudClass.php");
$updateSchoolYear = new SanitizeCrudClass();
$query = "UPDATE $table 
          SET sy_start =?, sy_end=?, sy_status = 1 WHERE sy_id = ?";     
$params = array_values($values);

if($isValid){
    try{
        $updateSchoolYear->executePreState($query, $params);
        $response = array("success" => "Successfully updated school year!");
        echo json_encode($response);
      }
    catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062) {
            // Duplicate entry
          $response = array("error" => $data." already exists. Please try again");
          echo json_encode($response);
      
          } else {
            // Some other error
            $response = array("error" => $e->getMessage());
            echo json_encode($response);
            throw $e;
          }
    }
}
else{
  $response = array("error" => $data." already exists. Please try again");
  echo json_encode($response);
}
?>