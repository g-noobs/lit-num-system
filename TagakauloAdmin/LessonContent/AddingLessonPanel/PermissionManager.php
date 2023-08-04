<div class="form-group">
    <label for="checkbox">Assign to Teacher</label>
    
    <?php 
    include_once("../Database/LessonCheckboxClass.php");
    $sql = "SELECT user_info_id, first_name, last_name FROM user_info_view WHERE user_level_description='Teacher' AND status='Active';";
    $checkbox = new LessonCheckboxClass();
    $checkbox->teacherChecbox($sql);
    ?>
</div>

<div class="form-group">
    
    <button type="button" class="btn btn-default btn-sm back">Previous</button>
    <button type="submit" class="btn btn-success btn-sm next">Save All Changes</button>

</div>