<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-title">Enter user Information</h4>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="personal_id">Enter ID:</label>
                            <input type="text" id="personal-id" name="personal_id" class="form-control" placeholder="ID"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Enter First Name:</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Enter Last Name:</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1"
                                placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Select Gender:</label>
                            <select class="form-control" name="gender" placeholder="Gender" required>

                                <option>Male</option>
                                <option>Female</option>
                                <option>None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Email Address:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Select Birthday:</label>
                            <input type="date" name="date" class="form-control" id="exampleInputPassword1"
                                placeholder="Birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="user">Select Type of User:</label>
                            <select class="form-control" name="user" id="user" required>
                                <option>Learner</option>
                                <option>Teacher</option>
                                <option>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-left">Add User</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal ADD User -->

<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Enter the Preferred Information</h4>
                <form id="editUserForm">
                    <div class="form-group">
                        <input type="text" name="userId" class="form-control" style="display: none;">
                        <button type="submit" class="btn btn-danger pull-left btn-sm">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                </form>
            </div>
            <form role="form" id="edit_user">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group" id="personal-id">
                            <label for="personal_id">Enter ID:</label>
                            <input type="text" name="personal_id" class="form-control" id="exampleInputEmail1"
                                placeholder="ID" required>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Enter First Name:</label>
                            <input type="text" name="first_name" class="form-control" id="exampleInputEmail1"
                                placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Enter Last Name:</label>
                            <input type="text" name="last_name" class="form-control" id="exampleInputEmail1"
                                placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender" required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Birthdate:</label>
                            <input type="date" name="date" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="user">User:</label>
                            <select class="form-control" name="user" id="user" required>
                                <option>Admin</option>
                                <option>Teacher</option>
                                <option>Learner</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-left"></button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal for Edit User -->

<div class="modal fade" id="activate-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to activate this user?</h4>
                <form id="activateUser">
                    <div class="form-group">
                        <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                        <button id="activateUserBtn" class="btn btn-success pull-left">Activate</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal for Activate User-->
<div class="modal fade" id="archive-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
                <form id="archUserForm">
                    <div class="form-group">
                        <input type="text" readonly name="userId" class="form-control" id="exampleInputEmail1">
                        <button id="archUserBtn" class="btn btn-danger pull-left">Archive</button>
                        <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal for Acrchive User-->