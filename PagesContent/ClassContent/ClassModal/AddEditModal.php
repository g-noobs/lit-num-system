<div class="modal fade" id="add_class_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- alert that will show if error occurs -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible" id="add_user_modal_alert" role="alert"
                        style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <span id="add_user_modal_alert_text"></span>
                    </div>
                </div>
            </div>
            <form method="post" id="add_class_form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="class_name">Enter Class Name:</label>
                            <input type="text" name="class_name" class="form-control" placeholder="Class Name">
                        </div>

                        <div class="form-group">
                            <label for="sy_date">Schoole Year</label>
                            <select name="sy_id" id="sy_id" class="form-control">
                                <?php include_once("../Database/ClassEssentialsClass.php"); 
                                    $sy_options = new ClassEssentialsClass();
                                    $sy_options->schoolYearSelect();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left" id="submit_btn">Add New Class</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->
