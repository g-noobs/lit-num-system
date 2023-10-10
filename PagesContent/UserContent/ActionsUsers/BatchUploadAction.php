<?php
session_start();
require 'vendor/autoload.php'; // Include PhpSpreadsheet library
use PhpOffice\PhpSpreadsheet\IOFactory;

// Function to insert data into the database
function insertDataIntoDatabase($values) {
    $table = "tbl_user_info";
    include_once("../../../Database/ColumnCountClass.php");
    $columnCountClass = new ColumnCountClass();

    // modify user id plus the column count
    $values['user_info_id'] = "USR". $columnCountClass->columnCountWhere("credentials_id","tbl_credentials");

    if ($_POST['user'] === "Admin") {
        // Set personal-id same with user_info_id
        $values['personal_id'] = $values['user_info_id'];
        $values['user_level_id'] = '0';
        $username = $values['email'];
    } else if ($_POST['user'] === "Teacher") {
        $values['user_level_id'] = '1';
        $username = $values['personal_id'];
    } else if ($_POST['user'] === "Learner") {
        $values['user_level_id'] = '2';
        $username = $values['personal_id'];
    }

    // Place id for added_byID
    $values['added_byID'] = $_SESSION['id'];

    // Password generation
    include_once("../../../CommonPHPClass/PHPClass.php");
    $phpClass = new PHPClass();

    $credentials_id = "CRED" . (100001 + (int)$columnCountClass->columnCount("credentials_id", "tbl_credentials"));

    $password = $phpClass->generatePassword(10);
    $user_info_id = $values['user_info_id'];

    // Insert validation
    include_once "../../../Database/CommonValidationClass.php";
    $validate = new CommonValidationClass();
    $data = array($values['first_name'], $values['last_name']);
    $column = array('first_name', 'last_name');
    $isValid = $validate->validateColumns($table, $column, $data);

    $isIdvalid = $validate->validateOneColumn($table, 'personal_id', $values['personal_id']);

    if ($isValid && $isIdvalid) {
        $columns = implode(', ', array_keys($values));
        $sql = "INSERT INTO $table ($columns) VALUES(?,?,?,?,?,?,?,?,?,?);";
        $params = array_values($values);

        include_once "../../../Database/SanitizeCrudClass.php";
        $addNewUser = new SanitizeCrudClass();

        try {
            $addNewUser->executePreState($sql, $params);
            if ($addNewUser->getLastError() === null) {
                $table = "tbl_credentials";
                $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) VALUES(?,?,?,?);";
                $params = array($credentials_id, $username, $password, $user_info_id);
                include_once "../../../Database/SanitizeCrudClass.php";
                $addNewCreds = new SanitizeCrudClass();
                $addNewCreds->executePreState($query, $params);

                $response = array('success' => 'Successfully added new user!');
                echo json_encode($response);
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                // Duplicate entry
                $response = array('error' => $data . " already exists. Please try again");
                echo json_encode($response);
            } else {
                throw $e;
                $response = array('error' => $e);
                echo json_encode($response);
            }
        }
    } else {
        $response = array('error' => 'User already exists.');
        echo json_encode($response);
    }
}

// Check if a file was uploaded
if (isset($_FILES['excel_file']['tmp_name'])) {
    // Load the Excel file
    $inputFileName = $_FILES['excel_file']['tmp_name'];
    $spreadsheet = IOFactory::load($inputFileName);

    // Get the first worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Iterate through rows and insert data into the database
    foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);

        $values = array(
            'user_info_id' => '',
            'personal_id' => '',
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'email' => '',
            'birthdate' => '',
            'status_id' => '1',
            'user_level_id' => '',
            'added_byID' => ''
        );

        $columnIndex = 0;
        foreach ($cellIterator as $cell) {
            // Assign cell values to corresponding keys in the $values array
            switch ($columnIndex) {
                case 0:
                    $values['personal_id'] = $cell->getValue();
                    break;
                case 1:
                    $values['first_name'] = $cell->getValue();
                    break;
                case 2:
                    $values['last_name'] = $cell->getValue();
                    break;
                case 3:
                    $values['gender'] = $cell->getValue();
                    break;
                case 4:
                    $values['email'] = $cell->getValue();
                    break;
                case 5:
                    $values['birthdate'] = $cell->getValue();
                    break;
                // Add more cases for additional columns as needed
            }
            $columnIndex++;
        }

        // Insert data into the database for each row
        insertDataIntoDatabase($values);
    }
} else {
    // Handle the case where no file was uploaded
    $response = array('error' => 'No Excel file uploaded.');
    echo json_encode($response);
}
?>
