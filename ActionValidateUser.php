<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your validation logic here
    $errors = array();

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required";
        header("Location: index.php");
        exit();
    }
    else{
        $message = 'Empy Username'; 
        // Pass message as GET parameter
        header('Location: index.php?msg=' . urlencode($message));
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
        header("Location: index.php");
        exit();

    }
    else{
        $message = 'Empy Password'; 
        // Pass message as GET parameter
        header('Location: index.php?msg=' . urlencode($message));
    }
    
    // If there are no errors, compare the username and password with the database
    if (empty($errors)) {
        include_once("ValidateCredsClass.php");
        $_SESSION['loggedin'] = true;
        $validate = new ValidateCredsClass();
        $validate ->checkCreds($username, $password);
        header("Location: pages/dashboard.php");
        exit();
    }
    $message = 'Unable to Validate'; 
        // Pass message as GET parameter
    header('Location: index.php?msg=' . urlencode($message));
}
else{
    $message = 'POST ISSUE'; 
        // Pass message as GET parameter
    header('Location: index.php?msg=' . urlencode($message));
}

?>