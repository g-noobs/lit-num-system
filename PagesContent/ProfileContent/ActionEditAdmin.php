<?php 
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
            
        }

}else{
    $response = array('error'=> 'POST ISSUE');
}
?>