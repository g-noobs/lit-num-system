<?php 
include_once("Connection.php");
class Credentials extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function userCreds($username, $password) {
    
        // Prepare the SQL statement
        $sql = "CREATE USER '{$username}'@'localhost' IDENTIFIED BY '{$password}'";
        
        $result = $this->conn->query($sql);
        
        // Execute the statement
        if ($result === true) {
            echo "User created successfully.";
        } else {
            echo "Failed to create user: " . $result->error;
        }
    
        // Close the connection
        $this->conn->close();
    }

}
?>