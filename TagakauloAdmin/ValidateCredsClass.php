<?php 
include_once("Database/Connection.php");

class ValidateCredsClass extends Connection{
    public $message = "";


    function checkCreds($username,$password){
        $table = "view_userinfo_creds";
        $sql = "SELECT * FROM $table  WHERE uname = '$username' AND pass = '$password' AND user_level_id = 0 AND status_id = 1;";

        $result = $this->conn->query($sql);
        if ($result && mysqli_num_rows($result) > 0){
           
            while($row = $result->fetch_assoc()){
                $_SESSION['name'] =  $row['name'];
                $_SESSION['id'] = $row['user_info_id'];
                
            }
        }
        else{
            echo '<script>alert("Invalid username or password");</script>';
            header("Location: index.php");
            exit();
        }
    }
}
?>