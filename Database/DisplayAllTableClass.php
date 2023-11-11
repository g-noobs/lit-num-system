<?php 
include_once("Connection.php");
class DisplayAllTableClass extends Connection{
    public $conn; 
    function __construct(){
        parent :: __construct();
    }
    
    function userTable($sql){
        $result = $this->getConnection()->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row["user_level_description"] === "Admin"){
                    $username = $row['email'];
                    $password = str_repeat("*", strlen($row["pass"]));
                    $modalTarget = "";
                    $editColor = "gray";
                    $data_target = "";
                    $iconColor = "gray";
                }
                else{
                    $username = $row["personal_id"];
                    $password = $row["password"];
                    $modalTarget = "#edit-user";
                    $editColor = "blue";
                }
                echo "<tr>";

                echo "<td><a href='#' class='data_info_btn' data-id='".$row["user_info_id"]."' data-toggle='modal' data-target='#user_data_modal'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";
                echo "</td>";

                if ($row["status"] === "Active") {
                    $statusColor = "text-success";
                    $iconColor = "text-danger";
                    $actionIcon = "<span class='glyphicon glyphicon-trash'></span>";
                    $data_target = "#archiveUserModal";
                    $icnBtnClass = "archIconBtn";
                } else {
                    $statusColor = "text-danger";
                    $iconColor = "text-success";
                    $actionIcon = "<span class='glyphicon glyphicon-ok'></span>";
                    $data_target = "#activateUserModal";
                    $icnBtnClass = "actvIconBtn";
                }   

                echo "<td>" . $row["user_info_id"] . "</td><td>".$row["personal_id"]."</td><td>" . $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";

                echo "</tr>";
            }
        }
    }
    function displayStudent($status){
        $sql = "SELECT * FROM user_info_view WHERE user_level_description = 'Learner' AND status = '$status'";
        $result = $this->getConnection()->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if ($row["status"] === "Active") {
                    $statusColor = "text-success";
                    $iconColor = "text-danger";
                    $actionIcon = "<span class='glyphicon glyphicon-trash'></span>";
                    $data_target = "#archiveUserModal";
                    $icnBtnClass = "archIconBtn";
                } else {
                    $statusColor = "text-danger";
                    $iconColor = "text-success";
                    $actionIcon = "<span class='glyphicon glyphicon-ok'></span>";
                    $data_target = "#activateUserModal";
                    $icnBtnClass = "actvIconBtn";
                }   
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkbox' name='selected[]' value='" . $row['user_info_id'] . "'></td>";

                echo "<td><a href='#' class='data_info_btn' data-id='".$row["user_info_id"]."' data-toggle='modal' data-target='#user_data_modal'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";
                echo "</td>";

                echo "<td> <a href='#' class='edit' data-toggle='modal' data-target='#edit-user' data-id='".$row["user_info_id"]."' style='margin-right:10px; color:'blue';'><span class='glyphicon glyphicon-edit' ></span></a> </td>";


                echo "<td>" . $row["user_info_id"] . "</td><td>".$row["personal_id"]."</td><td>" . $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";
                

                echo "</tr>";
            }
        }
    }

    function displayTeacher($status){
        $sql = "SELECT * FROM user_info_view WHERE user_level_description = 'Teacher' AND status = '$status'";
        $result = $this->getConnection()->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                
                echo "<td><input type='checkbox' class='checkbox' name='selected[]' value='" . $row['user_info_id'] . "'></td>";
                echo "<td><a href='#' class='data_info_btn' data-id='".$row["user_info_id"]."' data-toggle='modal' data-target='#user_data_modal'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='#add_user_modal' data-id='".$row["user_info_id"]."' style='margin-right:10px; color:'blue';'><span class='glyphicon glyphicon-edit' ></span></a>";
                echo "</td>";

                if ($row["status"] === "Active") {
                    $statusColor = "text-success";
                } else {
                    $statusColor = "text-danger";
                }   

                echo "<td>" . $row["user_info_id"] . "</td><td>".$row["personal_id"]."</td><td>" . $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";
                
                echo "<td><a href='#' class='assign_class_btn text-success' type='button' data-toggle='tooltip' title='Assign Class' data-id='".$row["user_info_id"]."'><i class='fa fa-plus'></i></a></td>";
                
                echo "<td><a href='#' class='assign_module_btn text-warning' type='button' data-toggle='tooltip' title='Assign Module' data-id='".$row["user_info_id"]."'><i class='fa fa-file-text-o'></i></a></td>";

                echo "</tr>";
            }
        }
    }

    function displayAdmin($status){
        $sql = "SELECT * FROM user_info_view WHERE user_level_description = 'Admin' AND status = '$status'";
        $result = $this->getConnection()->query($sql);
    
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";

                echo "<td><a href='#' class='data_info_btn' data-id='".$row["user_info_id"]."' data-toggle='modal' data-target='#user_data_modal'><span class='glyphicon glyphicon-info-sign' style = 'padding-left: 10px;'></span></a>";
                echo "</td>";

                if ($row["status"] === "Active") {
                    $statusColor = "text-success";     
                } else {
                    $statusColor = "text-danger";
                }   

                echo "<td>" . $row["user_info_id"] . "</td><td>" . $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["gender"]. "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";
                
                // echo "<td>";                
                // echo " <a href='#' class='".$icnBtnClass." ".$iconColor."' data-toggle='modal' data-target='".$data_target."' data-id='".$row["user_info_id"]."'> ".$actionIcon ."</a>";
                // echo "</td>";

                echo "</tr>";
            }
        }
    }
}
?>