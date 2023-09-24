<div class="form-group">
    <label for="teach_name">Class Name:</label>
    <input type="text" name="class_name" class="form-control">
</div>

<div class="form-group">
    <label for="assgn_teach">Assigned Teacher</label>
    <select class="form-control" name="teacher" id="assgn_teach">
        <?php include_once("../Database/ClassEssentialsClass");
        $option = new ClassEssentialsClass();
        $option->teacherSelect();
        ?>
    </select>
</div>

<div class="form-group">
<label for="assgn_teach">Select Area: </label>
    <select class="form-control" name="area" id="assgn_area">
        <?php include_once("../Database/ClassEssentialsClass");
        $option = new ClassEssentialsClass();
        $option->areaSelect();
        ?>
    </select>
</div>

<button type="submit" class="btn btn-warning btn-sm next">Add New Class</button>
<button type="button" class="btn btn-default btn-sm back" id="back">Previous</button>
