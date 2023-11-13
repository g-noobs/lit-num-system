<?php 
include_once "Connection.php";

class DisplaySubject extends Connection{
    function __construct(){
        parent :: __construct();
    }

    function displaySubjectList(){
        $sql = "SELECT * FROM tbl_module WHERE module_status = 1;";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["module_status"] == 1){
                    $status = "<b><span class='text-success'>Active</b></span>";
                }
                else{
                    $status = "<b><span class='text-danger'>Inactive</b></span>";
                }
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkbox' name='selected[]' value='" . $row['module_id'] . "'></td>";
                echo "<td><a href='#' type='button' id='editBtn-".$row['module_id']."' data-toggle='modal' data-target='#editSubjModal' style='margin-right:10px; color: blue;'><span class='glyphicon glyphicon-edit' ></span></a></td>";
                echo "<td>".$row["module_id"]."</td>";
                echo "<td>".$row["module_name"]."</td>";
                echo "<td>".$row["module_description"]."</td>";
                echo "<td><b>".$status."</b></td>";

                
                echo "</tr>";
            }
        }
    }
    function archivedSubj(){
        $sql = "SELECT * FROM tbl_module WHERE module_status = 0;";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["module_status"] == 1){
                    $status = "<b><span class='text-success'>Active</b></span>";
                }
                else{
                    $status = "<b><span class='text-danger'>Inactive</b></span>";
                }
                echo "<tr>";

                echo "<td><input type='checkbox' class='checkbox' name='selected[]' value='" . $row['module_id'] . "'></td>";

                echo "<td>".$row["module_id"]."</td>";
                echo "<td>".$row["module_name"]."</td>";
                echo "<td>".$row["module_description"]."</td>";
                echo "<td><b>".$status."</b></td>";
                
                echo "</tr>";
            }
        }
    }
}
?>