<?php 
session_start();
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
//Password generation
include_once("../../../CommonPHPClass/PHPClass.php");
//insert validation
include_once "../../../Database/CommonValidationClass.php";
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['personal_id']) || isset($_POST['last_name']) || isset($_POST['first_name']) || isset($_POST['phone_num']) || isset($_POST['email']) || isset($_POST['street_address'])){
        $values = array(
            'user_info_id'=>'',
            'first_name' => trim($_POST['first_name']),
            'last_name' =>trim($_POST['last_name']),
            'gender' => $_POST['gender'],
            'status_id' => '1',
            'user_level_id' => '2',
            'added_byID'=>'',
            'date_added' => ''
        );
        $table = "tbl_user_info";
                //adding data for user_info_id
                $columnCountClass = new ColumnCountClass();
                $values['user_info_id'] = "USR". $columnCountClass->columnCountWhere("user_info_id",$table);

                //adding data for added_byID
                $values['added_byID']= $_SESSION['id'];

                //adding data for date_added
                $currentDate = new DateTime();
                $values['date_added'] = $currentDate->format('Y-m-d H:i:s');

                 //setting validation class
                $validate = new CommonValidationClass();
                $data = array($values['first_name'], $values['last_name']);
                $column = array('first_name', 'last_name');
                $isValid = $validate -> validateColumns($table, $column, $data);
    }else{
        $response = array('error' => 'One or more fields are empty');
        echo json_encode($response);
    }
}else{
    $response = array('error' => 'POSSIBLE POST ISSUE');
    echo json_encode($response);
}

?>