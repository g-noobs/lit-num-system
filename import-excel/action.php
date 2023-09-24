<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

      //  $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        //Remove heaer row
        unset($spreadSheetAry[0]);

        foreach($spreadSheetAry as $row){
            $name = $row[0];
            $gender = $row[1];
            $email = $row[2];
            $birthdate = $row[3];
            $user_level_id = $row[4];
            $status_id = 1;
           

            if (! empty($name) || ! empty($description)) {
                include_once("../Database/ColumnCountClass.php");
                $columnCountClass = new ColumnCountClass();
                $user_info_id = "USR".(100001 + $columnCountClass->userCount("user_info_Id","tbl_user_info"));
                
                include_once("../CommonPHPClass/PHPClass.php");
                $phpClass = new PHPClass();
                $credentials_id = "CRED".(100001 + (int)$columnCountClass->userCount("credentials_id","tbl_credentials"));
                $username = $
                $password = $phpClass->generatePassword(10);
                
                $table = "tbl_user_info";
                $sql = "INSERT INTO $table (user_info_id , name, gender, email, birthdate, status_id, user_level_id) VALUES ('".$name."','".$gender."','".$email."','".$birthdate."','".$status_id."','".$user_level_id."');";
                $table = "tbl_credentials";
                $sql .= "INSERT INTO $table(credentials_id,uname,pass,user_info_id )VALUES ('".$credentials_id."', '".$username."','".$password."','".$user_info_id ."');";

                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                $result = mysqli_query($conn, $query);
                if($result=== TRUE){
                    echo '<script>
                    alert(Added);
                    </script>';
                }
                else{
                    echo '<script>
                    alert(Something went wrong);
                    </script>';
                }
                

                /* for sanitation
                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                } */
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>