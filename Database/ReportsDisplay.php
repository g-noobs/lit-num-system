<?php 
include_once("Connection.php");

class ReportsDisplay extends Connection{

    function __construct(){
        parent :: __construct();
    }
    function fullTeacherData($sql){
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
    function fullStudentData(){
        $table = "student_full_view";
        $sql = "SELECT * FROM $table WHERE user_level_description = 'Learner'";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $address = $row['street']. " ". $row['barangay']. " ". $row['municipal_city']. " ". $row['province']. " ". $row['postalcode'];   

                echo "<tr>";
                echo "<td>".$row['personal_id']. "</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['first_name']. "</td>";
                echo "<td>".$row['middle_name']."</td>";
                echo "<td>".$row['gender']. "</td>";
                echo "<td>".$row['contact_num']. "</td>";
                echo "<td>".$row['email']. "</td>";
                echo "<td>".$address. "</td>";
                echo "<td>".$row['guardian_lname']. "</td>";
                echo "<td>".$row['guardian_fname']. "</td>";
                echo "<td>".$row['guardian_number']. "</td>";
                echo "</tr>";
            }
        }
    }
    function displayClass(){
        $table = "view_report_class_teacher_info";
        $sql = "SELECT * FROM $table";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

                $schoolyear = $row['sy_start'] .'-'. $row['sy_end'];
                $teacher_name = $row['first_name']. ' '. $row['last_name'];
                echo "<tr>";
                echo "<td>".$row['class_id']."</td>";
                echo "<td>".$row['class_name']. "</td>";
                echo "<td>".$schoolyear. "</td>";
                echo "<td>".$row['date_added']."</td>";
                echo "<td>" .$teacher_name. "</td>";
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
        $sql = "SELECT * FROM view_lesson_details;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $teacher_name = $row['first_name'] ." ". $row['last_name'];
                echo "<tr>";
                echo "<td>".$row['lesson_id']."</td>";
                echo "<td>".$row['lesson_name']. "</td>";
                echo "<td>".$row['lesson_description']."</td>";
                echo "<td>".$row['category_name']."</td>";
                echo "<td>".$row['module_name']."</td>";
                echo "<td>".$teacher_name ."</td>";
                echo "</tr>";
            }
        }
    }

    function displayTopic(){
        $sql = "SELECT t.topic_id, t.topic_name, t.topic_description, l.lesson_name, t.added_byID, t.date_added FROM tbl_topic t JOIN tbl_lesson l ON t.lesson_id = l.lesson_id;";
        $result = $this->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['topic_id']."</td>";
                echo "<td>".$row['topic_name']. "</td>";
                echo "<td>".$row['topic_description']."</td>";
                echo "<td>".$row['lesson_name']."</td>";
                echo "<td>".$row['added_byID']."</td>";
                echo "<td>".$row['date_added']."</td>";
                echo "</tr>";
            }
        }
    }

    function displayQuiz(){
        $sql = "SELECT q.quiz_id, q.quiz_question, q.quiz_selectionA, q.quiz_selectionB, q.quiz_selectionC, q.quiz_selectionD, t.topic_name, q.date_created FROM tbl_quiz q JOIN tbl_topic t ON q.topic_id = t.topic_id;;";
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
                echo "<td>".$row['topic_name']."</td>";
                echo "<td>".$row['date_created']."</td>";
                echo "</tr>";
            }
        }
    }
}
?>