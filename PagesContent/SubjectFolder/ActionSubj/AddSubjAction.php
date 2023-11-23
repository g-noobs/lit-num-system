<?php
//Geenrate Subject ID
include_once("../../../Database/ColumnCountClass.php");
//insert subject name validation
include_once "../../../Database/CommonValidationClass.php";
include_once("../../../Database/SanitizeCrudClass.php");
//character validation
include_once("../../../CommonPHPClass/InputValidationClass.php");
$values = array(
    'module_id' => '',
    'module_name' => $_POST['subj_name_add'],
    'module_description	' => $_POST['subj_add_desc'],
    'date_added' => '',
    'added_by_id'=> '',
);
$table = "tbl_module";

$inputValidation = new InputValidationClass();
$module_name = $inputValidation->test_input($_POST['subj_name_add'], 'address');
$module_description = $inputValidation->test_input($_POST['subj_add_desc'], 'description');

$errors = array();
if($module_name === false){
    $errors[] = "Invalid Character in Module Name";
}
if($module_description === false){
    $errors[] = "Invalid Characters in Module Description";
}
if(!empty($errors)){
    echo json_encode($errors);
    exit();
}else{
    $columnCountClass = new ColumnCountClass();
    $values['module_id'] = "MOD". $columnCountClass->columnCountWhere("module_id",$table);


    $validate = new CommonValidationClass();
    $isValid = $validate -> validateOneColumn($table, 'module_name', $values['module_name']);

    if($isValid){
        //set columns
        $columns = implode(', ', array_keys($values));
        //set number of question marks
        $questionMarkString = implode(',', array_fill(0, count($values), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES($questionMarkString);";
        $params = array_values($values);
        
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
}
?>