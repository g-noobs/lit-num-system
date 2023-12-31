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
                        <div class="form-group" id="personal_id_form">
                            <label for="personal_id">Enter ID:</label>
                            <input type="text" id="personal-id" name="personal_id" class="form-control" placeholder="ID"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Enter First Name:</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required
                                autocomplete="given-name" />
                        </div>
                        <div class="form-group">
                            <label for="last_name">Enter Last Name:</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
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
                            <input type="email" name="email" class="form-control" placeholder="Email" required
                                autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="date">Select Birthday:</label>
                            <input type="date" name="date" class="form-control" placeholder="Birthdate" required>
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
                        <!-- <button type="submit" class="btn btn-danger pull-left btn-sm">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button> -->
                    </div>
                </form>
            </div>
            <form role="form" id="edit_user_form">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" readonly name="userId" class="form-control">
                        </div>
                        <div class="form-group" id="edit_personal_id_form">
                            <label for="edit_personal_id">Enter ID:</label>
                            <input type="text" name="edit_personal_id" id="edit_personal_id" class="form-control" placeholder="ID" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_first_name">Enter First Name:</label>
                            <input type="text" name="edit_first_name" class="form-control" placeholder="First Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_last_name">Enter Last Name:</label>
                            <input type="text" name="edit_last_name" class="form-control" placeholder="Last Name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="edit_gender">Gender:</label>
                            <select class="form-control" name="edit_gender" required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_date">Birthdate:</label>
                            <input type="date" name="edit_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_user_option">User:</label>
                            <select class="form-control" name="edit_user_option" id="edit_user_option" required>
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
                        <button type="submit" class="btn btn-warning pull-left">Update</button>
                        <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal for Edit User -->

<div class="modal fade" id="activateUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to activate this user?</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div id="act_usr_id"></div>
                    <div id="act_usr_name"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="actvUsrBtn" class="btn btn-success pull-left" data-id="1">Activate</button>
                <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal for Activate User-->


<div class="modal fade" id="archiveUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Are you sure you wanted to ARCHIVE this user?</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div id="arch_usr_id"></div>
                    <div id="arch_usr_name"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="archUserBtn" class="btn btn-danger pull-left" data-id="0">Archive</button>
                <button type="reset" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal for Acrchive User-->