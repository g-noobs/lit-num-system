<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lessong List</h3>
                <br>
                <br>
                <button type="button" class="btn btn-warning btn-sm" id="add-lesson">
                    <i class="fa fa-plus"></i> <span> Add Lesson</span>
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll; max-height: 400px;">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <?php include_once "LessonTableHeader.php";?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once("../Database/DisplayAllTableClass.php");
                        $table = "lesson_view";
                        $sql = "SELECT * FROM ".$table;
                        $userT = new DisplayAllTableClass();
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