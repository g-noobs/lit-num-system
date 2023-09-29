<?php 
$table = "tbl_schoolyear";

$sy_name = $_POST['sy_name'];
$parts = explode('-', $sy_name);
if(count($parts) === 2) {
  $start_year = trim($parts[0]); // Trim any leading/trailing whitespace
  $end_year = trim($parts[1]);
}

$values = array(
    'sy_id' => '',
    'sy_start' => $start_year,
    'sy_end' => $end_year,
    'sy_status' => 1

);

//automated School year ID

include_once("../../../Database/ColumnCountClass.php");
$cCount = new ColumnCountClass();
$values['sy_id'] = "SY".(1001 + (int)$cCount->columnCount("sy_id", $table));

include_once("../../../Database/CommonValidationClass.php");
$commonVal = new CommonValidationClass();
$data = $values['sy_start'];
$column = 'sy_start';
$isValid = $commonVal -> validateColumns($table, $column, $data);


if($isValid) {
    $columns = implode(', ', array_keys($values));

    $query = "INSERT INTO $table ($columns)
            VALUES (?,?,?,?);";

    $params = array_values($values);
    include_once("../../../Database/SanitizeCrudClass.php");
    $newSchoolYear = new SanitizeCrudClass();
    
    try{
        $newSchoolYear->executePreState($query, $params);
        $response = array("success" => "Successfully added new school year!");
        echo json_encode($response);
    } catch (mysqli_sql_exception $e) {

        if ($e->getCode() == 1062) {
          // Duplicate entry
          $response = array("error" => $data." already exists. Please try again");
          echo json_encode($response);
    
        } else {
    
          // Some other error
          throw $e;
          $response = array("error" => $e);
          echo json_encode($response);
        }
    }
}
else{
  $response = array("error" => $data." already exists. Please try again");
  echo json_encode($response);
}


unset($_POST['sy_name']);
?>