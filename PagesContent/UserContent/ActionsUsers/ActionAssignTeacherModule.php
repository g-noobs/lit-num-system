<?php 
session_start();
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";

include_once "../../../Database/Connection.php";
$conn = new Connection();

$response = array();


//Retreive data from the ajax request
$assign_module_id = $_POST["assign_module_id"];
$user_teacher_id = $_POST["user_teacher_id"];
$table = 'tbl_teacher_module_assignment';

//
foreach($assign_module_id as $module_id){
    // Check if the combination of user_info_id and module_id exists
    $sql = "SELECT COUNT(*) FROM $table WHERE user_info_id = '$user_teacher_id' AND module_id = '$module_id';";
    $result = $conn->getConnection()->query($sql);
    //set count variable
    $count = $result->fetch_row()[0];
    if ($result === false) {
        $response = array('error' =>"Error executing query: " . $conn->getConnection()->error);
        break;
    }else{
        if ($count > 0) {
            $response = array('error' =>"The combination of user and module already exists.");
        }else{
            $values = array(
                'module_assign_id ' => '',
                'module_id' => $module_id,
                'user_info_id' => $user_teacher_id,
                'assign_date' => '',
                'assign_by_id' => '',
            );
            //adding data for module_assign_teacher_id
            $columnCountClass = new ColumnCountClass();
            $values['module_assign_id'] = "MOD" . $columnCountClass->columnCountWhere("module_assign_id", $table);
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

            if($assignTeacher->getLastError() === null){
                $response = array('success' => "Module assigned successfully.");
            }else{
                $response = array('error' => "Error executing query: " . $assignTeacher->getLastError());
                
            }
        }
    }
}
echo json_encode($response);

?>