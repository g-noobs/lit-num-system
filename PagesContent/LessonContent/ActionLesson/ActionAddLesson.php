<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['lesson_name'])){
        $values = array(
            'lesson_id'=>'',
            'lesson_name' => trim($_POST['lesson_name']),
            'category_id' => $_POST['category_level'],
            'added_byID ' => '',
            'subj_id' => $_POST['subj_list'],
            'lesson_status' => '1'
        );
        
        //get the lesson id with zeros
        $lesson_count = new ColumnCountClass();
        $values['lesson_id'] = "LSN". $lesson_count->columnCountWhere("lesson_id","tbl_lesson");
        
        $table = "tbl_lesson";
        $addLesson = new SanitizeCrudClass();
        $columns = implode(', ', array_keys($values));
        $query = "INSERT INTO $table($columns) VALUES (?,?,?,?,?,?)";
        $params = array_values($values);
        
        //Check if there is duplicate of lesson name  in tbl_lesson
        include_once "../../../Database/CommonValidationClass.php";
        $check = new CommonValidationClass();
        $data = $lesson_name;
        $column = 'lesson_name';
        $isDuplicate = $check -> validateOneColumn($table, $column, $data);
        
        if($isDuplicate){
            try{
                $addLesson->executePreState($query,$params);
                if($addLesson){
                    $response = array('success' => $data." has been added");
                    echo json_encode($response);
                }

                
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    // Duplicate entry
                    $response = array('error' => $data." already exists. Please try again");
                    echo json_encode($response);
                } else {
                    // Some other error
                    throw $e;
                    $response = array('error' => "Something went wrong". $e);
                    echo json_encode($response);
                }
            }
            //add a catch for foreign key constraits fails
            catch(Exception $e){
                $response = array('error' => $e->getMessage());
                echo json_encode($response);
            }
        }
        else{
            $response = array('error' => $data." already exists. Please try again");
            echo json_encode($response);
        }  
    }
    else{
        $response = array('error' => "Please fill up the form");
        echo json_encode($response);
    }
}
else{
    $response = array('error' => "POST PROCESSING ERROR");
    echo json_encode($response);
}
?>