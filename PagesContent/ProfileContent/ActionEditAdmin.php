<?php 
session_start();
include_once "../../Database/Connection.php";
include_once "../../Database/InputValidationClass.php";
include_once "../../Database/CommonValidationClass.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //set the input validation class
    $inputValidation = new InputValidationClass();
    //validate and sanitize from data
    $last_name = $inputValidation->test_input($_POST['last_name'], 'name');
    $first_name = $inputValidation->test_input($_POST['first_name'], 'name');
    $user_middle_initial = $inputValidation->test_input($_POST["user_middle_initial"], 'middle_initial');//possible No validation for select
    $gender = $inputValidation->test_input($_POST["gender"], 'name'); //possible No validation for select
    $phone_num = $inputValidation->test_input($_POST["phone_num"], 'phone');
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $username = $inputValidation->test_input($_POST['username'], 'name');
    $pasword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $errors = array();
        if ($last_name === false) {
            $errors[] = "Invalid characters in Last Name.";
        }
        if ($first_name === false) {
            $errors[] = "Invalid characters in First Name.";
        }
        if($user_middle_initial === false){
            $errors[] = "Invalid characters in Middle Initial.";
        }
        if($gender === false){
            $errors[] = "Invalid characters in Gender.";
        }
        if ($phone_num === false) {
            $errors[] = "Invalid characters in Phone.";
        }
        if ($email === false) {
            $errors[] = "Invalid email format.";
        }

        //check for empty fields
        if (!empty($errors)) {
            echo json_encode($errors);

            //start adding if no error catched
        }else if($pasword === $confirmPassword){
            $response = array('error' => 'Password does not match!');
            echo json_encode($response);
        }else{
            //tables
            $table = "tbl_user_info";
            

            // get id
            $id = $_SESSION['id'];

            $values = array(
                'last_name' =>trim($_POST['last_name']),
                'first_name' => trim($_POST['first_name']),
                'middle_name' => $_POST['user_middle_initial'],
                'gender' => $_POST['gender'],
            );
            $contact = array(
                'contact_num' => $_POST['phone_num'],
                'email' => $_POST['email'],
            );

            $credential = array(
                'uname' => $_POST['username'],
                'pass' => $_POST['password']
            );
            
            //set validation class
            $validate = new CommonValidationClass();
            $data = array($values['first_name'], $values['last_name']);
            $column = array('first_name', 'last_name');
            $isValid = $validate -> updatevalidateColumns($table, $column, $data);

            if($isValid ){
                $sql = "UPDATE $table SET last_name = ?, first_name = ?, middle_name = ?, gender = ? WHERE user_info_id = '$id'";
                $params = array_values($values);
                $updateUser = new SanitizeCrudClass();
                $updateUser->executePreState($sql, $params);

                if($updateUser->getLastError() === null){
                    $table_contact = "tbl_contact_info";
                    $sql = "UPDATE $table_contact SET contact_num = ?, email = ? WHERE user_info_id = '$id'";
                    $params = array_values($contact);
                    $updateContact = new SanitizeCrudClass();
                    $updateContact->executePreState($sql, $params);

                    // check if updating basic data is successfull
                    if($updateContact->getLastError() === null){
                        $table_creds = "tbl_credentials";
                        $sql = "UPDATE $table_creds SET uname = ?, pass = ? WHERE user_info_id = '$id'";
                        $params = array_values($credential);
                        $updateCred = new SanitizeCrudClass();
                        $updateCred->executePreState($sql, $params);

                        // check if adding contact info is successfull
                        if($updateCred->getLastError() === null){
                            $response = array('success' => 'Error Successfully edited Admin Data');
                            echo json_encode($response);
                            
                        }else{
                            $response = array('error' => 'Error adding user credentials');
                            echo json_encode($response);
                        }

                    }else{
                        $response = array('error'=> 'Error on adding user contact info');
                        echo json_encode($response);
                    }
                }else{
                    $response = array('error'=> 'Error on adding user basic info');
                    echo json_encode($response);
                }
                
            }else{
                $response = array('error'=> 'duplicate for First Name and Last Name');
                echo json_encode($response);
            }
        }

}else{
    $response = array('error'=> 'POST ISSUE');
    echo json_encode($response);
}
?>