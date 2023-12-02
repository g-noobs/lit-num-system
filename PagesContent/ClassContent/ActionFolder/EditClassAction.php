<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../../Database/CommonValidationClass.php";
include_once "../../../Database/SanitizeCrudClass.php";
include_once "../../../CommonPHPClass/InputValidationClass.php";

$id = $_POST['id'];
$values = array(
    'class_name' => $_POST['class_name'],
    'sy_id' => $_POST['sy_id'],
    'class_id' => $id
);

$table = 'tbl_class';
$inputValidation = new InputValidationClass();
$class_name = $inputValidation->test_input($_POST['class_name'], 'address');

$errors = array();
if($class_name === false){
    $errors[] = "Invalid Character in Class Name";
}
if(!empty($errors)){
    echo json_encode($errors);
    exit();
}else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $validate = new CommonValidationClass();
        $isValid = $validate -> updateValidateOne($table, 'class_name', $values['class_name'], 'class_id',$values['class_id']);
        
        if($isValid){
            $sql = "UPDATE $table
            SET class_name = ?,
                sy_id = ?
            WHERE class_id = ?";

            $params = array_values($values);
            $updateClass = new SanitizeCrudClass();
            $updateClass->executePreState($sql, $params);

            if($updateClass->getLastError() === null){
                $response = array('success' => 'Successfullt Update Class: '. $values['class_id']);
                echo json_encode($response);
                exit();
            }else{
                $response = array('error' => $updateClass->getLastError());
                echo json_encode($response);
                exit();
            }
        }else{
            $response = array('error' => 'Data Duplicate. Please try again. . ');
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