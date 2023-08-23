<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lessong List</h3>
                <br>
                <br>
                <button type="button" class="btn btn-warning btn-sm" data-toggle='modal' data-toggle='tooltip' title='Add New Lesson'  data-target="#add_lesson">
                    <i class="fa fa-plus"></i> <span> Add Lesson</span>
                </button>
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
    <!-- /.col -->
</div>