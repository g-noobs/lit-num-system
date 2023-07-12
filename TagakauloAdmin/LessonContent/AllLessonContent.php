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
            <div class="modal fade" id="add-lesson">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Enter Lesson Information</h4>
                        </div>
                        <form role="form" action="../LessonContent/ActionLesson/ActionAddLesson.php" onsubmit="return validateForm()"
                            method="post">
                            <div class="modal-body">
                                <div class="box-body">
                                <div class="form-group">
                                        <select class="form-control" name="lesson_name">
                                            <option value = "" selected disabled hidden>Lesson</option>
                                            <option>Folklore</option>
                                            <option>Numbers</option>
                                            <option>Letters</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="objective_id">
                                            <option value = "" selected disabled hidden>Object Id</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="topic_id">
                                            <option value = "" selected disabled hidden>Topic Id</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                               
                                    <div class="form-group">
                                        <input type="date" name="date_added" class="form-control"
                                            id="exampleInputPassword1" placeholder="Date Added">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-left">Add User</button>
                                <button type="reset" class="btn btn-default pull-left"
                                    data-dismiss="modal">Cancel</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
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