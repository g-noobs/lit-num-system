<div class="form-group">
    <label for="checkbox">Assign to Teacher</label>
    
    <?php 
    include_once("../Database/LessonCheckboxClass.php");
    $sql = "SELECT user_info_id, first_name, last_name FROM tbl_user_info";
    $checkbox = new LessonCheckboxClass();
    $checkbox->teacherChecbox($sql);
    ?>
</div>