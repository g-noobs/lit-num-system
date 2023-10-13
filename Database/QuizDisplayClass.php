<?php 
include_once("Connection.php");

class QuizDisplayClass extends Connection{
    function __construct(){
        parent :: __construct();
    }
    function quizTable(){
        $sql = "SELECT * FROM combined_quiz_view";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){

            }
        }
    }

    function displayTopicOption(){
        $table = "tbl_topic";
        $sql = "SELECT * FROM ".$table;
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option value='{$row['topic_id']}'>";
                echo $row['topic_name'];
                echo "</option>";
            }
        }
        else{
            echo"<option>";
            echo "No Topic Available";
            echo "</option>";
        }
    }
}
?>