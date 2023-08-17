<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="checkbox">Assign to Teacher</label>
                <?php 
                    include_once("../Database/LessonCheckboxClass.php");
                    $sql = "SELECT user_info_id, first_name, last_name FROM user_info_view WHERE user_level_description='Teacher' AND status='Active';";
                    $checkbox = new LessonDisplayClass();
                    $checkbox->teacherChecbox();
                    ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="checkbox">Assign to Class</label>
                <?php 
                    include_once("../Database/LessonCheckboxClass.php");
                    $checkbox = new LessonDisplayClass();
                    $checkbox->classCheckbox();
                    ?>
            </div>
        </div>


    </div>
    <br>
    <br>
    <div class="row">

        <!-- other content -->

        <div class="form-group">

            <button type="button" class="btn btn-default btn-sm back">Previous</button>
            <button type="submit" class="btn btn-success btn-sm next">Save All Changes</button>

        </div>

    </div>
</div>