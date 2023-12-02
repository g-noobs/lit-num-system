<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../../Database/CommonValidationClass.php";
include_once "../../../Database/SanitizeCrudClass.php";
include_once "../../../CommonPHPClass/InputValidationClass.php";

$id = $_POST['id'];
$values = array(
    'module_name' => $_POST['subj_name_add'],
    'module_description	' => $_POST['subj_add_desc'],
    'module_id' => $id
);
$table = 'tbl_module';
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
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $validate = new CommonValidationClass();
        $isValid = $validate -> updateValidateOne($table, 'module_name', $values['module_name'], 'module_id',$values['module_id']);
        
        if($isValid){
            $sql = "UPDATE $table
            SET module_name = ?
                module_description = ?
            WHERE module_id = ?";
            $params = array_values($values);

            $updateModule = new SanitizeCrudClass();
            $updateModule->executePreState($sql, $params);

            if($updateModule->getLastError() === null){
                $response = array('success' => 'Successfullt Update Module: '. $values['module_id']);
                echo json_encode($response);
                exit();
            }else{
                $response = array('error' => $updateModule->getLastError());
                echo json_encode($response);
                exit();
            }
        }else{
            $response = array('error' => 'Updated Data has Duplicate');
            echo json_encode($response);
            exit();
        }
    }else{
        $response = array('POSSIBLE POST ERROR!');
        echo json_encode($response);
        exit();
    }
}
?>