<?php 
include_once("Connection.php");
class LessonCheckboxClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function teacherChecbox(){
        $sql = "SELECT user_info_id, first_name, last_name FROM user_info_view WHERE user_level_description='Teacher' AND status='Active';";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)) {
                $id = $row['user_info_id'];
                $name = $row['first_name'] ." ". $row['last_name'];
                
                echo '<div class="checkbox">';
                // Display checkbox
                echo '<input type="checkbox" name="categories[]" value="' . $id . '"> ' . $name . '<br>';

                echo '</div>';
                }
        }
    }
    function classCheckbox(){
        $sql = "SELECT class_id, class_name FROM tbl_class WHERE class_status=1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)) {
                $id = $row['class_id'];
                $name = $row['class_name'];
                
                echo '<div class="class_checkbox">';
                // Display checkbox
                echo '<input type="checkbox" name="class_check[]" value="' . $id . '"> ' . $name . '<br>';

                echo '</div>';
                }
        }

    }
}
?>