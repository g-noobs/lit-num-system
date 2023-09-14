<?php 
// This is will be used upload files to the server
// at the same time save the file path to the database
//will manage POST jquery ajax from file jquerTopic.php

include_once "../../../Database/SanitizeCrudClass.php";
include_once "../../../Database/ColumnCountClass.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //check if the form fields is empty including file input
    if(isset($_POST['topic_name']) && isset($_POST['topic_desc']) && isset($_POST['btnId'])){
        $topic_name = $_POST['topic_name'];
        $topic_desc = $_POST['topic_desc'];
        $lesson_id = $_POST['btnId'];

        //get the topic id with zeros
        $topic_count = new ColumnCountClass();
        $topic_id = "TPC". $topic_count->columnCountWhere("topic_id","tbl_topic");

        $addTopic = new SanitizeCrudClass();
        $query = "INSERT INTO tbl_topic(topic_id, topic_name, topic_description, topic_status, lesson_id) VALUES (?,?,?,?,?)";
        $params = array($topic_id, $topic_name, $topic_desc, 1, $lesson_id);
        
        //Check if there is duplicate in tbl_topic
        include_once "../../../Database/CommonValidationClass.php";
        $isDuplicate = new CommonValidationClass();
        $data = $topic_name;
        $column = 'topic_name';
        $isDuplicate -> validateColumns("tbl_topic", $column, $data);

        if($isDuplicate){
            try{
                $addTopic->executePreState($query,$params);
                
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    // Duplicate entry
                    $message = $data." already exists. Please try again";  
                    exit();
                } else {
                    // Some other error
                    throw $e;
                }
            }
        }
        // if add Topic is successfull proceed with the file upload
        if($addTopic->getLastError() === null){
            //Handle multiple file uploads
            $fileCount = count($_FILES['file']['name']);
            //directory to same with this C:\Users\admin\OneDrive\Documents\GitHub\lit-num-system\TagakauloAdmin\Media\Image
            $uploadDir = __DIR__ . "/Media/Image/";

            //Check if directory exists, if not create it
            if(!file_exists($uploadDir)){
                mkdir($uploadDir, 0755, true);
            }

            $uploadFiles = array();

            //place the file name, tempname and traget path in an array, using for loop
            for($i=0; $i < $fileCount; $i++){
                $fileName = $_FILES["file"]["name"][$i];
                $tempName = $_FILES["file"]["tmp_name"][$i];
                $targetPath = $uploadDir . $fileName;

                $columnCount = new ColumnCountClass();
                $image_id = "IMG". $columnCount->columnCountWhere("image_id","tbl_image");

                // get current or today's date
                $updloadDate = date("Y-m-d");

                ////// Will continue tomorrow

                $addFileInfo = new SanitizeCrudClass();
                $query = "INSERT INTO tbl_image(image_id, image_name, image_path, upload_date, image_status, topic_id) VALUES (?,?,?,?,?,?)";
                
                $params = array($image_id, $fileName, $targetPath, date("Y-m-d"), 1, $topic_id);
                
                // Move the uploaded file to the directory
                if(move_uploaded_file($tempName, $targetPath)){
                    $uploadFiles[] = $targetPath;
                }
            }
            // call the adding to database function
            
            $addTopic = new SanitizeCrudClass();
        }

        


    }
        
}
?>