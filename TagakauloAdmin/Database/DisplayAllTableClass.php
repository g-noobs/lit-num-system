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
                if($row["user_level_description"] === "Admin"){
                    $username = $row['email'];
                    $password = "******";
                    $modalTarget = "";
                    $editColor = "gray";
                }
                else{
                    $username = $row["personal_id"];
                    $password = $row["password"];
                    $modalTarget = "#edit-user";
                    $editColor = "blue";
                }
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

                echo "<td>" . $row["user_info_id"] . "</td><td>".$row["personal_id"]."</td><td>" . $row["first_name"] ."</td><td>". $row["last_name"] ."</td><td>". $row["gender"]. "</td><td>" . $username . "</td><td>" . $password . "</td><td>" . $row["user_level_description"]. "</td><td><b><span class='".$statusColor."'>" . $row["status"] ."</b></span></td>";
                
                echo "<td>";
                echo "<a href='#' class='edit' data-toggle='modal' data-target='".$modalTarget."' data-id='" . $row["user_info_id"] . "' style='margin-right:10px; color:".$editColor.";'><span class='glyphicon glyphicon-edit' ></span></a>";
                
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

    function quizTable($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td><a href='#' class='edit' data-toggle='modal' data-target='#edit-user' data-id=''><span class='glyphicon glyphicon-edit'></span></a></td>";
                echo "<td>".$row["quiz_id"]. "</td>";
                echo "<td>".$row["quiz_question"]. "</td>";
                echo "<td>".$row["quiz_selectionA"]. "</td>";
                echo "<td>".$row["quiz_selectionB"]. "</td>";
                echo "<td>".$row["quiz_selectionC"]. "</td>";
                echo "<td>".$row["quiz_selectionD"]. "</td>";
                echo "<td>".$row["story_id"]. "</td>";
                echo "<td>".$row["writer_id"]. "</td>";
                echo "<td>".$row["score"]. "</td>";
                echo "<td>".$row["date_created"]. "</td>";
                echo "</tr>";
            }
        }
    }

    function displayAdminProfile($sql){
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){



                echo '<div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text"  name="first_name" class="form-control" id="exampleInputEmail1" placeholder="First Name" value="'.$row['first_name'].'">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text"  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Last Name" value="'.$row['last_name'] .'">
                    </div>
                    <div class="form-group">
                        <label for="gender">Select Gender:</label>
                        <select class="form-control" name="gender" value="'.$row['gender'].' placeholder="'.$row['gender'].'">
                            <option>MALE</option>
                            <option>FEMALE</option>
                            <option>None</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email Address:</label>
                        <input type="email"  name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="'.$row['email'].'">
                    </div>
                    <div class="form-group">
                        <label for="date">Select Birthday:</label>
                        <input type="date"  name="date" class="form-control" id="exampleInputPassword1" placeholder="Birthdate" value="'.$row['birthdate'].'">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"  name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="'.$row['username'].'">
                    </div>
                    <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="text"  name="password" class="form-control" id="exampleInputEmail1" placeholder="Passoword" value="'.$row['password'].'">
                </div>
                    ';
            }
        }
        
    }
}
?>