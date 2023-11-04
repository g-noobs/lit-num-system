<?php 
session_start();
// This will be used to get the column count of the table for naming id
include_once("../../../Database/ColumnCountClass.php");
//Password generation
include_once("../../../CommonPHPClass/PHPClass.php");
//insert validation
include_once "../../../Database/CommonValidationClass.php";
// Sanitize insert
include_once "../../../Database/SanitizeCrudClass.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['personal_id']) || isset($_POST['last_name']) || isset($_POST['first_name']) || isset($_POST['phone_num']) || isset($_POST['email']) || isset($_POST['street_address'])){
        $values = array(
            'user_info_id'=>'',
            'personal_id' => trim($_POST['personal_id']),
            'first_name' => trim($_POST['first_name']),
            'last_name' =>trim($_POST['last_name']),
            'middle_name' => trim($_POST['user_middle_initial']),
            'gender' => $_POST['gender'],
            'status_id' => '1',
            'user_level_id' => '2',
            'added_byID'=>'',
            'date_added' => ''
        );
        $table = "tbl_user_info";
                //adding data for user_info_id
                $columnCountClass = new ColumnCountClass();
                $values['user_info_id'] = "USR". $columnCountClass->columnCountWhere("user_info_id",$table);

                //adding data for added_byID
                $values['added_byID']= $_SESSION['id'];

                //adding data for date_added
                $currentDate = new DateTime();
                $values['date_added'] = $currentDate->format('Y-m-d H:i:s');

                 //setting validation class
                $validate = new CommonValidationClass();
                $data = array($values['first_name'], $values['last_name']);
                $column = array('first_name', 'last_name');
                $isValid = $validate -> validateColumns($table, $column, $data);
                $isIdvalid = $validate -> validateOneColumn($table, 'personal_id', $values['personal_id']);

                if($isIdvalid && $isValid){
                    //set columns
                    $columns = implode(', ', array_keys($values));
                    //set number of question marks
                    $questionMarkString = implode(',', array_fill(0, count($values), '?'));
                    //set sql
                    $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                    // set parameters
                    $params = array_values($values);
                    //set sanitize class
                    $addNewStudent = new SanitizeCrudClass();
                    try{
                        $addNewStudent -> executePreState($sql, $params);
                        //!if adding user is correct then procced with creating credentials
                        if($addNewStudent->getLastError()=== null){
                            $table = "tbl_credentials";
                            //set credential id
                            $credentials_id = "CRED".$columnCountClass->columnCountWhere("credentials_id",$table);
                            //set username
                            $username = $values['personal_id'];
                            //set password
                            $phpClass = new PHPClass();
                            $password = $phpClass->generatePassword();
                            //set user_info_id
                            $user_info_id = $values['user_info_id'];
                            //set query
                            $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) VALUES(?,?,?,?);";
                            //set parameters
                            $params = array($credentials_id,$username,$password,$user_info_id);
                            //set the sanitize class
                            $addNewCreds = new SanitizeCrudClass();
                            $addNewCreds->executePreState($query, $params);
                            
                            //!if adding credentials is correct then procced with creating student
                            if($addNewCreds->getLastError()=== null){
                                $table = 'tbl_contact_info';
                                $contact = array(
                                    'contact_id' => '',
                                    'contact_num'=> $_POST['phone_num'],
                                    'email'=> $_POST['email'],
                                    'street'=> $_POST['street_address'],
                                    'barangay'=> $_POST['barangay_address'],
                                    'municipal_city'=> $_POST['city_address'],
                                    'province'=> $_POST['province_address'],
                                    'postalcode'=>$_POST['zip_code'],
                                    'user_info_id'=> $values['user_info_id']
                                );
                                //set contact id
                                $contact['contact_id'] = "CNT". $columnCountClass->columnCountWhere("contact_id", $table);
                                $columns = implode(', ', array_keys($contact));
                                //set number of question marks
                                $questionMarkString = implode(',', array_fill(0, count($contact), '?'));
                                //set sql
                                $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                                // set parameters
                                $params = array_values($contact);
                                //set sanitize class
                                $addNewContact = new SanitizeCrudClass();
                                $addNewContact->executePreState($sql, $params);
                                //!if adding contact is correct then procced with creating student
                                if($addNewContact->getLastError()=== null){
                                    $table = 'tbl_guardian';
                                    $guardian = array(
                                        'guardian_id'=> '',
                                        'guardian_fname'=> $_POST['guardian_first_name'],
                                        'guardian_lname'=> $_POST['guardian_last_name'],
                                        'guardian_mname'=> $_POST['guardian_middle_name'],
                                        'guardian_number'=> $_POST['guardian_phone_num'],
                                        'user_info_id'=> $values['user_info_id']
                                    );
                                    //set guardian id
                                    $guardian['guardian_id'] = "GDN". $columnCountClass->columnCountWhere("guardian_id", $table);
                                    //set columns
                                    $columns = implode(', ', array_keys($guardian));
                                    //set number of question marks
                                    $questionMarkString = implode(',', array_fill(0, count($guardian), '?'));
                                    //set sql
                                    $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                                    // set parameters
                                    $params = array_values($guardian);
                                    //set sanitize class
                                    $addNewGuardian = new SanitizeCrudClass();
                                    $addNewGuardian->executePreState($sql, $params);
                                    //!if adding guardian is correct then procced with creating entry for student table
                                    if($addNewGuardian->getLastError()=== null){
                                        $table = 'tbl_learner';
                                        $learner = array(
                                            'learner_id'=> '',
                                            'learner_personal_id'=> $values['personal_id'],
                                            'teacher_id' => '',
                                            'user_info_id' => $values['user_info_id'],
                                        );
                                        //set learner id
                                        $learner['learner_id'] = "LRN". $columnCountClass->columnCountWhere("learner_id", $table);
                                        //set columns
                                        $columns = implode(', ', array_keys($learner));
                                        //set number of question marks
                                        $questionMarkString = implode(',', array_fill(0, count($learner), '?'));
                                        //set sql
                                        $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
                                        // set parameters
                                        $params = array_values($learner);
                                        //set sanitize class
                                        $addNewLearner = new SanitizeCrudClass();
                                        $addNewLearner->executePreState($sql, $params);
                                        //!if adding learner is correct then procced with creating entry for student table
                                        if($addNewLearner->getLastError()=== null){
                                            $response = array('success' => 'Successfully added new student');
                                            echo json_encode($response);

                                        }else{
                                            $response = array('error' => "Error adding a new Learner");
                                            echo json_encode($response);
                                        }
                                    }else{
                                        $response = array('error' => "Error adding on guardian");
                                        echo json_encode($response);
                                    }
                                }else{
                                    $response = array('error' => "Error adding on contact");
                                    echo json_encode($response);
                                }
                                
                            }else{
                                $response = array('error' => "Error adding on credentials");
                                echo json_encode($response);
                            }
                            
                        }else{
                            $response = array('error' => "Erro adding on user_info_table");
                            echo json_encode($response);
                        }

                    }catch(mysqli_sql_exception $e){
                        $response = array('error' => $e->getMessage());
                        echo json_encode($response);
                    
                    }catch(Exception $e){
                        $response =array('error' => $e->getMessage());
                        echo json_encode($response);
                    }
                }else{
                    $response = array('error' => 'Stduent or name has Duplicate or invalid.. isIdvalid: ='.$isIdvalid.', isValid: ='.$isValid);
                    echo json_encode($response);
                }
    }else{
        $response = array('error' => 'One or more fields are empty');
        echo json_encode($response);
    }
}else{
    $response = array('error' => 'POSSIBLE POST ISSUE');
    echo json_encode($response);
}

?>