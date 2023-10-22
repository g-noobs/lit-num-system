<?php 
include_once("Connection.php");

class ReportsDisplay extends Connection{
    function __construct(){
        parent :: __construct();
    }
    function displayData($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['personal_id']. "</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['first_name']. "</td>";
                echo "<td>".$row['gender']. "</td>";
                echo "<td>".$row['birthdate']. "</td>";
                echo "<td>".$row['date_added']. "</td>";
                echo "</tr>";
            }
        }
    }
}
?>