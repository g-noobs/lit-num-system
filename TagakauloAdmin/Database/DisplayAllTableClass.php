<?php 
include_once("Connection.php");
class DisplayAllTableClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }
    
    function userTable($sql){
        
        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";

                echo "<td><a href='#' class='edit' data-toggle='modal' data-target='#edit-user' data-id='" . $row["user_info_id"] . "'><span class='glyphicon glyphicon-edit'></span></a></td>";

                echo "<td>" . $row["user_info_id"] . "</td><td>" . $row["name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["email"] . "</td><td>" . $row["birthdate"] . "</td><td>" . $row["user_level_description"]. "</td><td>" . $row["status"] ."</td>";
             //  echo "<td>" . $row["status_id"]."</td>";
                
                echo "</tr>";
            }
        }
    }

    function lessonTable($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td><a href='#' class='edit' data-toggle='modal' data-target='#edit-user' data-id='" . $row["lesson_id"] . "'><span class='glyphicon glyphicon-edit'></span></a></td>";
                echo "<td>".$row["lesson_id"]. "</td>";
                echo "<td>".$row["lesson_name"]. "</td>";
                echo "<td>".$row["objective_id"]. "</td>";
                echo "<td>".$row["topic_id"]. "</td>";
                echo "<td>".$row["addedby_ID"]. "</td>";
                echo "<td>".$row["date_added"]. "</td>";
                echo "</tr>";
            }
        }
        
    }
}
?>