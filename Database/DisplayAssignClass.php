<?php 
include_once "Connection.php";
class DisplayAssignClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function displayClassList(){
        $sql = "SELECT class_id, class_name FROM tbl_class WHERE class_status = 1 AND 
            NOT EXISTS 
            ( SELECT 1 FROM tbl_teacher_class_assignment WHERE tbl_teacher_class_assignment.class_id = tbl_class.class_id );";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['class_id']}'>";
                echo $row['class_name'];
                echo "</option>";
            }
        }
    }

    function displayModuleList(){
        $sql = "SELECT module_id, module_name FROM tbl_module WHERE module_status = 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['module_id']}'>";
                echo $row['module_name'];
                echo "</option>";
            }
        }
    }
}
?>