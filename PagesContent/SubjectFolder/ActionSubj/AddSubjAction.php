<?php
$values = array(
    'subj_id' => '',
    'subj_name' => $_POST['subj_name_add'],
    'subj_description	' => $_POST['subj_add_desc'],
    'subj_status' => '1',
);
$table = "tbl_subject";

//Geenrate Subject ID
include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

$values['subj_id'] = "SBJ". $columnCountClass->columnCountWhere("subj_id",$table);

//insert subject name validation
include_once "../../../Database/CommonValidationClass.php";
$validate = new CommonValidationClass();
$isValid = $validate -> validateOneColumn($table, 'subj_name', $values['subj_name']);

if($isValid){
    $columns = implode(', ', array_keys($values));
    $sql = "INSERT INTO $table ($columns) VALUES(?,?,?,?);";
    $params = array_values($values);

    include_once("../../../Database/SanitizeCrudClass.php");
    $addSubj = new SanitizeCrudClass();
    try{
        $addSubj->executePreState($sql, $params);
        if($addSubj->getLastError() === null){
            $response = array('success' => 'Subject '.$values['subj_name']. ' has been Added');
        } else {
            $response = array('error' => 'Subject '.$values['subj_name']. ' has not been Added');
        }
        echo json_encode($response);
    } catch (Exception $e) {
        $response = array('error' => $e->getMessage());
        echo json_encode($response);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062){
            //Duplicate entry
            $response = array('error' => 'Subject '.$values['subj_name']. ' already exists. Please try again');
            echo json_encode($response);
          }
          else{
              throw $e;
              $response = array('error' => $e);
              echo json_encode($response);
          }
    }
} else {
    $response = array('error' => 'Subject '.$values['subj_name']. ' already exists. Please try again');
    echo json_encode($response);
}
?>