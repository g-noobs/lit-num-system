<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Lesson Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="container-fluid">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-lesson">
                    <i class="fa fa-plus"></i> <span> Add Lesson</span>
                </button>
            </div>
            <br>
            <!-- /.modal ADD User-->

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
                        $table = "tbl_lesson";
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