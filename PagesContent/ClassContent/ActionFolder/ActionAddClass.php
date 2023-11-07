<?php
//Columncount for modified class_id
include_once("../../../Database/ColumnCountClass.php");
//validation to prevent duplicate for class name
include_once("../../../Database/CommonValidationClass.php");
//Sanitize or parameterized query for insert
include_once("../../../Database/SanitizeCrudClass.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['class_name']) || isset($_POST['sy_id'])) {
        $values = array(
            'class_id'=> '',
            'class_name' => $_POST['class_name'],
            'date_added' => '',
            'sy_id' => $_POST['sy_id'],
        );
        $table = "tbl_class";
        //for adding modified class id
        $columnCount = new ColumnCountClass();
        $values['class_id'] = 'CLS' . $columnCount->columnCountWhere('class_id',$table);

        //date added
        $values['date_added'] = date("Y-m-d");

        //validation for duplicate class name
        $validation = new CommonValidationClass();
        $isValid = $validation->validateOneColumn($table,'class_name', $values['class_name']);

        if($isValid){
            //set columns
            $columns = implode(', ', array_keys($values));
            //set number of question marks
            $masks = implode(', ', array_fill(0, count($values), '?'));
            //set sql
            $sql = "INSERT INTO $table ($columns) VALUES ($masks)";
            //set parameters
            $params = array_values($values);
            //set sanitize class
            $addClass = new SanitizeCrudClass();
            try{
                $addClass->executePreState($sql,$params);
            }catch(mysqli_sql_exception $e){
                $response = array('error' => $e->getMessage());
                echo json_encode($response);
            }catch(Exception $e){
                $response = array('error' => $e->getMessage());
                echo json_encode($response);
            }

            if($addClass->getLastError() == null){
                $response = array('success' => 'New Class Added Successfully');
            }
            
        }else{
            $response = array('error' => 'Class Name Already Exist');
        }

    }else{
        $response = array('error' => 'One or More Data is missing');
        echo json_encode($response);
    }
    

}else{
    $response = array('error' => 'Error: Invalid request or POST ISSUE');
}
echo json_encode($response);
?>