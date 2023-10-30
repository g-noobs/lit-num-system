<?php 
include_once "../../Database/ColumnCountClass.php";
$count = new ColummCountClass();

$table = "tbl_user_info";

$adminCountQuery = "SELECT COUNT(user_info_id) as count FROM $table WHERE user_level_id = 0;";
$teacherCountQuery = "SELECT COUNT(user_info_id) as count FROM $table WHERE user_level_id = 1;";
$studentCountQuery = "SELECT COUNT(user_info_id) as count FROM $table WHERE user_level_id = 2;";

$adminCount = $count->columnCountNum($adminCountQuery);
$teacherCount = $count->columnCountNum($teacherCountQuery);
$studentCount = $count->columnCountNum($studentCountQuery);

$response = array(
    'admin' => $adminCount,
    'teacher' => $teacherCount,
    'student' => $studentCount
);

echo json_encode($response);
?>