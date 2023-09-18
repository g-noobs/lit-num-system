<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php include_once "Database/Connection.php";
        $conn = new Connection();
        $image_name;

        $sql = "SELECT image_name FROM tbl_image WHERE image_id = 'IMG000002'";
        $result = $conn->getConnection()->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $image_name = $row["image_name"];
            }
        }
        else{
            $image_name = "No Result";
        }
        echo '<h2>'. $image_name . '</h2>';
        echo '<img src="Media/Images/'.$image_name.'" alt="Image" width="200px" height="200px">';

        ?>

    </div>

</body>

</html>