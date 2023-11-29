<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
//Password generation
include_once("../../../CommonPHPClass/PHPClass.php");
//insert validation
include_once "../../../Database/CommonValidationClass.php";
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";
//input validation class
include_once "../../../CommonPHPClass/InputValidationClass.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputValidation = new InputValidationClass();
    // Validate and sanitize form data
    $teacher_id = $inputValidation->test_input($_POST["personal_id"], 'address');
    $last_name = $inputValidation->test_input($_POST["last_name"], 'name');
    $first_name = $inputValidation->test_input($_POST["first_name"], 'name');
    $user_middle_initial = $inputValidation->test_input($_POST["user_middle_initial"], 'middle_initial');//possible No validation for select
    $gender = $inputValidation->test_input($_POST["gender"], 'name'); //possible No validation for select
    $phone_num = $inputValidation->test_input($_POST["phone_num"], 'phone');

    $street_address = $inputValidation->test_input($_POST["street_address"], 'address');
    $barangay_address = $inputValidation->test_input($_POST["barangay_address"], 'address');
    $city_address = $inputValidation->test_input($_POST["city_address"], 'address');
    $province_address = $inputValidation->test_input($_POST["province_address"], 'address');
    $zip_code = $inputValidation->test_input($_POST["zip_code"], 'number');
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    //check for validation errors
    $errors = array();
    if($teacher_id === false){
        $errors[] = "Invalid characters in Teacher ID.";
    }
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
    if($street_address === false){
        $errors[] = "Invalid characters in Street Address.";

    }
    if($barangay_address === false){
        $errors[] = "Invalid characters in Barangay Address.";

    }
    if($city_address === false){
        $errors[] = "Invalid characters in City Address.";

    }
    if($province_address === false){
        $errors[] = "Invalid characters in Province Address.";

    }
    if($zip_code === false){
        $errors[] = "Invalid characters in Zip Code.";
    }
    //check for empty fields
    if (!empty($errors)) {
        echo json_encode($errors);

        //start Editing if no error catched
    }else{
        $values = array(
            'personal_id' => trim($_POST['personal_id']),
            'first_name' => trim($_POST['first_name']),
            'last_name' =>trim($_POST['last_name']),
            //have the middle_initial intp uppercase
            'middle_name' => strtoupper($_POST['user_middle_initial']),
            'gender' => $_POST['gender'],
            'user_info_id' => $_POST['id']
        );
        $table = "tbl_user_info";
         //setting validation class
        $validate = new CommonValidationClass();
        $data = array($values['first_name'], $values['last_name']);
        $column = array('first_name', 'last_name');
        $isValid = $validate -> updatevalidateColumns($table, $column, $data, $values['user_info_id']);
        $isIdvalid = $validate -> updateValidateOneColumn($table, 'personal_id', $values['personal_id'], $values['user_info_id']);
    
        if($isIdvalid && $isValid){
            $sql = "UPDATE tbl_user_info 
            SET personal_id = ?,
                first_name = ?,
                last_name = ?,
                middle_name = ?,
                gender = ?
            WHERE user_info_id = ?";
            $params = array_values($values);
            $updateTeacherData = new SanitizeCrudClass();
            try{
                $updateTeacherData -> executePreState($sql, $params);
                //!if Editing user is correct then procced with editing contact
                if($updateTeacherData->getLastError() === null){
                    $table = 'tbl_contact_info';
                    $contact = array(
                        'contact_num'=> $_POST['phone_num'],
                        'email'=> $_POST['email'],
                        'street'=> $_POST['street_address'],
                        'barangay'=> $_POST['barangay_address'],
                        'municipal_city'=> $_POST['city_address'],
                        'province'=> $_POST['province_address'],
                        'postalcode'=>$_POST['zip_code'],
                        'user_info_id' => $_POST['id']
                    );
                    $sql = "UPDATE $table 
                    SET 
                        contact_num = ?,
                        email = ?,
                        street = ?,
                        barangay = ?,
                        municipal_city = ?,
                        province = ?,
                        postalcode = ?
                    WHERE user_info_id = ?";

                    $params = array_values($contact);
                    //set sanitize class
                    $updateContact = new SanitizeCrudClass();
                    $updateContact->executePreState($sql, $params);
                    
                    if($updateContact->getLastError()=== null){
                        $table = "tbl_teacher";
                        $teacher = array(
                            'teacher_personal_id' => $values['personal_id'],
                            'user_info_id' => $values['user_info_id']
                        );
                        
                        
                        //set sql
                        $sql = "UPDATE $table 
                        SET teacher_personal_id = ?
                        WHERE user_info_id = ?";
                        // set parameters
                        $params = array_values($teacher);
                        //set sanitize class
                        $updateTeacherPersonalData = new SanitizeCrudClass();
                        $updateTeacherPersonalData->executePreState($sql, $params);
                        
                        if($updateTeacherPersonalData->getLastError()=== null){
                            $table = 'tbl_credentials';
                            $credential = array(
                                'uname' => trim($_POST['personal_id']),
                                'user_info_id' => $values['user_info_id']
                            );
                            $sql = "UPDATE $table 
                            SET uname = ? 
                            WHERE user_info_id = ?";
                            $params = array_values($credential);
                            $updateCreds = new SanitizeCrudClass();
                            $updateCreds->executePreState($sql, $params);

                            if($updateCreds->getLastError() === null){
                                $response = array('success' => "Successfully updated Teacher Data");
                                echo json_encode($response);
                                exit();
                            }else{
                                $response = array('error => Error on updating username');
                                echo json_encode($response);
                                exit();
                            }
                        }else{
                            $response = array('error' => "Error updating on teacher table");
                            echo json_encode($response);
                            exit();
                        }
                    }else{
                        $response = array('error' => "Error Editing on contact table");
                        echo json_encode($response);
                        exit();
                    }
                }else{
                    $response = array('error' => "Error Editing on credentials table");
                    echo json_encode($response);
                    exit();
                }
            }catch(mysqli_sql_exception $e){
                $response = array('error' => $e->getMessage());
                echo json_encode($response);
                exit();
            
            }catch(Exception $e){
                $response =array('error' => $e->getMessage());
                echo json_encode($response);
                exit();
            }
        }else{
            $response = array('error' => 'Teacher or name has Duplicate for user: '.$values['user_info_id']);
            echo json_encode($response);
            exit();
        }
    }
    //end of else

}else{
    $response = array('error' => 'Possible POST ISSUE');
    echo json_encode($response);
    exit();
}
?>