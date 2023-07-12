<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter the Preferred Information</h4>
                <form role="form" action="../UserContent/ActionsUsers/ActionArchiveUser.php" method="post">
                    <div class="form-group">
                        <input type="text" name="userId" class="form-control" style="display: none;">
                        <button type="submit" class="btn btn-danger pull-left">Archive</button>
                    </div>
                </form>
            </div>
            <form role="form" action="../UserContent/ActionsUsers/ActionEditUser.php" onsubmit="return validateForm()" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender" placeholder="Gender">
                                <option>Male</option>
                                <option>Female</option>
                                <option>None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="user" placeholder="User Type">
                                <option>Admin</option>
                                <option>Teacher</option>
                                <option>Student</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Activate User</button>
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal for Edit User-->