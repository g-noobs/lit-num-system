<?php
$values = array(
    'module_id' => '',
    'module_name' => $_POST['subj_name_add'],
    'module_description	' => $_POST['subj_add_desc'],
    'module_status' => '1',
);
$table = "tbl_module";

//Geenrate Subject ID
include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

$values['module_id'] = "SBJ". $columnCountClass->columnCountWhere("module_id",$table);

//insert subject name validation
include_once "../../../Database/CommonValidationClass.php";
$validate = new CommonValidationClass();
$isValid = $validate -> validateOneColumn($table, 'module_name', $values['module_name']);

if($isValid){
    $columns = implode(', ', array_keys($values));
    $sql = "INSERT INTO $table ($columns) VALUES(?,?,?,?);";
    $params = array_values($values);

    include_once("../../../Database/SanitizeCrudClass.php");
    $addSubj = new SanitizeCrudClass();
    try{
        $addSubj->executePreState($sql, $params);
        if($addSubj->getLastError() === null){
            $response = array('success' => 'Subject '.$values['module_name']. ' has been Added');
        } else {
            $response = array('error' => 'Subject '.$values['module_name']. ' has not been Added');
        }
        echo json_encode($response);
    } catch (Exception $e) {
        $response = array('error' => $e->getMessage());
        echo json_encode($response);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062){
            //Duplicate entry
            $response = array('error' => 'Subject '.$values['module_name']. ' already exists. Please try again');
            echo json_encode($response);
          }
          else{
              throw $e;
              $response = array('error' => $e);
              echo json_encode($response);
          }
    }
} else {
    $response = array('error' => 'Subject '.$values['module_name']. ' already exists. Please try again');
    echo json_encode($response);
}
?>