<?php
session_start();


require '../../../vendor/autoload.php'; // Include PhpSpreadsheet library autoloader
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


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

        //remove empty rows
        $worksheet_arr = array_filter($worksheet_arr, function ($row) {
            return !empty(array_filter($row));
        });

        // Loop through each row in the spreadsheet
        foreach ($worksheet_arr as $row) {
            $values = array(
                'user_info_id' => '',
                'personal_id' => trim($row[0]), 
                'last_name' => trim($row[1]),
                'first_name' => trim($row[2]),
                'middle_name' => trim($row[3]),
                'gender' => trim($row[4]),
                'user_level_id' => '1',
                'added_byID' => '',
                'date_added' => ''
            );
            

            // Database table for user information
            // Include necessary libraries and set up the database configuration
            include_once("../../../Database/ColumnCountClass.php");
            include_once("../../../Database/CommonValidationClass.php");
            include_once("../../../Database/SanitizeCrudClass.php");
            include_once("../../../CommonPHPClass/PHPClass.php");
            include_once "../../../CommonPHPClass/InputValidationClass.php";

            //set input validation class
            $inputValidation = new InputValidationClass();
            $teacher_id = $inputValidation->test_input(trim($row[0]), 'alphanum');
            $last_name = $inputValidation->test_input(trim($row[1]), 'name');
            $first_name = $inputValidation->test_input(trim($row[2]), 'name');
            $middle_name = $inputValidation->test_input(trim($row[3]), 'name');
            $gender = $inputValidation->test_input(trim($row[4]), 'name');
            $phone_num = $inputValidation->test_input(trim($row[5]), 'phone');
            $email = filter_var(trim($row[6]), FILTER_SANITIZE_EMAIL);
            $street = $inputValidation->test_input(trim($row[7]), 'address');
            $baranggay = $inputValidation->test_input(trim($row[8]), 'address');
            $municipal_city = $inputValidation->test_input(trim($row[9]), 'address');
            $province = $inputValidation->test_input(trim($row[10]), 'address');
            $postal_code = $inputValidation->test_input(trim($row[11]), 'number');


            $errors =array();
            if($teacher_id === false){
                $errors[] = "Invalid characters in Teacher ID. on " . $values['personal_id'];
            }
            if($last_name === false){
                $errors[] = "Invalid characters in Last Name on " . $values['personal_id'];
            }
            if($first_name === false){
                $errors[] = "Invalid characters in First Name on ". $values['personal_id'];
            }
            if($middle_name === false){
                $errors[] = "Invalid characters in Middle Initial." . $values['personal_id'];
            }
            if($gender === false){
                $errors[] = "Invalid characters in gender." . $values['personal_id'];
            }
            if($phone_num === false){
                $errors[] = "Invalid phone number. " . $values['personal_id'];
            }
            if($email === false){
                $errors[] = "Invalid email address. ". $values['personal_id'];
            }
            if($street === false){
                $errors[] = "Invalid characters in Street Address. ". $values['personal_id'];
            }
            if($baranggay === false){
                $errors[] = "Invalid characters in Barangay Address. ". $values['personal_id'];
            }
            if($municipal_city === false){
                $errors[] = "Invalid characters in City Address. ". $values['personal_id'];
            }
            if($province === false){
                $errors[] = "Invalid characters in Province Address. ". $values['personal_id'];
            }
            if($postal_code === false){
                $errors[] = "Invalid characters in Zip Code. ". $values['personal_id'];
            }
            //send the error if error array is not empty
            if (!empty($errors)) {
                echo json_encode($errors);
                break;
                exit();
    
                //start adding if no error catched
            }else{
                $table = "tbl_user_info";   
                // Set user_info_id
                $columnCountClass = new ColumnCountClass();
                $values['user_info_id'] = "USR" . $columnCountClass->columnCountWhere("user_info_id", $table);
                // Set added_byID from the session
                $values['added_byID'] = $_SESSION['id'];

                // Set the current date
                $currentDate = new DateTime();
                $values['date_added'] = $currentDate->format('Y-m-d H:i:s');

                // Insert validation
                $data = array($values['first_name'], $values['last_name']);
                $column = array('first_name', 'last_name');
                $validate = new CommonValidationClass();
                $isValid = $validate->validateColumns($table, $column, $data);
                $isIdvalid = $validate->validateOneColumn($table, 'personal_id', $values['personal_id']);

                if ($isIdvalid && $isValid) {
                    $columns = implode(', ', array_keys($values));
                    $questionMarkString = implode(',', array_fill(0, count($values), '?'));
                    $sql = "INSERT INTO $table ($columns) VALUES($questionMarkString);";
                    $params = array_values($values);
                    $addNewUser = new SanitizeCrudClass();

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

                                // !if no error create a contact info
                                if($addNewCreds->getLastError()=== null){
                                    $table = 'tbl_contact_info';
                                    $contact = array(
                                        'contact_id' => '',
                                        'contact_num'=> trim($row[5]),
                                        'email'=> trim($row[6]),
                                        'street'=> trim($row[7]),
                                        'barangay'=> trim($row[8]),
                                        'municipal_city'=> trim($row[9]),
                                        'province'=> trim($row[10]),
                                        'postalcode'=>trim($row[11]),
                                        'user_info_id'=> $values['user_info_id']
                                    );
                                    $contact['contact_id'] = "CNT".$columnCountClass->columnCountWhere("contact_id",$table);
                                    $columns = implode(', ', array_keys($contact));
                                    $questionMarkString = implode(',', array_fill(0, count($contact), '?'));
                                    $sql = "INSERT INTO $table ($columns) VALUES($questionMarkString);";
                                    $params = array_values($contact);
                                    //set the sanitize class
                                    $addNewContact = new SanitizeCrudClass();
                                    $addNewContact->executePreState($sql, $params);
                                    
                                    // !if contact adding is successfull
                                    if($addNewContact->getLastError()=== null){
                                        $table = "tbl_teacher";
                                        $teacher = array(
                                            'teacher_id' => '',
                                            'teacher_personal_id' => $values['personal_id'],
                                            'user_info_id' => $values['user_info_id']
                                        );
                                        //set teacher id
                                        $teacher['teacher_id'] = "TCH". $columnCountClass->columnCountWhere("teacher_id", $table);
                                        //set columns
                                        $columns = implode(', ', array_keys($teacher));
                                        //set number of question marks
                                        $questionMarkString = implode(',', array_fill(0, count($teacher), '?'));
                                        //set sql
                                        $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                                        // set parameters
                                        $params = array_values($teacher);
                                        //set sanitize class
                                        $addNewTeacher = new SanitizeCrudClass();
                                        $addNewTeacher->executePreState($sql, $params);
                                        if($addNewTeacher->getLastError()=== null){
                                            $response = array('success' => "Successfully added new teacher");
                                            
                                        }else{
                                            $response = array('error' => "Error adding on teacher table");
                                            echo json_encode($response);
                                            break;
                                        }

                                    }else{
                                        $response = array('error' => 'Error Adding Contact Info for'.$values['personal_id'].'!');
                                        echo json_encode($response);
                                        break;
                                    }
                                }else{
                                    $response = array('error' => 'Error Adding Credentials for'.$values['personal_id'].'!');
                                    echo json_encode($response);
                                    break;
                                }
                                
                            } catch (mysqli_sql_exception $e) {
                                // Handle any errors during insertion
                                $response = array('error'=> $e->getMessage());
                                echo json_encode($response);
                                break;
                            }
                        }else{
                            $response = array('error' => 'Error Adding user info! '.$values['personal_id'].'!');
                            echo json_encode($response);
                            break;
                        }
                    } catch (mysqli_sql_exception $e) {
                        // Handle any errors during insertion
                        $response = array('error'=> $e->getMessage());
                        echo json_encode($response);
                        break;
                    }
                }
                else{
                    $response = array('error' => 'Error uploading file! Possible Duplicate');
                    echo json_encode($response);
                    break;
                }
            }
        }
        $response = array('success' => 'Successfully added new teachers');
        echo json_encode($response);
    }else{
        $response = array('error' => 'Error uploading file!');
        echo json_encode($response);
    }
} else {
    $response = array('error' => 'Please upload a valid Excel file!');
    echo json_encode($response);
}

?>