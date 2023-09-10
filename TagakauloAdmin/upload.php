<?php
// if server did not receive a POST request, exit
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("POST request method required");
}

// if fileToUpload is empty, exit
if(empty($_FILES["fileToUpload"]["name"])){
    exit('$_FILES is empty');
}
// if fileToUpload is not an image, exit
if($_FILES["fileToUpload"]["size"] > 1048000){
    exit('File size is too large (max 10mb)');
}
//set allowed file types
$mime_types = ["image/gif", "image/jpeg", "image/png"];

// allow all file types indicated in $mime_types
if(!in_array($_FILES["fileToUpload"]["type"], $mime_types)){
    exit('Invalid file type');
}
//set allowed file extensions
$pathinfo = pathinfo($_FILES["fileToUpload"]["name"]);
$base = $pathinfo["filename"];

// replaces all non-alphanumeric characters with an underscore
$base = preg_replace("/[^a-zA-Z0-9]/", "_", $base);
$filename = $base . "." . $pathinfo["extension"];
$destination = __DIR__ . "/Img/" . $filename;

$i = 1;

while(file_exists($destination)){
    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/Img/" . $filename;
    $i++;
}

if(! move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destination)){
    exit('Error uploading file');
}

print_r($_FILES);

?>