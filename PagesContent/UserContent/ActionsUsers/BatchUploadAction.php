<?php
session_start();

// Include necessary libraries and set up the database configuration
include_once("../../../Database/ColumnCountClass.php");
include_once("../../../Database/CommonValidationClass.php");
include_once("../../../Database/SanitizeCrudClass.php");
include_once("../../../CommonPHPClass/PHPClass.php");

require_once '../../../vendor/autoload.php'; // Include PhpSpreadsheet library autoloader
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['upload'])) {
    // Allowed mime types for Excel files
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    // Validate whether a selected file is an Excel file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)) {
        // If the file is uploaded
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet_arr = $worksheet->toArray();

            // Remove header row
            unset($worksheet_arr[0]);

            // Loop through each row in the spreadsheet
            foreach ($worksheet_arr as $row) {
                $values = array(
                    'user_info_id' => '',
                    'personal_id' => trim($row[0]), // Set this value appropriately
                    'first_name' => trim($row[1]),
                    'last_name' => trim($row[2]),
                    'gender' => trim($row[3]), // Set this value appropriately
                    'email' => $row[4],
                    'birthdate' => $row[5], // Assuming 'date' corresponds to birthdate
                    'status_id' => 1,
                    'user_level_id' => 2, // Set this value appropriately
                    'added_byID' => '',
                    'date_added' => ''
                );
                // Database table for user information
                $table = "tbl_user_info";   
                // Set user_info_id
                $values['user_info_id'] = "USR" . $columnCountClass->columnCountWhere("user_info_id", $table);

                // Set added_byID from the session
                $values['added_byID'] = $_SESSION['id'];

                // Set the current date
                $currentDate = new DateTime();
                $values['date_added'] = $currentDate->format('Y-m-d H:i:s');

                // Insert validation
                $data = array($values['first_name'], $values['last_name']);
                $column = array('first_name', 'last_name');
                $isValid = $validate->validateColumns($table, $column, $data);

                $isIdvalid = $validate->validateOneColumn($table, 'personal_id', $values['personal_id']);

                if ($isValid && $isIdvalid) {
                    $columns = implode(', ', array_keys($values));
                    $questionMarkString = implode(',', array_fill(0, count($values), '?'));
                    $sql = "INSERT INTO $table ($columns) VALUES($questionMarkString);";
                    $params = array_values($values);

                    try {
                        $addNewUser->executePreState($sql, $params);

                        if ($addNewUser->getLastError() === null) {
                            // if no eror create a credentials
                            // Modify user_info_id based on your logic
                            $credentials_id = "CRED" . $columnCountClass->columnCountWhere("credentials_id", "tbl_credentials");
                            $username = $values['personal_id'];

                            $phpClass = new PHPClass();
                            $password = $phpClass->generatePassword(10);
                            $table = "tbl_credentials";
                            $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) VALUES(?,?,?,?);";
                            $params = array($credentials_id, $username, $password, $values['user_info_id']);
                            $addNewCreds = new SanitizeCrudClass();
                            
                            try {
                                $addNewCreds->executePreState($query, $params);
                                
                            } catch (mysqli_sql_exception $e) {
                                // Handle any errors during insertion
                                $response = array('error'=> $e->getMessage());
                                echo json_encode($response);
                            }

                        }
                    } catch (mysqli_sql_exception $e) {
                        // Handle any errors during insertion
                        $response = array('error'=> $e->getMessage());
                        echo json_encode($response);
                    }
                }
            }

            $response = array('success' => 'Successfully added new user!');
            echo json_encode($response);
        } else {
            $response = array('error' => 'Error uploading file!');
            echo json_encode($response);
        }
    } else {
        $response = array('error' => 'Please upload a valid Excel file!');
    }
}else{
    $response = array('error' => 'Possible POST ISSUE');
    echo json_encode($response);
}
?>
