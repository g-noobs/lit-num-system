<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $values = array(
        'user_info_Id' => $_POST['userId'],
        'personal_id' =>$_POST['personal_id'],
        'first_name' => $_POST['first_name'],
        'last_name' =>$_POST['last_name'],
        'gender' => $_POST['gender'],
        'birthdate' => $_POST['date'],
        'status_id' => '1',
        'user_level_id' => ''
    );
    if ($_POST['user']=== "Admin") {
        $values['user_level_id'] = '0';
    } else if ($_POST['user'] === "Teacher") {
        $values['user_level_id'] = '1';
    } else if ($_POST['user']=== "Learner") {
        $values['user_level_id'] = '2';
    }

    //validate data
    $table = "tbl_user_info";
    include_once "../../../Database/CommonValidationClass.php";
    $isValid = new CommonValidationClass();
    $data = array($values['first_name'],$values['last_name']);
    $column = array('first_name','last_name');
    $isDuplicate = $isValid -> validateColumns($table, $column, $data);
    
    if($isDuplicate){

    }
    $columns = implode(", ", array_keys($values));
    $placeholders = "'" . implode("', '", array_values($values)) . "'";

    $sql = "UPDATE $table SET ";

    foreach ($values as $column => $value) {
        $sql .= "$column = '$value', ";
    }

    $sql = rtrim($sql, ", "); // Remove the trailing comma and space
    $sql .= " WHERE user_info_Id = '{$values['user_info_Id']}';";

    $table = "tbl_credentials";
    $sql .= "UPDATE $table SET uname = '{$values['personal_id']}' WHERE user_info_Id = '{$values['user_info_Id']}';";

    //still follow the usual tracing of php class
    include_once("../../../Database/AddDeleteClass.php");
    $addData = new AddDeleteClass();
}
?>