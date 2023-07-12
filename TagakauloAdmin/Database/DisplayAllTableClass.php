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

                echo "<td><a href='#'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";
                echo "</td>";

                if ($row["status"] === "Active") {
                    $statusColor = "text-success";
                    $iconColor = "text-danger";
                    $actionIcon = "<span class='glyphicon glyphicon-trash'></span>";
                    $data_target = "#archive-user";
                } else {
                    $statusColor = "text-danger";
                    $iconColor = "text-success";
                    $actionIcon = "<span class='glyphicon glyphicon-ok'></span>";
                    $data_target = "#activate-user";
                }

                echo "<td>" . $row["user_info_id"] . "</td><td>" . $row["name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";
                
                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#edit-user' data-id='" . $row["user_info_id"] . "' style='margin-right:10px';><span class='glyphicon glyphicon-edit'></span></a>";
                
                echo " <a href='#' class='action ".$iconColor."' data-toggle='modal' data-target='".$data_target."' data-id='" . $row["user_info_id"] . "'> ".$actionIcon ."</a>";
                echo "</td>";

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