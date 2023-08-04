<?php 
include_once("Connection.php");
class LessonCheckboxClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function teacherChecbox($sql){
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
}
?>