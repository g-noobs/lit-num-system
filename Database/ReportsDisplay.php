<?php 
include_once("Connection.php");

class ReportsDisplay extends Connection{

    function __construct(){
        parent :: __construct();
    }
    function displayUserData($sql){
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $address = $row['street']. " ". $row['barangay']. " ". $row['municipal_city']. " ". $row['province']. " ". $row['psotalcode'];   

                echo "<tr>";
                echo "<td>".$row['personal_id']. "</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['first_name']. "</td>";
                echo "<td>".$row['middle_name']."</td>";
                echo "<td>".$row['gender']. "</td>";
                echo "<td>".$row['contact_num']. "</td>";
                echo "<td>".$row['email']. "</td>";
                echo "<td>".$address. "</td>";
                echo "</tr>";
            }
        }
    }
    function displayModule(){
        $sql = "SELECT * FROM tbl_module;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['module_id']."</td>";
                echo "<td>".$row['module_name']. "</td>";
                echo "<td>".$row['module_description']."</td>";
                echo "<td>".$row['date_added']."</td>";
                echo "<td>".$row['added_by_id']."</td>";
                echo "</tr>";
            }
        }
    }
    function displayLesson(){
        $sql = "SELECT * FROM lesson_view;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                
                echo "<tr>";
                echo "<td>".$row['lesson_id']."</td>";
                echo "<td>".$row['lesson_name']. "</td>";
                echo "<td>".$row['category_name']."</td>";
                echo "<td>".$row['subj_name']."</td>";
                echo "</tr>";
            }
        }
    }

    function displayTopic(){
        $sql = "SELECT * FROM tbl_topic;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['topic_status'] == 1){
                    $status = "Active";
                }
                else{
                    $status = "Inactive";
                }
                echo "<tr>";
                echo "<td>".$row['topic_id']."</td>";
                echo "<td>".$row['topic_name']. "</td>";
                echo "<td>".$row['topic_description']."</td>";
                echo "<td>".$status."</td>";
                echo "<td>".$row['lesson_id']."</td>";
                echo "</tr>";
            }
        }
    }

    function displayQuiz(){
        $sql = "SELECT * FROM tbl_quiz;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $correctAnswer = $row['quiz_selectionA'];

                echo "<tr>";
                echo "<td>".$row['quiz_id']."</td>";
                echo "<td>".$row['quiz_question']. "</td>";
                echo "<td>".$correctAnswer. "</td>";
                echo "<td>".$row['quiz_selectionA']."</td>";
                echo "<td>".$row['quiz_selectionB']."</td>";
                echo "<td>".$row['quiz_selectionC']."</td>";
                echo "<td>".$row['quiz_selectionD']."</td>";
                echo "<td>".$row['topic_id']."</td>";
                echo "<td>".$row['date_created']."</td>";
                echo "</tr>";
            }
        }
    }
}
?>
