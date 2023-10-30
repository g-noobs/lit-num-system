<?php 
session_start();
$values = array(
    'user_info_id'=>'',
    'personal_id' =>$_POST['personal_id'],
    'first_name' => trim($_POST['first_name']),
    'last_name' =>trim($_POST['last_name']),
    'gender' => $_POST['gender'],
    'email' => $_POST['email'],
    'birthdate' => $_POST['date'],
    'status_id' => '1',
    'user_level_id' => '',
    'added_byID'=>'',
    'date_added' => ''
);


$table = "tbl_user_info";
include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

// modify user id plus the column count
$values['user_info_id'] = "USR". $columnCountClass->columnCountWhere("user_info_id",$table);

if ($_POST['user']=== "Admin") {
    // Set personal-id same with user_info_id
    $values['personal_id']= $values['user_info_id'];
    $values['user_level_id'] = '0';
    $username = $values['email'];
} else if ($_POST['user'] === "Teacher") {
    $values['user_level_id'] = '1';
    $username = $values['personal_id'];
} else if ($_POST['user']=== "Learner") {
    $values['user_level_id'] = '2';
    $username = $values['personal_id'];
}

//place id for added_byID
$values['added_byID']= $_SESSION['id'];

//add date added
$currentDate = new DateTime();
$values['date_added'] = $currentDate->format('Y-m-d H:i:s');


//Password generation
include_once("../../../CommonPHPClass/PHPClass.php");
$phpClass = new PHPClass();
$credentials_id = "CRED".(100001 + (int)$columnCountClass->columnCount("credentials_id","tbl_credentials"));
$password = $phpClass->generatePassword(10);
$user_info_id = $values['user_info_id'];

//insert validation
include_once "../../../Database/CommonValidationClass.php";
$validate = new CommonValidationClass();
$data = array($values['first_name'], $values['last_name']);
$column = array('first_name', 'last_name');

$isIdvalid = $validate -> validateOneColumn($table, 'personal_id', $values['personal_id']);


if($isIdvalid) {
    $columns = implode(', ', array_keys($values));
    $questionMarkString = implode(',', array_fill(0, count($values), '?'));
    $sql = "INSERT INTO $table ($columns)
            VALUES($questionMarkString);";
    $params = array_values($values);

    include_once "../../../Database/SanitizeCrudClass.php";
    $addNewUser = new SanitizeCrudClass();
    
    try{
        $addNewUser->executePreState($sql, $params);
        if($addNewUser->getLastError() === null){
            $table = "tbl_credentials";
            
            $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) 
            VALUES(?,?,?,?);";
            $params = array($credentials_id, $username, $password, $user_info_id);
            include_once "../../../Database/SanitizeCrudClass.php";
            $addNewCreds = new SanitizeCrudClass();
            $addNewCreds->executePreState($query, $params);

            $response = array('success' => 'Successfully added new user!');
            echo json_encode($response);
        }
    }
    catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062){
          //Duplicate entry
            $response = array('error' => $data." already exists. Please try again");
            echo json_encode($response);
        }
        else{
            $response = array('error' => $e);
            echo json_encode($response);
            throw $e;
        }
    }
}
else{
    $response = array('error' => 'User already exists.');
    echo json_encode($response);  
}
?>

