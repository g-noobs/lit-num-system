<?php
$table = "tbl_user_info";


$status = 0;
$id = $_POST['userId'];

$query = "UPDATE $table SET status_id = ? WHERE user_info_id = ?";
$params = [$status, $id];

include_once("../../../Database/SanitizeCrudClass.php");
$archive = new SanitizeCrudClass();
$archive->executePreparedStatement($query, $params, "../../../pages/user.php");
?>

