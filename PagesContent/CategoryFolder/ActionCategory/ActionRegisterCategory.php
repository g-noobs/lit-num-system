<?php 
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
//Columncount for modified class_id
include_once("../../../Database/ColumnCountClass.php");
//validation to prevent duplicate for class name
include_once("../../../Database/CommonValidationClass.php");
//Sanitize or parameterized query for insert
include_once("../../../Database/SanitizeCrudClass.php");

//character validation
include_once("../../../CommonPHPClass/InputValidationClass.php");

$inputValidation = new InputValidationClass();
$category_name = $inputValidation->test_input($_POST['category_name'], 'address');
$category_description = $inputValidation->test_input($_POST['category_description'], 'address');

$errors = array();
if($category_name === false){
    $errors[] = "Invalid Character in Category Name";
}

if($category_description === false){
    $errors[] = "Invalid Character in Category Description";
}

if(!empty($errors)){
    echo json_encode($errors);
    exit();
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){


    }else{
        $response = array('error' => 'POSSIBLE POST ERROR!');
        echo json_encode($response);
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['category_name']) AND !empty($_POST['category_description'])){
        $values = array(
            'category_id' => '',
            'category_name' => $_POST['category_name'],
            'category_info' => $_POST['category_description'],
            'addedby_ID' => '',
            'date_added' => '',
        );
        $table = 'tbl_category';
        $columnCount = new ColumnCountClass();
        $values['class_id'] = 'CTG' . $columnCount->columnCountWhere('category_id',$table);

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $currentDate = new DateTime();
        $values['date_added'] = $currentDate->format('Y-m-d H:i:s');
        
    }else{
        $response = array('error' => 'Please fill up all fields!');
        echo json_encode($response);
        exit();
    }

}else{
    $response = array('error' => 'POSSIBLE POST ERROR!');
    echo json_encode($response);
    exit();
}




$added_byID = $_SESSION['id'];
$table = 'tbl_category';

$values['addedby_ID'] = $added_byID;

include_once("../../../Database/ColumnCountClass.php");
$columnCount = new ColumnCountClass();
$newCount = "CTG".(101 + $columnCount ->columnCount("category_id", $table));
$values['category_id'] = $newCount;




include_once("../../../CommonPHPClass/PHPClass.php");
$date = new PHPClass();
$currentDate = $date->getFormattedCurrentDate();



$query = "INSERT INTO $table (category_id, category_name, category_info, addedby_ID, date_added, category_status) VALUES (?, ?, ?, ?, ?, ?);";
$params =array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");
$addNewData = new SanitizeCrudClass();
$addNewData->executePreparedStatement($query, $params, "../../../pages/category.php")
?>