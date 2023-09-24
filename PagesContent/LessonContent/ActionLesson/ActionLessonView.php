<?php
//check if post is received 
if(isset($_POST['id']) || isset($_POST['name'])) {
    
}
else{
    $response = array("error"=> "POST ERROR");
    echo json_encode($response);
}
?>