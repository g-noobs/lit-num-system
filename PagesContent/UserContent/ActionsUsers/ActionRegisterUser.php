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
    if(isset($_POST['last_name']) || isset($_POST['first_name']) || isset($_POST['gender']) || isset($_POST['phone_num']) || isset($_POST['email'])){
        $values = array(
            'user_info_id'=>'',
            'first_name' => trim($_POST['first_name']),
            'last_name' =>trim($_POST['last_name']),
            'gender' => $_POST['gender'],
            'status_id' => '1',
            'user_level_id' => '0',
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

        if ($isValid) {
            //collect all comlumns
            $columns = implode(', ', array_keys($values));
            //set number of question marks
            $questionMarkString = implode(',', array_fill(0, count($values), '?'));
            //set sql
            $sql = "INSERT INTO $table($columns)VALUES($questionMarkString);";
            // set parameters
            $params = array_values($values);
            //set sanitize class
            $addNewUser = new SanitizeCrudClass();
            try{
                $addNewUser->executePreState($sql, $params);
                //!if adding user is correct then procced with creating credentials
                if($addNewUser->getLastError() === null){
                    $table = "tbl_credentials";
                    //set credential id
                    $credentials_id = "CRED".$columnCountClass->columnCountWhere("credentials_id",$table);
                    //set username
                    $username = $_POST['email'];
                    //set password
                    $phpClass = new PHPClass();
                    $password = $phpClass->generatePassword(10);
                    //set user_info_id
                    $user_info_id = $values['user_info_id'];
                    //set query
                    $query = "INSERT INTO $table(credentials_id,uname,pass,user_info_id) VALUES(?,?,?,?);";
                    //set parameters
                    $params = array($credentials_id,$username,$password,$user_info_id);
                    //set the sanitize class
                    $addNewCreds = new SanitizeCrudClass();
                    $addNewCreds->executePreState($query, $params);

                    //!if adding credentials is correct then procced with creating contact
                    if($addNewCreds->getLastError() === null){
                        $table = 'tbl_contact_info';
                        //set contact id
                        $contact_id = "CNT". $columnCountClass->columnCountWhere("contact_id","tbl_contact_info");
                        //set contact num
                        $contact_num = $_POST['phone_num'];
                        $email = $_POST['email'];
                        //set user_info_id
                        $user_info_id = $values['user_info_id'];
                        //set query
                        $query = "INSERT INTO $table(contact_id,contact_num,email,user_info_id) VALUES(?,?,?.?);";
                        //set parameters
                        $params = array($contact_id,$contact_num,$email, $user_info_id);
                        //set the sanitize class
                        $addNewContact = new SanitizeCrudClass();
                        $addNewContact->executePreState($query, $params);

                        //if adding contact is correct then procced with creating user
                        if($addNewContact->getLastError() === null){
                            $response = array('success' => $data[0]." ".$data[1]." has been added");
                            echo json_encode($response);}
                    }else{
                        $response = array('error' => 'Something went wrong on adding credentials');
                        echo json_encode($response);
                    }
                }else{
                    $response = array('error' => 'Something went wrong on adding user');
                    echo json_encode($response);
                }
            }catch(mysqli_sql_exception $e){
                if ($e->getCode() == 1062){
                    //Duplicate entry
                    $response = array('error' => "Duplicate. Please try again");
                    echo json_encode($response);
                }else{
                    $response = array('error' => $e->getMessage());
                    echo json_encode($response);
                    throw $e;
                }
            }catch(Exception $e){
                $response = array('error' => $e->getMessage());
                echo json_encode($response);
            }

        }else{
            $response = array('error' => 'The Name '.$data[0].' '.$data[1].' already exists. Please try again');
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