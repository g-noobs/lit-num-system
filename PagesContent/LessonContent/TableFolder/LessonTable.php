<style>
.search-box {
    position: relative;
    float: right;
}

.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}

.search-box input:focus {
    border-color: #3FBAE4;
}

.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 16px;
    top: 8px;
    left: 14px;
}
</style>
<div class="row">
    <div class="box container">
        <div class="box-header">
            <h2>Lesson <b>List</b></h2>
            <br>
            <div class="row">
                <div class="col-xs-6">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle='modal' data-toggle='tooltip'
                        title='Add New Lesson' data-target="#addLessonModal">
                        <i class="fa fa-plus"></i> <span> Add Lesson</span>
                    </button>
                </div>
                <div class="col-xs-6">
                    <div class="search-box">
                        <i class="fa fa-search"></i> 
                        <input type="text" id="userInput" class="form-control" placeholder="Search..">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
            <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <?php include_once "LessonTableHeader.php";?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once("../Database/LessonDisplayClass.php");
                        $table = "lesson_view";
                        $sql = "SELECT * FROM ".$table;
                        $userT = new LessonDisplayClass();
                        $userT->lessonTable($sql);
                        ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


</div>