<?php 
// This is will be used upload files to the server
// at the same time save the file path to the database
//will manage POST jquery ajax from file jquerTopic.php

include_once "../../../Database/SanitizeCrudClass.php";
include_once "../../../Database/ColumnCountClass.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //check if the form fields is empty including file input
    if(isset($_POST['topic_name']) && isset($_POST['topic_desc']) && isset($_POST['btnId'])){
        $topic_name = trim($_POST['topic_name']);
        $topic_desc = $_POST['topic_desc'];
        $lesson_id = $_POST['btnId'];

        //get the topic id with zeros
        $topic_count = new ColumnCountClass();
        $topic_id = "TPC". $topic_count->columnCountWhere("topic_id","tbl_topic");

        $table = "tbl_topic";
        $addTopic = new SanitizeCrudClass();
        $query = "INSERT INTO $table(topic_id, topic_name, topic_description, topic_status, lesson_id) VALUES (?,?,?,?,?)";
        $params = array($topic_id, $topic_name, $topic_desc, 1, $lesson_id);
        
        //Check if there is duplicate in tbl_topic
        include_once "../../../Database/CommonValidationClass.php";
        $check = new CommonValidationClass();
        $data = $topic_name;
        $column = 'topic_name';
        $isDuplicate = $check -> validateOneColumn($table, $column, $data);

        if($isDuplicate){
            try{
                $addTopic->executePreState($query,$params);
                
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    // Duplicate entry
                    echo $data." already exists. Please try again";  
                    exit();
                } else {
                    // Some other error
                    throw $e;
                }
            }
            //add a catch for foreign key constraits fails
            catch(Exception $e){
                echo $e->getMessage();
            }

        }
        else{
            echo $data." is already exists. Please try again";
        }
        // if add Topic is successfull proceed with the file upload
        if($addTopic->getLastError() === null){
            //Handle multiple file uploads
            $fileCount = count($_FILES['file']['name']);
            
            //upload directory to Folder Media
            $uploadDir = "../../../Media/";

            //Check if directory exists, if not create it
            if(!file_exists($uploadDir)){
                mkdir($uploadDir, 0755, true);
            }

            $uploadFiles = array();

            //place the file name, tempname and traget path in an array, using for loop
            for($i=0; $i < $fileCount; $i++){
                $fileName = $_FILES["file"]["name"][$i];
                $tempName = $_FILES["file"]["tmp_name"][$i];

                //set allowed file extensions
                $pathinfo = pathinfo($fileName);
                $base = $pathinfo["filename"];
                $fileExtension = $pathinfo["extension"];

                //replace all non-alphanumeric characters with an underscore
                $base = preg_replace("/[^a-zA-Z0-9]/", "_", $base);
                $fileName = $base . "." . $fileExtension;

                //set the target path with a new file name
                include_once "../../../CommonPHPClass/DirModClass.php";
                $dirMod = new DirModClass();
                $subDirectory = $dirMod->modSubDirecPath($fileExtension);
                
                //Destination Where to Save the file
                $destination = $uploadDir .$subDirectory ."/". $fileName;
                
                $j = 1;
                while(file_exists($destination)){
                    $fileName = $base . "($j)." . $pathinfo["extension"];
                    $destination = $uploadDir . $fileName;
                    $j++;
                }


                $columnCount = new ColumnCountClass();
                $image_id = "IMG". $columnCount->columnCountWhere("image_id","tbl_image");

                // get current or today's date
                $updloadDate = date("Y-m-d");
               
                // !This will be the saved directory path to the database where file can be access
                $distanation_mod = "/TagakauloAdmin/Media/".$subDirectory ."/". $fileName;
                
                // //insert the file info to tbl_image
                $addFileInfo = new SanitizeCrudClass();
                $query = "INSERT INTO tbl_image(image_id, image_name, image_path, upload_date, image_status, topic_id) VALUES (?,?,?,?,?,?)";
                $params = array($image_id, $fileName, $distanation_mod, $updloadDate , 1, $topic_id);
                $addFileInfo->executePreState($query,$params);
                $validate = new CommonValidationClass();
                

                
                //? Move the uploaded file to the directory
                if(move_uploaded_file($tempName, $destination)){
                    $uploadFiles[] = $destination;
                }
            }
            //Adding Successfully
            echo "Successfully Added";
        }
        
    }
}
?>