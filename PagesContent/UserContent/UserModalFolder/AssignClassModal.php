<div class="modal fade" id="assign_class_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Assign Class to Teacher</h4>
                <small id=user_teacher_id></small>
            </div>
            <form id="assign_class_form">
                <div class="modal-body">
                    <div class="box-body box-warning">
                        <div class="form-group row">
                            <label for="assign_class_id">Choose a Class to Assign</label>
                            <select name="assign_class_id" class="form-control input-xs assign_class">
                                <?php include_once "../Database/DisplayAssignClass.php";
                                        $classlist = new DisplayAssignClass();
                                        $classlist->displayClassList();
                                    ?>
                            </select>
                            <a href="#" id="assign_more_class" type="button" data-toggle="tooltip"
                                title="Add More Class" class="text-success"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-left">Assign Teacher</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
            <!-- /.end of form -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal assign class to teacher -->