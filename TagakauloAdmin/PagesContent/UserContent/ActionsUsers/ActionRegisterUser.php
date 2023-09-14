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
    'added_byID'=>''
);

if ($_POST['user']=== "Admin") {
    $values['user_level_id'] = '0';
    $username = $values['email'];
} else if ($_POST['user'] === "Teacher") {
    $values['user_level_id'] = '1';
    $username = $values['personal_id'];
} else if ($_POST['user']=== "Learner") {
    $values['user_level_id'] = '2';
    $username = $values['personal_id'];
}
$table = "tbl_user_info";
include_once("../../../Database/ColumnCountClass.php");
$columnCountClass = new ColumnCountClass();

// modify user id plus the column count
$values['user_info_id'] = "USR".(100001 + $columnCountClass->columnCount("user_info_Id",$table));

//place value for id
$values['added_byID']= $_SESSION['id'];

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
$isValid = $validate -> validateColumns($table, $column, $data);


if($isValid) {
    $columns = implode(', ', array_keys($values));
    $sql = "INSERT INTO $table ($columns)
            VALUES(?,?,?,?,?,?,?,?,?,?);";
    $params = array_values($values);

    include_once "../../../Database/SanitizeCrudClass.php";
    $addNewUser = new SanitizeCrudClass();
    
    try{
        $addNewUser->executePreState($sql, $params);
        if($addNewUser->getLastError() === null){
            $table = "tbl_credentials";
            $credsColumns = 
            $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) 
            VALUES(?,?,?,?)";
            $params = array($credentials_id, $username, $password, $user_info_id);
            include_once "../../../Database/SanitizeCrudClass.php";
            $addNewCreds = new SanitizeCrudClass();
            $addNewCreds->executePreparedStatement($query, $params, "../../../pages/user.php");
        }
    }
    catch(mysqli_sql_exception $e){
        if ($e->getCode() == 1062){
          //show both data content without using loop
          $message = $data." Already exists. Please try again";  
          header('Location: ../../../pages/user.php?msg='.urlencode($message));
          exit();
        }
        else{
            throw $e;
        }
    }
}
else{
    $message = $data." Already exists. Please try again";  
    header('Location: ../../../pages/user.php?msg='.urlencode($message));
    exit();
}
?>

