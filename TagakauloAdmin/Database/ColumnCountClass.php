<?php 
include_once "Connection.php";
class ColumnCountClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function userCount($col,$table){
        $sql = "SELECT COUNT($col) as count FROM $table";  // Replace with your table name
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Fetch the count value
            $row = $result->fetch_assoc();
            $count = $row["count"];
            
            return $count;
        } else {
            return 0;
        }
    }
}
?>