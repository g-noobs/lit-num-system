<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Make sure username is not empty
    if (empty($username)) {
        $response = array("error" => "Username is required!");
        echo json_encode($response);
    }
    // Make sure that password is not empty
    if (empty($password)) {
        $response = array("error" => "Password is required!");
        echo json_encode($response);
    }
    
    // If there are no errors, compare the username and password with the database
    if (empty($errors)) {
        include_once("ValidateCredsClass.php");
        $_SESSION['loggedin'] = true;
        $validate = new ValidateCredsClass();
        
        try{
            $validate ->checkCreds($username, $password);
            $response = array("message" => "Auth Success");
            echo json_encode($response);
        }
        catch(Exception $e){
            $response = array("error" => "Exception Error: ".$e);
            echo json_encode($response);
        }
    }
}

else{
    $response = array("error" => "Invalid request Method");
    echo json_encode($response);
}
?>