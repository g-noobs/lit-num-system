<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "../../../Database/CommonValidationClass.php";
include_once "../../../Database/SanitizeCrudClass.php";
include_once "../../../CommonPHPClass/InputValidationClass.php";

$id = $_POST['id'];

$values = array(
    'category_name' => $_POST['category_name'],
    'category_info' => $_POST['category_description'],
    'category_id' => $id
);

$table = 'tbl_category';
$inputValidation = new InputValidationClass();
$category_name = $inputValidation->test_input($_POST['category_name'], 'address');

$errors = array();
if($category_name === false){
    $errors[] = "Invalid Character in Category Name";
}
if(!empty($errors)){
    echo json_encode($errors);
    exit();
}else{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $validate = new CommonValidationClass();
        $isValid = $validate -> updateValidateOne($table, 'category_name', $values['category_name'], 'category_id',$values['category_id']);
        
        if($isValid){
            $sql = "UPDATE $table
            SET category_name = ?,
                category_info = ?
            WHERE category_id = ?";

            $params = array_values($values);
            $updateCategory = new SanitizeCrudClass();
            $updateCategory->executePreState($sql, $params);

            if($updateCategory->getLastError() === null){
                $response = array('success' => 'Successfullt Update Category: '. $values['category_id']);
                echo json_encode($response);
                exit();
            }else{
                $response = array('error' => $updateCategory->getLastError());
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