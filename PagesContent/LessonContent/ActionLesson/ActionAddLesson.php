<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['lesson_name'])){
        $values = array(
            'lesson_id'=>'',
            'lesson_name' => trim($_POST['lesson_name']),
            ''
        );
        
        //get the lesson id with zeros
        $lesson_count = new ColumnCountClass();
        $values['lesson_id'] = "LSN". $lesson_count->columnCountWhere("lesson_id","tbl_lesson");
        
        $table = "tbl_lesson";
        $addLesson = new SanitizeCrudClass();
        $query = "INSERT INTO $table(lesson_id, lesson_name, lesson_status, level_id, subject_id) VALUES (?,?,?,?,?)";
        $params = array($lesson_id, $lesson_name, 1, $level_learning, $subj_list);
        
        //Check if there is duplicate in tbl_lesson
        include_once "../../../Database/CommonValidationClass.php";
        $check = new CommonValidationClass();
        $data = $lesson_name;
        $column = 'lesson_name';
        $isDuplicate = $check -> validateOneColumn($table, $column, $data);
        
        if($isDuplicate){
            try{
                $addLesson->executePreState($query,$params);
                
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    // Duplicate entry
                    echo $data." already exists. Please try again";  
                    exit();
                } else {
                    // Some other error
                    throw $e;
                }
            }
            //add a catch for foreign key constraits fails
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else{
            echo $data." is already exists. Please try again";
        }  
    }
    else{
        echo "Please fill up the form";
    }
}
else{
    echo "POST PROCESSING ERROR";
}
?>