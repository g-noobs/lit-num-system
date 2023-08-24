<?php 
include_once("Connection.php");
class LessonDisplayClass extends Connection{
    function __construct(){
        parent :: __construct();
    }


    function displayCategoryList(){
        $sql = "SELECT 	category_id , category_name  FROM tbl_category WHERE category_status = 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['category_id']}'>";
                echo $row['category_name'];
                echo "</option>";
            }
        }
    }

    function lessonTable($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $counter = 1;
                echo "<tr>";
                echo "<td><a href='#' class='edit' data-toggle='modal' data-toggle='tooltip' title='Edit Lesson' data-target='#edit-user' data-id='" . $row["lesson_id"] . "'><span class='glyphicon glyphicon-edit'></span></a></td>";
                
   
                echo "<td>" . $row["lesson_id"] . "</td>";
                echo "<td>" . $row["lesson_name"] . "</td>";
                echo "<td>" . $row["category_name"] . "</td>";
                
                echo "<td><a href='#' type='button' class='viewBtn' data-id='" . $row["lesson_id"] . "'>View</a></td>";
                echo "<td><a href='#' type='button' class='addBtn' data-id='" . $row["lesson_id"] . "'>Add</a></td>";
                echo "<td><a href='#' type='button' class='archive'  data-id='" . $row["lesson_id"] . "'>Archive</a></td>";
                
                echo "</tr>";
            }
        }
        
    }
}
?>