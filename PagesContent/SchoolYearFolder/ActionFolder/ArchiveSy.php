<?php
$table = "tbl_schoolyear";

$values = array(
    'sy_status' => 0,
    'sy_id' => $_POST['sy_id'],
);
$query = "UPDATE $table 
          SET sy_status = ?
          WHERE sy_id = ?";

$params = array_values($values);

include_once("../../../Database/SanitizeCrudClass.php");

$update=new SanitizeCrudClass();
$update->executePreparedStatement($query, $params, "../../../pages/schoolyr.php");

?>