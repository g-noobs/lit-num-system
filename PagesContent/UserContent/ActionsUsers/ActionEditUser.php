<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $values = array(
        'user_info_id' => $_POST['userId'],
        'personal_id' => '',
        'first_name' => $_POST['edit_first_name'],
        'last_name' =>$_POST['edit_last_name'],
        'gender' => $_POST['edit_gender'],
        'birthdate' => $_POST['edit_date'],
        'status_id' => '1',
        'user_level_id' => ''
    );
    if ($_POST['edit_user_option']=== "Admin") {
        $values['user_level_id'] = '0';
        $values['personal_id']= $values['user_info_id'];

    } else if ($_POST['edit_user_option'] === "Teacher") {
        $values['user_level_id'] = '1';
        $values['personal_id']= $_POST['edit_personal_id'];
    } else if ($_POST['edit_user_option']=== "Learner") {
        $values['user_level_id'] = '2';
        $values['personal_id']= $_POST['edit_personal_id'];
    }

    //validate data
    $table = "tbl_user_info";
    include_once "../../../Database/CommonValidationClass.php";
    $isValid = new CommonValidationClass();
    $data = array($values['first_name'],$values['last_name']);
    $column = array('first_name','last_name');

    $notDuplicate = $isValid -> updateValidateColumns($table, $column, $data, $values['user_info_id']);
    $notIdDuplicate = $isValid -> updateValidateOneColumn($table, 'personal_id', $values['personal_id'], $values['user_info_id']);
    
    if($notDuplicate && $notIdDuplicate){

        // Build the SET part of the UPDATE query
        $setClause = implode(", ", array_map(function ($column, $value) {
            return "$column = ?";
        }, array_keys($values), $values));

        // Build the WHERE condition
        $whereCondition = "user_info_id= ?";

        // Combine the SET and WHERE clauses to create the UPDATE query
        $sql = "UPDATE $table SET $setClause WHERE $whereCondition";

        // Prepare the parameters for binding
        $params = array_merge(array_values($values), [$values['user_info_id']]);

        try{
            include_once("../../../Database/SanitizeCrudClass.php");
            $updateUser = new SanitizeCrudClass();
            $updateUser->executePreState($sql, $params);
            
            // Send the response back to the front-end if no error on $updateUser
            if ($updateUser) {
                $response = array("success" => "Successfully updated user!");
                echo json_encode($response);
            }
            else{
                $response = array("error" => "Error updating user!");
                echo json_encode($response);
            }
        }
        catch(Exception $e){
            if ($e->getCode() == 1062) {
                // Duplicate entry
              $response = array("error" => "Data has existed. Please try again");
              echo json_encode($response);
          
              } else {
                // Some other error
                $response = array("error" => $e);
                echo json_encode($response);
                throw $e;
                
              }
        }
    }
    else{
        if (!$notDuplicate) {
            $response = array("error" => "Duplicate in columns detected");
            echo json_encode($response);    
        }
        if (!$notIdDuplicate) {
            $response = array("error" => "Duplicate in personal_id detected");
            echo json_encode($response);
        }
        $response = array("error" => " Data already exists. Please try again");
        echo json_encode($response);
    }
} 
?>