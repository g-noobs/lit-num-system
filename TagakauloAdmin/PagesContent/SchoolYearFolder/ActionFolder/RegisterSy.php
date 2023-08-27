<?php 
$table = "tbl_schoolyear";

$values = array(
    'sy_id' => '',
    'sy_name' => trim($_POST['sy_name']),
    'sy_status' => 1

);

//automated School year ID

include_once("../../../Database/ColumnCountClass.php");
$cCount = new ColumnCountClass();
$values['sy_id'] = "SY".(1001 + (int)$cCount->columnCount("sy_id", $table));

include_once("../../../Database/SchoolYearClass.php");
$isValid = new SchoolYearClass();
$data = $values['sy_name'];
$column = 'sy_name';
$isValid -> validateColumn($table, $column, $data);

if($isValid) {
    $columns = implode(', ', array_keys($values));

    $query = "INSERT INTO $table ($columns)
            VALUES (?,?,?);";

    $params = array_values($values);
    include_once("../../../Database/SanitizeCrudClass.php");
    $newSchoolYear = new SanitizeCrudClass();
    
    try{
        $newSchoolYear->executePreparedStatement($query, $params, "../../../pages/schoolyr.php");
    } catch (mysqli_sql_exception $e) {

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