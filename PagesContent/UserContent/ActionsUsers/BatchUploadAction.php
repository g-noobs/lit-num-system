<?php
session_start();


require '../../../vendor/autoload.php'; // Include PhpSpreadsheet library autoloader
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

// if (isset($_POST['upload_excel'])) {
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

            //remove empty rows
            $$worksheet_arr = array_filter($worksheet_arr, function ($row) {
                return !empty(array_filter($row));
            });

            // Remove header row
            unset($worksheet_arr[0]);

            

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
                                            echo json_encode($response);
                                        }else{
                                            $response = array('error' => "Error adding on teacher table");
                                            echo json_encode($response);
                                            break;
                                        }

                                    }else{
                                        $response = array('error' => 'Error Adding Contact Info for'.$values['first_name'].' '.$values['last_name'].'!');
                                        echo json_encode($response);
                                        break;
                                    }
                                }else{
                                    $response = array('error' => 'Error Adding Credentials for'.$values['first_name'].' '.$values['last_name'].'!');
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
                            $response = array('error' => 'Error Adding user info!'.$values['first_name'].' '.$values['last_name'].'!');
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
        } else {
            $response = array('error' => 'Error uploading file!');
            echo json_encode($response);
            
        }
    } else {
        $response = array('error' => 'Please upload a valid Excel file!');
    }
// }else{
//     $response = array('error' => 'Possible POST ISSUE');
//     echo json_encode($response);
// }
?>