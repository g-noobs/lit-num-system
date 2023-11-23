<?php 
session_start();
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";

include_once "../../../Database/Connection.php";
$conn = new Connection();

$response = array();

// Check if the request is a POST request
    // Retrieve the data from the Ajax request
    $assign_class_id = $_POST["assign_class_id"];
    $user_teacher_id = $_POST["user_teacher_id"];
    $table = 'tbl_teacher_class_assignment';

    foreach ($assign_class_id as $class_id) {
        // Check if the combination of user_info_id and class_id exists
    $sql = "SELECT COUNT(*) FROM $table WHERE user_info_id = '$user_teacher_id' AND class_id = '$class_id';";
    $result = $conn->getConnection()->query($sql);
    //set count variable
    $count = $result->fetch_row()[0];
        if ($result === false) {
            $response = array('error' =>"Error executing query: " . $conn->getConnection()->error);
            break;            
        }else{
            if ($count > 0) {
                $response = array('error' =>"The combination of user and class already exists.");
            }else{
                $values = array(
                    'class_assign_teacher_id' => '',
                    'class_id' => $class_id,
                    'user_info_id' => $user_teacher_id,
                    'assign_date' => '',
                    'assign_by_id' => '',
                );
                //adding data for class_assign_teacher_id
                $columnCountClass = new ColumnCountClass();
                $values['class_assign_teacher_id'] = "CAT" . $columnCountClass->columnCountWhere("class_assign_teacher_id", $table);
                //assign date
                date_default_timezone_set('Asia/Kuala_Lumpur');
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

                if($assignTeacher->getLastError() === null){
                    $response = array('success' => "Class Assigned Successfully");
                }
                else{
                    $response = array('error' =>"Error Assigning Class");
                    
                }
            }

        }
    }


echo json_encode($response);
?>