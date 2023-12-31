<?php 
include_once("Connection.php");
class ClassEssentialsClass extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function classTable($sql){
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                if($row['class_status'] == 1){
                    $status = '<p class="text-success">Active</p>';
                }
                else{
                    $status = '<p class="text-danger">Inactive</p>';
                }
                echo "<tr>";
                
                echo "<td style='white-space: nowrap;'>";
                echo "<a href='#' class='edit text-primary' data-toggle='modal' data-target='#edit-class'><span class='glyphicon glyphicon-edit'></span></a>";
                echo "</td>";
                
                echo "<td>".$row['class_id']."</td>";
                echo "<td>".$row['class_name']."</td>";
                echo "<td><b>".$status."</b></td>";

                echo "<td>";
                echo " <a href='#' class='archive text-danger' data-toggle='modal' data-target='#archive-class'> <span class='glyphicon glyphicon-trash'></span></a>";
                echo "</td>";
                
                echo "</tr>";
            }
        }
    }

    function teacherSelect(){
        $sql = "SELECT user_info_id, first_name, last_name FROM tbl_user_info WHERE status_id = 1 AND user_level_id = 1;";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['user_info_id']}'>";
                echo $row['first_name']." ". $row['last_name'];
                echo "</option>";
            }
        }
    }

    function areaSelect(){
        $sql = "SELECT area_id, area_name FROM tbl_area WHERE status_id = 1";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['area_id']}'>";
                echo $row['area_name'];
                echo "</option>";
            }
        }

    }
}
?>