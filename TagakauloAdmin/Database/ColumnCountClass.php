<?php 
include_once "Connection.php";
class ColumnCountClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function userCount($table){
        $sql = "SELECT COUNT(user_info_Id) as count FROM $table";  // Replace with your table name
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Fetch the count value
            $row = $result->fetch_assoc();
            $count = $row["count"];
            
            echo $count;
        } else {
            echo "No rows found";
        }
    }
}
?>