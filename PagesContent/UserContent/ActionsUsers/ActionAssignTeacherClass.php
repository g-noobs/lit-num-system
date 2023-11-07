<?php 
session_start();
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";

include_once "../../../Database/Connection.php";
$conn = new Connection();

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the Ajax request
    $assign_class_id = $_POST["assign_class_id"];
    $user_teacher_id = $_POST["user_teacher_id"];
    $table = 'tbl_class_assign_teacher';

    // Now you can process the data as needed
    // For example, you can loop through the $assign_class_id array and perform actions with it
    foreach ($assign_class_id as $class_id) {
        // Check if the combination of user_info_id and class_id exists
    $sql = "SELECT COUNT(*) AS count FROM $table WHERE user_info_id = '$user_teacher_id' AND class_id = '$class_id';";
    $result = $conn->getConnection()->query($sql);
        if ($result) {
            $row = $result->fetch_row();
            $count = $row['count'];
            
            if ($count === 0) {
                $values = array(
                    'class_assign_teacher_id' => '',
                    'class_id' => $class_id,
                    'user_info_id' => $user_teacher_id,
                    'assign_date' => '',
                    'assign_by_id' => '',
                );
                //adding data for class_assign_teacher_id
                $columnCountClass = new ColumnCountClass();
                $values['class_assign_teacher_id'] = "CLS" . $columnCountClass->columnCountWhere("class_assign_teacher_id", $table);
                //assign date
                $currentDate = new DateTime();
                $values['assign_date'] = $currentDate->format('Y-m-d H:i:s');
                //assign by id
                $values['assign_by_id'] = $_SESSION['id'];

                //set columns
                $columns = implode(', ', array_keys($values));
                //set number of question marks
                $questionMarkString = implode(',', array_fill(0, count($values), '?'));
                //set sql
                $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                // set parameters
                $params = array_values($values);
                //set sanitize class
                $assignTeacher = new SanitizeCrudClass();
                $assignTeacher->executePreState($sql, $params);

                if($assignTeacher->getLastError()=== null){
                    $response = array('success' => "Class Assigned Successfully");
                }
                else{
                    $response = array('error' =>"Error Assigning Class");
                    break;
                }
            }
        }else{
            $response = array('error' =>"Error Assigning Class or connection issue");
            break;
        }
    }
} else {
    // Handle non-POST requests (optional)
    $response = array('error' =>"Invalid request method");
}

echo json_encode($response);
?>