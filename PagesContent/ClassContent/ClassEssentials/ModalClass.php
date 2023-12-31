<div class="modal fade" id="add-class">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="../PagesContent/ClassContent/ActionFolder/AddClassAction.php" onsubmit="return validateForm()"
                method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="class_name">Enter Class Name:</label>
                            <input type="text" name="class_name" class="form-control" placeholder="Class Name">
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Add New Class</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->




<div class="modal fade" id="edit-class">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="../PagesContent/ClassContent/ActionFolder/EditClassAction.php" onsubmit="return validateForm()"
                method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="class_id">Class ID:</label>
                            <input type="hidden" name="class_id">
                            <input type="text" readonly id="user" name="class_id" class="form-control">
                        
                        </div>
                        <div class="form-group">
                            <label for="class_name">Edit Class Name:</label>
                            <input type="text" name="class_name" class="form-control" placeholder="Class Name">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Update</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal Edit Class -->


<div class="modal fade" id="archive-class">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                <form role="form" action="../PagesContent/ClassContent/ActionFolder/ArchiveClassAction.php" method="post">
                    <div class="form-group">
                        <input type="text" readonly name="class_id" class="form-control">
                        <button type="submit" class="btn btn-danger pull-left">Archive</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>