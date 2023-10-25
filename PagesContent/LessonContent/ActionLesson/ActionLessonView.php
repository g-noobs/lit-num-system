<?php
include_once "../../../Database/Connection.php";
$connection = new Connection;
$conn = $connection->getConnection();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
//check if post is received 
    if(isset($_POST['id'])) {
        $lesson_id = $_POST['id'];

        $sql = "SELECT * FROM media_view WHERE lesson_id = '$lesson_id'";
        $result = $conn->query($sql);

        $mediaData = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $topic_id = $row["topic_id"];
                $media_path = $row["media_path"];

                // Group media_path under topic_id
                if (!isset($mediaData[$topic_id])) {
                    $mediaData[$topic_id] = array();
                }

                $mediaData[$topic_id][] = $media_path;
            }

            // Return the grouped media data as JSON
            echo json_encode($mediaData);
        }else{
            $response = array("error"=> "Empty!! No Data Found");
            echo json_encode($response);
        }

    }else{
        $response = array("error"=> "ID not receiver");
        echo json_encode($response);
    }
}else{
    $response = array("error"=> "POSSIBLE POST ISSUE");
    echo json_encode($response);
}
?>